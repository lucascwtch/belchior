<?php
require("../controller/config.php");
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../PHPMailer-master/src/Exception.php';
require '../PHPMailer-master/src/PHPMailer.php';
require '../PHPMailer-master/src/SMTP.php';

class PasswordResetRequester {
    private $conexao;

    public function __construct($conexao) {
        $this->conexao = $conexao;
    }

    public function requestPasswordReset($email) {
        // Verifique se a solicitação é um POST
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Verifique se o e-mail existe no banco de dados
            $query = $this->conexao->prepare("SELECT * FROM usuarios WHERE email = :email");
            $query->bindParam(':email', $email, PDO::PARAM_STR);
            $query->execute();
            $usuario_existe = $query->fetch(PDO::FETCH_ASSOC);

            if ($usuario_existe) {
                // Gere um token de redefinição de senha (por exemplo, usando a função password_hash)
                $token = password_hash(uniqid(), PASSWORD_DEFAULT);

                // Salve o token no banco de dados associado ao e-mail do usuário
                $updateQuery = $this->conexao->prepare("UPDATE usuarios SET token = :token WHERE email = :email");
                $updateQuery->bindParam(':token', $token, PDO::PARAM_STR);
                $updateQuery->bindParam(':email', $email, PDO::PARAM_STR);
                $updateQuery->execute();

                // Envie um e-mail com o link de redefinição usando o PHPMailer
                $this->sendResetEmail($email, $token);
            } else {
                echo 'E-mail não encontrado.';
            }
        }
    }

    private function sendResetEmail($email, $token) {
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

            // Conteúdo do email
            $mail->isHTML(true);
            $mail->Subject = 'Redefinir Senha';
            $mail->Body = "Clique no link a seguir para redefinir sua senha: http://localhost/Belchior%20v1.2/belchior/model/redefinir_senha.php?token=$token";

            $mail->send();
            echo 'Um link de redefinição foi enviado para o seu e-mail.';
            var_dump($token);
        } catch (Exception $e) {
            echo 'O email não pôde ser enviado. Erro: ', $mail->ErrorInfo;
        }
    }
}

$passwordResetRequester = new PasswordResetRequester($conexao);

// Verifica se o e-mail foi enviado via POST
if (isset($_POST['email'])) {
    $email = $_POST['email'];

    // Chama o método para solicitar a redefinição de senha
    $passwordResetRequester->requestPasswordReset($email);
}
?>
