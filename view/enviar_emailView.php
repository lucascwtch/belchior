<?php

require_once "../controller/enviarEmailResetController.php";

$resetController = new PasswordResetController($conexao);

// Obtém o token da URL (se disponível) e passa para o controlador de redefinição de senha
$token = $_GET['tokenUsuario'] ?? '';
$resetController->handlePasswordReset($tokenUsuario);
?>
