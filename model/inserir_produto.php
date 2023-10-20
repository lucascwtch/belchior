<?php

require("../controller/config.php");


$tipo_produto = $_POST['tipo'];
$nome_produto = $_POST['nome'];
$preco_produto = $_POST['preco'];
$especificacoes_produto = $_POST['especificacoes'];

$imagem = $_FILES['imagem']['name'];
$imagem_temp = $_FILES['imagem']['tmp_name'];
$imagem_destino = "dbimg/" . basename($imagem);

if (move_uploaded_file($imagem_temp, $imagem_destino)) {

    $sql = "INSERT INTO produto (tipo_produto, nome_produto, imagem_produto, preco_produto, especificacoes_produto) VALUES ('$tipo_produto', '$nome_produto', '$imagem', '$preco_produto', '$especificacoes_produto')";
}

echo "<script language='javascript' type='text/javascript'>
                alert('Produto cadastrado!');window.location ='../index.php'</script>";
?>