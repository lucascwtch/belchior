<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logout</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

</head>

<body>

    <?php
    require_once "../model/logoutModel.php";

    class SessionController
    {
        private $sessionModel;

        public function __construct()
        {
            $this->sessionModel = new SessionModel();
        }

        public function destroySessionAndRedirect($redirectLocation)
        {
            $this->sessionModel->destroySession();

            echo "<script language='javascript' type='text/javascript'>
            var logoutMessage = 'Você saiu da sessão.';
            Swal.fire({
                text: logoutMessage,
                icon: 'success',
            }).then(function() {
                // Redireciona o usuário para a página especificada
                window.location.href = '$redirectLocation';
            });
        </script>";
        }
    }

    // Cria uma instância da classe SessionController
    $sessionController = new SessionController();

    // Especifica a localização para a qual você deseja redirecionar após a destruição da sessão
    $redirectLocation = "../index.php";

    // Chama o método para destruir a sessão e redirecionar
    $sessionController->destroySessionAndRedirect($redirectLocation);
    ?>


</body>

</html>