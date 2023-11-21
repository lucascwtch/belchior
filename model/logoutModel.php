<?php
class SessionModel {
    public function destroySession() {
        // Inicia ou resuma a sessão existente
        session_start();

        // Destrói a sessão atual (encerra a sessão do usuário)
        session_destroy();
    }
}
?>
