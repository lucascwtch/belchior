<?php
require_once "../dao/loginDAO.php";
require_once "../model/loginModel.php";


class AuthController {
    private $conexao;
    private $userModel;

    public function __construct($conexao, $userModel) {
        $this->conexao = $conexao;
        $this->userModel = $userModel;
    }

    public function login($email, $senha) {
        // Verifica se o email e senha foram fornecidos e se a conexão com o banco de dados está disponível
        if (!empty($email) && !empty($senha) && $this->conexao !== null) {
            $user = $this->userModel->getUserByEmail($email);

            // Verifica se há resultados para o email fornecido
            if ($user) {
                $senha_hash_banco = $user['senhaUsuario'];

                // Verifica se a senha fornecida corresponde à senha armazenada no banco de dados
                if (password_verify($senha, $senha_hash_banco)) {
                    $this->startSession($user);
                } else {
                    $this->redirectToLoginPage("Senha ou Email Incorretos!");
                }
            } else {
                $this->redirectToLoginPage("Realize Login!");
            }
        } else {
            $this->redirectToLoginPage();
        }
    }

    private function startSession($user) {
        session_start();
        $_SESSION['user_logged_in'] = true;
        $_SESSION['user_profile_name'] = $user['nomeUsuario'];
        $_SESSION['user_adm'] = $user['statusUsuario'];
        $_SESSION['user_id'] = $user['idUsuario'];
        $_SESSION['user_sobrenome'] = $user['sobrenomeUsuario'];
        $_SESSION['user_email'] = $user['emailUsuario'];
        $_SESSION['user_apelido'] = $user['apelidoUsuario'];
        $_SESSION['user_telefone'] = $user['telefoneUsuario'];
        $_SESSION['user_data_nascimento'] = $user['dataNascimentoUsuario'];
        // ... outras variáveis de sessão

        $welcome_message = "Bem-vindo, " . $user['nomeUsuario'];

        echo "<script language='javascript' type='text/javascript'>
            var welcomeMessage = '$welcome_message';
            alert(welcomeMessage);
            window.location = '../index.php';
        </script>";
    }

    private function redirectToLoginPage($message = null) {
        echo "<script language='javascript' type='text/javascript'>
            " . ($message ? "alert('$message');" : "") . "
            setTimeout(function() {
                window.location = '../view/login_page.html';
            }, 3000);
        </script>";
    }
}

$authController = new AuthController($conexao, new UserModel($conexao));

if (isset($_POST['emailUsuario']) && isset($_POST['senhaUsuario'])) {
    $senha = $_POST['senhaUsuario'];
    $email = $_POST['emailUsuario'];
    $authController->login($email, $senha);
} else {
    $authController->redirectToLoginPage();
}
?>
