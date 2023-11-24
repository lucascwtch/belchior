<?php
require_once '../model/ContatoModel.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../PHPMailer-master/src/Exception.php';
require '../PHPMailer-master/src/PHPMailer.php';
require '../PHPMailer-master/src/SMTP.php';

class ContatoController
{
    public function processarFormulario()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Cria uma instância de Contato com os dados do formulário
            $contato = new Contato(
                $_POST['inputEmail'], //email
                $_POST['inputSubject'], //assunto
                $_POST['inputName'], //nome
                $_POST['inputReason'], //motivo
                $_POST['inputContact'] //mensagem
                 //recebeu resposta
            );

            


            // Cria uma instância de EmailService e envia o e-mail
            $emailService = new EmailService();
            if ($emailService->enviarEmail($contato)) {
                echo "<script>
             alert('Mensagem enviada com sucesso!');
             window.location.href = '../view/contato.php';
         </script>";
                
            } else {
                echo "<script>
         alert('Erro ao enviar o e-mail');
         window.location.href = '../view/contato.php';
     </script>";
            }
        }
    }
}

class EmailService
{
    private $mail;

    public function __construct()
    {
        $this->mail = new PHPMailer(true);
        $this->configureMailer();
    }

    private function configureMailer()
    {
        $this->mail->isSMTP();
        $this->mail->SMTPDebug = 0; // Defina 2 para depurar
        $this->mail->Host = 'smtp.gmail.com';
        $this->mail->SMTPAuth = true;
        $this->mail->Username = 'freis1801@gmail.com';
        $this->mail->Password = 'xglv bvmv okzh nfhx';
        $this->mail->SMTPSecure = 'tls';
        $this->mail->Port = 587;
        $this->mail->setFrom('freis1801@gmail.com', 'Belchior');
        $this->mail->isHTML(true);
    }

    public function enviarEmail(Contato $contato)
    {
        try {
            $this->mail->addAddress($contato->getEmail());
            $this->mail->Subject = $contato->getAssunto();
            $this->mail->Body = "Nome: {$contato->getNome()}<br>Email: {$contato->getEmail()}<br>Motivo: {$contato->getMotivo()}<br>Mensagem: {$contato->getMensagem()}";

            $this->mail->send();
            return true;
        } catch (Exception $e) {
            return false;
        }
    }
}

// Cria uma instância do controlador e processa o formulário
$contatoController = new ContatoController();
$contatoController->processarFormulario();

