<?php
require("../controller/config.php");
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require '../PHPMailer-master/src/Exception.php';
require '../PHPMailer-master/src/PHPMailer.php';
require '../PHPMailer-master/src/SMTP.php';

// Configurar o PHPMailer para enviar e-mails
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

// Consultar o banco de dados para obter os e-mails
$query = $conexao->prepare("SELECT email FROM email");
$query->execute();
$emails = $query->fetchAll(PDO::FETCH_COLUMN, 0);

// Enviar a mensagem para cada e-mail
foreach ($emails as $email) {
    $mail->clearAddresses(); // Limpar os endereços anteriores
    $mail->addAddress($email);
    
    if ($mail->send()) {
        echo "Mensagem enviada com sucesso para $email<br>";
    } else {
        echo "Erro ao enviar mensagem para $email: " . $mail->ErrorInfo . "<br>";
    }
}

?>
