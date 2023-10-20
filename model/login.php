<?php
require("../controller/config.php");

if (isset($_POST['email']) && isset($_POST['senha']) && $conexao != null) {
    $senha = $_POST['senha'];
    $email = $_POST['email'];

    $query = $conexao->prepare("SELECT * FROM usuarios WHERE email = ?");
    $query->execute(array($email));

    if ($query->rowCount() > 0) {
        $user = $query->fetchAll(PDO::FETCH_ASSOC)[0];
        $senha_hash_banco = $user['senha'];

        if (password_verify($senha, $senha_hash_banco)) {
            session_start();
            $_SESSION['usuario'] = array($user['nome'], $user['adm']);
            $welcome_message = "Bem-vindo, " . $user['nome']; // Mensagem de boas-vindas personalizada

            echo "<script language='javascript' type='text/javascript'>
                var welcomeMessage = '$welcome_message';
                alert(welcomeMessage); // Exibir uma caixa de alerta com a mensagem de boas-vindas
                window.location = '../index.php';
            </script>";
        } else {
            echo "<script language='javascript' type='text/javascript'>
                alert('Senha ou Email Incorretos!');
                setTimeout(function() {
                    window.location = '../vew/login_page.html';
                }, 3000); // Redireciona após 3 segundos
            </script>";
        }
    } else {
        echo "<script language='javascript' type='text/javascript'>
            alert('Realize Login!');
            setTimeout(function() {
                window.location = '../vew/login_page.html';
            }, 3000); // Redireciona após 3 segundos
        </script>";
    }
} else {
    // Redireciona para a página de login se não houver informações de login
    header("Location: login.php");
}
?>
