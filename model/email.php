<?php
require("../controller/config.php");

class ManipuladorRegistro {
    private $conexao;

    public function __construct($conexao) {
        $this->conexao = $conexao;
    }

    public function manipularRegistro($dadosPost) {
        // Verifique se todas as informações de registro foram fornecidas
        if (isset($dadosPost['nome'], $dadosPost['email'], $dadosPost['senha'], $dadosPost['confirmar_senha'])) {
            $nome = $dadosPost['nome'];
            $email = $dadosPost['email'];
            $senha = $dadosPost['senha'];

            // Consulta para verificar se o email já existe
            $consultaEmail = $this->conexao->prepare("SELECT * FROM usuarios WHERE email = :email");
            $consultaEmail->bindParam(':email', $email, PDO::PARAM_STR);
            $consultaEmail->execute();

            if ($consultaEmail->rowCount() > 0) {
                // O email já existe, exiba uma mensagem de erro e redirecione após um atraso
                $this->exibirMensagemDeErroERedirecionar("Este email já foi cadastrado. Tente com outro.", '../view/siginup_page.html');
            } elseif ($dadosPost['senha'] == $dadosPost['confirmar_senha']) {
                // A senha foi confirmada e o email não existe, então prossiga com a inserção no banco de dados
                $senhaHash = password_hash($senha, PASSWORD_DEFAULT);

                $inserirQuery = "INSERT INTO usuarios (nome, senha, email) VALUES (:nome, :senha, :email)";
                $inserirInstrucao = $this->conexao->prepare($inserirQuery);
                $inserirInstrucao->bindParam(':nome', $nome, PDO::PARAM_STR);
                $inserirInstrucao->bindParam(':email', $email, PDO::PARAM_STR);
                $inserirInstrucao->bindParam(':senha', $senhaHash, PDO::PARAM_STR);

                // Exibir círculo de carregamento
                echo "<div id='carregando' class='escondido'>
                      <div class='carregador'></div>
                  </div>";

                $inserirInstrucao->execute();

                if ($inserirInstrucao->rowCount() > 0) {
                    // Cadastro bem-sucedido, exiba uma mensagem e redirecione após um atraso
                    $this->exibirMensagemDeSucessoERedirecionar("Usuário Cadastrado com Sucesso!", '../index.php');
                } else {
                    // Erro na inserção, exiba uma mensagem de erro e redirecione após um atraso
                    $this->exibirMensagemDeErroERedirecionar("Erro ao Inserir os Dados!", '../view/siginup_page.html');
                }
            } else {
                // Senhas não coincidem, exiba uma mensagem de erro e redirecione após um atraso
                $this->exibirMensagemDeErroERedirecionar("Senhas não coincidem", '../index.php');
            }
        } else {
            // Erro, exiba uma mensagem de erro e redirecione após um atraso
            $this->exibirMensagemDeErroERedirecionar("Erro!", '../view/siginup_page.html');
        }
    }

    private function exibirMensagemDeSucessoERedirecionar($mensagem, $urlRedirecionamento) {
        echo "<script language='javascript' type='text/javascript'>
            alert('$mensagem');
            document.getElementById('carregando').classList.remove('escondido'); // Mostrar o círculo de carregamento
            setTimeout(function() {
                window.location = '$urlRedirecionamento';
            }, 3000); // Redireciona após 2 segundos
        </script>";
    }

    private function exibirMensagemDeErroERedirecionar($mensagem, $urlRedirecionamento) {
        echo "<script language='javascript' type='text/javascript'>
            alert('$mensagem');
            document.getElementById('carregando').classList.remove('escondido'); // Mostrar o círculo de carregamento
            setTimeout(function() {
                window.location = '$urlRedirecionamento';
            }, 3000); // Redireciona após 2 segundos
        </script>";
    }
}

$manipuladorRegistro = new ManipuladorRegistro($conexao);

// Coleta os dados do formulário de registro e chama o método para lidar com o registro
$dadosPost = $_POST;
$manipuladorRegistro->manipularRegistro($dadosPost);
?>
