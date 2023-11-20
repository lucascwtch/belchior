<?php
// EmailModel.php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../PHPMailer-master/src/Exception.php';
require '../PHPMailer-master/src/PHPMailer.php';
require '../PHPMailer-master/src/SMTP.php';


class EmailModel {
    private $dao;

    public function __construct($conexao) {
        $this->dao = new EmailDAO($conexao);
    }

    public function sendEmails() {
        $emails = $this->dao->getEmails();

        $mail = new PHPMailer(true);
        $mail->isSMTP();
        $mail->SMTPDebug = 0;
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

        foreach ($emails as $email) {
            $mail->clearAddresses();
            $mail->addAddress($email);

            if ($mail->send()) {

                echo "<script language='javascript' type='text/javascript'>
                alert('Recebemos sua mensagem!');window.location ='../index.html'</script>";
          
            } else {
                echo "Erro ao enviar mensagem para $email: " . $mail->ErrorInfo . "<br>";
            }
        }
    }
}
?>
