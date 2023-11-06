<?php
require("../controller/config.php");

class Authenticator {
    private $conexao;

    public function __construct($conexao) {
        $this->conexao = $conexao;
    }

    public function login($email, $senha) {
        // Verifica se o email e senha foram fornecidos e se a conexão com o banco de dados está disponível
        if (!empty($email) && !empty($senha) && $this->conexao !== null) {
            // Prepara uma consulta SQL para buscar o usuário pelo email
            $query = $this->conexao->prepare("SELECT * FROM usuarios WHERE email = ?");
            $query->execute(array($email));

            // Verifica se há resultados para o email fornecido
            if ($query->rowCount() > 0) {
                // Obtém os dados do usuário
                $user = $query->fetch(PDO::FETCH_ASSOC);
                $senha_hash_banco = $user['senha'];

                // Verifica se a senha fornecida corresponde à senha armazenada no banco de dados
                if (password_verify($senha, $senha_hash_banco)) {
                    // Inicia a sessão e define variáveis de sessão
                    $this->startSession($user);
                } else {
                    // Redireciona de volta para a página de login com uma mensagem de erro
                    $this->redirectToLoginPage("Senha ou Email Incorretos!");
                }
            } else {
                // Redireciona de volta para a página de login com uma mensagem de erro
                $this->redirectToLoginPage("Realize Login!");
            }
        } else {
            // Redireciona de volta para a página de login se as informações de login estiverem ausentes
            $this->redirectToLoginPage();
        }
    }

    private function startSession($user) {
        session_start();
        // Define variáveis de sessão
        $_SESSION['user_logged_in'] = true;
        $_SESSION['user_profile_name'] = $user['nome'];
        $_SESSION['user_adm'] = $user['adm'];
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_sobrenome'] = $user['sobrenome'];
        $_SESSION['user_email'] = $user['email'];
        $_SESSION['user_apelido'] = $user['apelido'];
        $_SESSION['user_telefone'] = $user['telefone'];
        $_SESSION['user_data_nascimento'] = $user['data_nascimento'];
        

        $welcome_message = "Bem-vindo, " . $user['nome'];

        // Exibe uma mensagem de boas-vindas e redireciona para a página principal
        echo "<script language='javascript' type='text/javascript'>
            var welcomeMessage = '$welcome_message';
            alert(welcomeMessage);
            window.location = '../index.php';
        </script>";
    }

    private function redirectToLoginPage($message = null) {
        // Redireciona de volta para a página de login, opcionalmente exibindo uma mensagem
        echo "<script language='javascript' type='text/javascript'>
            " . ($message ? "alert('$message');" : "") . "
            setTimeout(function() {
                window.location = '../view/login_page.html';
            }, 3000);
        </script>";
    }
}

$authenticator = new Authenticator($conexao);

if (isset($_POST['email']) && isset($_POST['senha'])) {
    $senha = $_POST['senha'];
    $email = $_POST['email'];
    $authenticator->login($email, $senha);
} else {
    $authenticator->redirectToLoginPage();
}
?>
