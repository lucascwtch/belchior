<?php


require_once "../controller/redefinirSenhaController.php";


$resetController = new PasswordResetController($conexao);

// Obtém o token da URL (se disponível) e passa para o controlador de redefinição de senha
$token = $_GET['token'] ?? '';
$resetController->handlePasswordReset($token);
?>
