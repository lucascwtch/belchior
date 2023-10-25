<?php
class SessionManager {
    public function destroySessionAndRedirect($redirectLocation) {
        // Inicia ou resuma a sessão existente
        session_start();

        // Destrói a sessão atual (encerra a sessão do usuário)
        session_destroy();

        // Redireciona o usuário para a página especificada
        header("Location: " . $redirectLocation);
    }
}

// Cria uma instância da classe SessionManager
$sessionManager = new SessionManager();

// Especifica a localização para a qual você deseja redirecionar após a destruição da sessão
$redirectLocation = "../view/login_page.html";

// Chama o método para destruir a sessão e redirecionar
$sessionManager->destroySessionAndRedirect($redirectLocation);
?>

