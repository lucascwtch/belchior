<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

</head>

<body>

    <?php

    require_once "../model/cadastrarUsuarioModel.php";
    require_once "../dao/cadastrarUsuarioDAO.php";

    class RegistroController
    {
        private $model;

        public function __construct($conexao)
        {
            $this->model = new RegistroModel($conexao);
        }

        public function manipularRegistro($dadosPost)
        {
            $mensagem = $this->model->manipularRegistro($dadosPost);

            // Exibir círculo de carregamento
            echo "<div id='carregando' class='escondido'>
                  <div class='carregador'></div>
              </div>";

            // Exibir mensagem e redirecionar após um atraso
            echo "<script language='javascript' type='text/javascript'>
                var successMessage = '$mensagem';
                Swal.fire({
                    text: successMessage,
                    icon: 'success',
                }).then(function() {
                    window.location = '../index.php';
                });
              </script>";
        }
    }

    $registroController = new RegistroController($conexao);

    // Coleta os dados do formulário de registro e chama o método para lidar com o registro
    $dadosPost = $_POST;
    $registroController->manipularRegistro($dadosPost);
    ?>