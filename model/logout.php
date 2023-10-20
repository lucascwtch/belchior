<?php
session_start();
session_destroy();
header("Location: ../view/login_page.html"); // Redireciona para a página de login
?>
