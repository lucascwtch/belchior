<?php
require("../controller/config.php");


    if (isset($_POST['nome']) && isset($_POST['password']) && isset($_POST['email']) && isset($_POST['confirm_password']) && $conexao != null) {
        if ($_POST['password'] == $_POST['confirm_password']) {
            $nome = $_POST['nome'];
            $email = $_POST['email'];
            $senha = $_POST['password'];

            $query = ("INSERT INTO usuarios (nome,senha,email)VALUES(:nome, :senha, :email)");

            $insert = $conexao->prepare($query);
            $insert->bindParam(':nome', $nome, PDO::PARAM_STR);
            $insert->bindParam(':email', $email, PDO::PARAM_STR);
            $insert->bindParam(':senha', $senha, PDO::PARAM_INT);



            $insert->execute();

            if ($insert->rowCount() == true) {

                echo "<script language='javascript' type='text/javascript'>
                alert('Usuario Cadastrado com Sucesso!');window.location ='../index.html'</script>";
                

            } else {
                echo "<script language='javascript' type='text/javascript'>
                alert('Erro ao Inserir os Dados!');window.location ='../view/siginup_page.html'</script>";
            }
        } else {
            echo "<script language='javascript' type='text/javascript'>
                alert('Senhas não coincidem');window.location ='..index.html'</script>";
        }
    } else {
        echo "<script language='javascript' type='text/javascript'>
                alert('Erro!');window.location ='../view/siginup_page.html'</script>";
    }
