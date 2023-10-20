<?php
require("../controller/config.php");
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require '../PHPMailer-master/src/Exception.php';
require '../PHPMailer-master/src/PHPMailer.php';
require '../PHPMailer-master/src/SMTP.php';

if (isset($_POST['inputName']) && isset($_POST['inputEmail']) && isset($_POST['inputSubject']) && isset($_POST['inputContact']) && isset($_POST['inputReason']) && isset($_POST['gridCheck'])) {
    $nome = $_POST['inputName'];
    $email = $_POST['inputEmail'];
    $assunto = $_POST['inputSubject'];
    $motivo = $_POST['inputReason'];
    $mensagem = $_POST['inputContact'];
    $checkbox = $_POST['gridCheck'];

    // Verifique se a caixa de seleção está marcada
    if ($checkbox == 'on') {
        // Insira as informações no banco de dados
        $query = $conexao->prepare("INSERT INTO email (nome, email, assunto, motivo, mensagem) VALUES (:nome, :email, :assunto, :motivo, :mensagem)");
        $query->bindParam(':nome', $nome, PDO::PARAM_STR);
        $query->bindParam(':email', $email, PDO::PARAM_STR);
        $query->bindParam(':assunto', $assunto, PDO::PARAM_STR);
        $query->bindParam(':motivo', $motivo, PDO::PARAM_STR);
        $query->bindParam(':mensagem', $mensagem, PDO::PARAM_STR);
        $query->execute();

        // Envie um e-mail com a mensagem predefinida
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
        $mail->addAddress($email,$nome);
        $mail->isHTML(true);
        $mail->Subject = 'SUPORTE - BELCHIOR';
        $mail->Body = 'Chamado recebido com sucesso. Iremos analisar o seu caso.';

        if ($mail->send()) {
            echo "<script language='javascript' type='text/javascript'>
            alert('Redirecionando!');window.location ='../view/enviar_email.html'</script>";


        } else {
            echo "<script language='javascript' type='text/javascript'>
            alert('Houve um Erro').;
            document.getElementById('loading').classList.remove('hidden'); // Mostrar o círculo de carregamento
            setTimeout(function() {
                window.location = '../index.php';
            }, 3000); // Redireciona após 2 segundos
        </script>"; 
        }
    }
} else {
    echo "Campos não preenchidos ou caixa de seleção não marcada.";
}
?>