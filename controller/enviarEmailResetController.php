<?php
require_once "../controller/config.php";
require_once '../model/enviarEmailResetModel.php';
require_once "../dao/enviarEmailResetDAO.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../PHPMailer-master/src/Exception.php';
require '../PHPMailer-master/src/PHPMailer.php';
require '../PHPMailer-master/src/SMTP.php';

class PasswordResetController
{
    private $model;

    public function __construct($conexao)
    {
        $this->model = new PasswordResetModel(new PasswordResetDAO($conexao));
    }

    public function requestPasswordReset($email)
    {
        $usuarioExiste = $this->model->checkUserByEmail($email);

        if ($usuarioExiste) {
            $token = password_hash(uniqid(), PASSWORD_DEFAULT);

            if ($this->model->updateTokenByEmail($email, $token)) {
                if ($this->sendResetEmail($email, $token)) {
                    echo 'Um link de redefinição foi enviado para o seu e-mail.';
                } else {
                    echo 'Erro ao enviar o e-mail de redefinição.';
                }
            } else {
                echo 'Erro ao gerar token.';
            }
        } else {
            echo 'E-mail não encontrado.';
        }
    }

    private function sendResetEmail($email, $token)
    {
        $mail = new PHPMailer(true);

        try {
            // Configuração do servidor SMTP
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'freis1801@gmail.com';
            $mail->Password = 'xglv bvmv okzh nfhx';
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;


            // Remetente e destinatário
            $mail->setFrom('freis1801@gmail.com', 'Belchior');
            $mail->addAddress($email);

            // Conteúdo do e-mail
            $mail->isHTML(true);
            $mail->Subject = 'Redefinir Senha';
            $mail->Body = "Clique no link a seguir para redefinir sua senha: http://localhost/seu_projeto/redefinir_senha.php?token=$token";

            $mail->send();
            return true;
        } catch (Exception $e) {
            return false;
        }
    }
}

$passwordResetController = new PasswordResetController($conexao);

// Verifica se o e-mail foi enviado via POST
if (isset($_POST['email'])) {
    $email = $_POST['email'];

    // Chama o método para solicitar a redefinição de senha
    $passwordResetController->requestPasswordReset($email);
}
