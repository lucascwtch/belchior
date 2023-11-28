<?php

include_once('navbar.php');

?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/login.css">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
    <title>Cadastro - Belchior</title>

    <link rel="stylesheet" href="../assets/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="bootstrap.min.css.map">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="icon" href="../assets/img/favicon.png" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">

    <link rel="stylesheet" href="../assets/css/ionicons.min.css">
    <link rel="stylesheet" href="../assets/css/flaticon.css">
    <link rel="stylesheet" href="../assets/css/icomoon.css">
    <link rel="stylesheet" href="../assets/css/animate.css">

    <link rel="stylesheet" href="../assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="../assets/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="../assets/css/magnific-popup.css">
    <link rel="stylesheet" href="../assets/css/aos.css">


    <link rel="stylesheet" href="../assets/css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/animate.css">

    <link rel="stylesheet" href="../assets/css/login.css">

</head>
<style>
    .navbar {
        padding-bottom: 10px !important;
    }
</style>

<body>

    <div class="wrapper">
        <form method="post" action="../controller/cadastrarUsuarioController.php">
            <h1>Cadastrar</h1>
            <div class="input-box">
                <input type="text" placeholder="Nome Completo" id="nomeUsuario" name="nomeUsuario" required>
                <i class="bx bxs-user"></i>
            </div>
            <div class="input-box">
                <input type="email" placeholder="E-mail" id="emailUsuario" name="emailUsuario" required>
                <i class="ion-md-mail"></i>
            </div>
            <div class="input-box">
                <input type="text" placeholder="CPF" id="cpfUsuario" name="cpfUsuario" required>
                <i class="bx bxs-id-card"></i>
            </div>
            <div class="input-box">
                <input type="date" placeholder="Data de Nascimento" id="dataNascimentoUsuario" name="dataNascimentoUsuario" required>
                <style>
                    #data_nascimento::-webkit-calendar-picker-indicator {
                        display: none;
                    }
                </style>
                <i class="bx bxs-calendar"></i>
            </div>
            <div class="input-box">
                <input type="password" placeholder="Senha" id="senhaUsuario" name="password" required>
                <i class="bx bxs-lock-alt"></i>
            </div>
            <div class="input-box">
                <input type="password" placeholder="Confirmar Senha" id="confirm_password" name="confirm_password" required>
                <i class="bx bxs-lock-alt"></i>
            </div>

            <button type="submit" class="btn" id="enviar">Cadastrar</button>
            <div class="register-link">
                <p>Já possui uma conta? <a href="login_page.php">Entrar</a></p>
            </div>
        </form>
    </div>


</body>

</html>