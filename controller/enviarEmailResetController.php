<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Redefinição de Senha </title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

</head>

<body>

    <?php
    require_once "../controller/config.php";
    require_once "../model/enviarEmailResetModel.php";
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
                $tokenUsuario = password_hash(uniqid(), PASSWORD_DEFAULT);

                if ($this->model->updateTokenByEmail($email, $tokenUsuario)) {
                    if ($this->sendResetEmail($email, $tokenUsuario)) {
                        echo '<script>
                        Swal.fire({
                            text: "Um link de redefinição foi enviado para o seu e-mail.",
                            icon: "success",
                        }).then(function() {
                            window.location.href = "../index.php";
                        });
                      </script>';
                    } else {
                        echo '<script>
                        Swal.fire({
                            text: "Erro ao enviar o e-mail de redefinição.",
                            icon: "error",
                        });
                      </script>';
                    }
                } else {
                    echo '<script>
                    Swal.fire({
                        text: "Erro ao gerar token.",
                        icon: "error",
                    });
                  </script>';
                }
            } else {
                echo '<script>
                Swal.fire({
                    text: "E-mail não encontrado.",
                    icon: "error",
                });
              </script>';
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
                $mail->Body = "Clique no link a seguir para redefinir sua senha: http://localhost/Belchior%20v1.3/belchior/controller/redefinirSenhaController.php?token=$token";

                $mail->send();
                return true;
            } catch (Exception $e) {
                return false;
            }
        }
    }

    $passwordResetController = new PasswordResetController($conexao);

    // Verifica se o e-mail foi enviado via POST
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['emailUsuario'])) {
        $email = $_POST['emailUsuario'];

        // Chama o método para solicitar a redefinição de senha
        $passwordResetController->requestPasswordReset($email);
    } else {
        echo '<script>alert("Campos com Dados inválidos ou não preenchidos! ");</script>';
        echo '<script>window.location.href = "../view/esqueci_senha.php";</script>';
    }

    ?>

</body>

</html>