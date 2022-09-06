<?php
require("../controller/config.php");


if (isset($_POST['email']) && isset($_POST['senha']) && $conexao != null) {
    $query = $conexao->prepare("SELECT * FROM usuarios WHERE email = ? AND senha = ?");
    $query->execute(array($_POST["email"], $_POST['senha']));
    
    if ($query->rowCount()) {
        
        $user = $query->fetchAll(PDO::FETCH_ASSOC)[0];
        session_start();
        $_SESSION['usuario'] = array($user['nome'], $user['adm']);

        echo "<script language='javascript' type='text/javascript'>
            alert('Redirecionando!');window.location ='../index.html'</script>";
    } else {
        echo "<script language='javascript' type='text/javascript'>
            alert('Senha ou Email Incorretos!');window.location ='../view/login_page.html'</script>";
    }
} else {
    echo "<script language='javascript' type='text/javascript'>
    alert('Realize Login!');window.location ='index.html'</script>";
}

