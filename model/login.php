<?php
require("../controller/config.php");
session_start();

if (isset($_POST['email']) && isset($_POST['senha']) && $conexao != null) {
    $senha = $_POST['senha'];
    $email = $_POST['email'];

    $query = $conexao->prepare("SELECT * FROM usuarios WHERE email = ?");
    $query->execute(array($email));

    if ($query->rowCount() > 0) {
        $user = $query->fetch(PDO::FETCH_ASSOC); // Utilize `fetch` para obter uma única linha
        $senha_hash_banco = $user['senha'];

        if (password_verify($senha, $senha_hash_banco)) {
            $_SESSION['user_logged_in'] = true;
            $_SESSION['user_profile_name'] = $user['nome'];
            $_SESSION['user_adm'] = $user['adm'];

            $welcome_message = "Bem-vindo, " . $user['nome'];

            echo "<script language='javascript' type='text/javascript'>
                var welcomeMessage = '$welcome_message';
                alert(welcomeMessage);
                window.location = '../index.php';
            </script>";
        } else {
            echo "<script language='javascript' type='text/javascript'>
                alert('Senha ou Email Incorretos!');
                setTimeout(function() {
                    window.location = '../view/login_page.html';
                }, 3000);
            </script>";
        }
    } else {
        echo "<script language='javascript' type='text/javascript'>
            alert('Realize Login!');
            setTimeout(function() {
                window.location = '../view/login_page.html'; // Corrigido o diretório
            }, 3000);
        </script>";
    }
} else {
    // Redireciona para a página de login se não houver informações de login
    header("Location: ../view/login_page.html"); // Corrigido o redirecionamento
}
?>
