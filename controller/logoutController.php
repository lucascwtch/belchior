<?php
require_once "../model/logoutModel.php";



class SessionController {
    private $sessionModel;

    public function __construct() {
        $this->sessionModel = new SessionModel();
    }

    public function destroySessionAndRedirect($redirectLocation) {
        $this->sessionModel->destroySession();

        // Redireciona o usuário para a página especificada
        header("Location: " . $redirectLocation);
    }
}


// Cria uma instância da classe SessionController
$sessionController = new SessionController();

// Especifica a localização para a qual você deseja redirecionar após a destruição da sessão
$redirectLocation = "../index.php";

// Chama o método para destruir a sessão e redirecionar
$sessionController->destroySessionAndRedirect($redirectLocation);