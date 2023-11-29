<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Afiliar</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

</head>

<body>

    <?php
    require_once "../model/afiliarUsuarioModel.php";

    class AfiliarController
    {
        private $afiliarModel;

        public function __construct($conexao)
        {
            $this->afiliarModel = new AfiliarModel($conexao);
        }

        public function temCad($dadosPost)
        {
            return $this->afiliarModel->selectByEmail($dadosPost);
        }

        public function hasEmailInSolicitacoes($dadosPost)
        {
            return $this->afiliarModel->temEmailInSolicitacoes($dadosPost['emailUsuarioCliente']);
        }

        public function inserirAfiliarPedido($dadosPost)
        {
            if (empty($dadosPost['nomeUsuarioCliente']) || empty($dadosPost['emailUsuarioCliente']) || empty($dadosPost['cpfUsuarioCliente'])) {
                echo "<script>
                    Swal.fire({
                        text: 'Campo vazio no formulário!',
                        icon: 'error',
                    }).then(function() {
                        window.location.href = '../view/perfil.php';
                    });
                 </script>";
                return; // Não realiza a inserção se algum campo estiver vazio
            }

            // Verifica se o email já foi cadastrado na tabela usuarios
            if (!$this->temCad($dadosPost)) {
                echo "<script>
                    Swal.fire({
                        text: 'Email não encontrado na nossa base de dados',
                        icon: 'error',
                    }).then(function() {
                        window.location.href = '../view/perfil.php';
                    });
                 </script>";
                return; // Encerra a execução se o email não for encontrado
            }

            // Verifica se o email já foi inserido anteriormente na tabela solicitacoesAfiliar
            if ($this->hasEmailInSolicitacoes($dadosPost)) {
                echo "<script>
                    Swal.fire({
                        text: 'Você já possui uma solicitação aberta!',
                        icon: 'info',
                    }).then(function() {
                        window.location.href = '../index.php';
                    });
                 </script>";
                return; // Encerra a execução se o email já estiver na tabela solicitacoesAfiliar
            }

            try {
                $this->afiliarModel->insertAfiliarPedidos($dadosPost);
                // Inserção bem-sucedida, redireciona para ../index.php
                echo "<script>
                    Swal.fire({
                        text: 'Recebemos suas informações e iremos analisar a proposta!',
                        icon: 'success',
                    }).then(function() {
                        window.location.href = '../index.php';
                    });
                 </script>";
                exit();
            } catch (PDOException $e) {
                // Erro ao inserir afiliação
                echo "Erro ao solicitar afiliação: " . $e->getMessage();
            }
        }
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $afiliarController = new AfiliarController($conexao);

        // Coleta os dados do formulário de registro e chama o método para lidar com o registro
        $dadosPost = $_POST;
        $afiliarController->inserirAfiliarPedido($dadosPost);
    }
?>

</body>
</html>
