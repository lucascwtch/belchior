<?php
    // Inclui o controlador para enviar e-mails
    require_once "../controller/contatoController.php";

    // Cria uma instância do controlador
    $emailController = new EmailController($conexao);

    // Chama o método para enviar e-mails
    $emailController->sendEmails();
    
    ?>