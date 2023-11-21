<?php
require_once "../controller/enviarEmailResetController.php";
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../PHPMailer-master/src/Exception.php';
require '../PHPMailer-master/src/PHPMailer.php';
require '../PHPMailer-master/src/SMTP.php';
class PasswordResetView {
    public function sendResetEmail($email, $token) {
        $mail = new PHPMailer(true);

        try {
            // Configuração do servidor SMTP (substitua as credenciais e configurações com as suas)
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
            $mail->Body = "Clique no link a seguir para redefinir sua senha: http://localhost/Belchior%20v1.2/belchior/view/redefinirSenhaView.php?token=$token";

            $mail->send();
            echo 'Um link de redefinição foi enviado para o seu e-mail.';
        } catch (Exception $e) {
            echo 'O email não pôde ser enviado. Erro: ', $mail->ErrorInfo;
        }
    }
}


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['email'])) {
    $email = $_POST['email'];

    $passwordResetController = new PasswordResetController($conexao);
    $passwordResetController->requestPasswordReset($email);
}
