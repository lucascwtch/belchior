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
?>
