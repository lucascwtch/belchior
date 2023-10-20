<?php

require("../controller/config.php");

session_start();

// Verifique se o usuário está logado e se há um nome de perfil na sessão
if (isset($_SESSION['user_logged_in']) && $_SESSION['user_logged_in'] && isset($_SESSION['user_profile_name'])) {
    $profileName = $_SESSION['user_profile_name'];
} else {
    $profileName = 'Login'; // Caso o usuário não esteja logado
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .profile-container {
            background-color: #fff;
            width: 400px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            text-align: center;
        }

        .profile-image {
            border-top-left-radius: 8px;
            border-top-right-radius: 8px;
            overflow: hidden;
        }

        .profile-image img {
            width: 100%;
            height: auto;
        }

        .profile-info {
            padding: 20px;
        }

        .profile-info h1 {
            font-size: 24px;
            margin: 0;
        }

        .profile-info p {
            font-size: 18px;
            margin: 10px 0;
        }

        .purchase-status {
            font-weight: bold;
            color: green;
        }
    </style>
</head>
<body>
    <div class="profile-container">
        <div class="profile-image">
            <img src="../assets/img/belchior.png" alt="Imagem de Perfil">
        </div>
        <div class="profile-info">
            <h1><?php echo $profileName;?></h1>
            <p>Email: usuario@email.com</p>
            <p>Status da Compra: <span class="purchase-status">Ativo</span></p>
        </div>
         <!-- Botão de Logout -->
         <form action="../model/logout.php" method="post">
                <button type="submit">Logout</button>
            </form>
    </div>
</body>
</html>
