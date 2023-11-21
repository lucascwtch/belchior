<?php

require_once __DIR__ . '/../controller/logoutController.php';

// Cria uma instância da classe SessionController
$sessionController = new SessionController();

// Especifica a localização para a qual você deseja redirecionar após a destruição da sessão
$redirectLocation = "../index.php";

// Chama o método para destruir a sessão e redirecionar
$sessionController->destroySessionAndRedirect($redirectLocation);
?>
