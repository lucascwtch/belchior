<?php
require("../controller/config.php");
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../PHPMailer-master/src/Exception.php';
require '../PHPMailer-master/src/PHPMailer.php';
require '../PHPMailer-master/src/SMTP.php';

class EmailSender {
    private $conexao;

    public function __construct($conexao) {
        $this->conexao = $conexao;
    }

    public function sendEmails() {
        // Configuração do PHPMailer para enviar e-mails
        $mail = new PHPMailer(true);
        $mail->isSMTP();
        $mail->SMTPDebug = 0; // Defina 2 para depurar
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'freis1801@gmail.com';
        $mail->Password = 'xglv bvmv okzh nfhx';
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;
        $mail->setFrom('freis1801@gmail.com', 'Belchior');
        $mail->isHTML(true);
        $mail->Subject = 'TESTE EMAIL';
        $mail->Body = 'teste email';

        // Consulta o banco de dados para obter os e-mails
        $query = $this->conexao->prepare("SELECT email FROM email");
        $query->execute();
        $emails = $query->fetchAll(PDO::FETCH_COLUMN, 0);

        // Envia a mensagem para cada e-mail
        foreach ($emails as $email) {
            $mail->clearAddresses(); // Limpa os endereços anteriores
            $mail->addAddress($email);

            if ($mail->send()) {
                echo "Mensagem enviada com sucesso para $email<br>";
            } else {
                echo "Erro ao enviar mensagem para $email: " . $mail->ErrorInfo . "<br>";
            }
        }
    }
}

$emailSender = new EmailSender($conexao);

// Chama o método para enviar e-mails
$emailSender->sendEmails();
?>
