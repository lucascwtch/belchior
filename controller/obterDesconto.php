<?php

include_once("config.php");

function obterUsuarioPorID($idUsuario, $conexao) {
    $query = "SELECT * FROM usuarios WHERE idUsuario = :id";
    $stmt = $conexao->prepare($query);
    $stmt->bindParam(':id', $idUsuario, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function aplicarDescontoProduto($precoProduto, $desconto) {
    return $precoProduto - ($precoProduto * $desconto / 100);
}


$idUsuarioLogado = 1;

$usuario = obterUsuarioPorID($idUsuarioLogado, $conexao);


$dataNascimento = new DateTime($usuario['dataNascimentoUsuario']);
$dataAtual = new DateTime();
if ($dataNascimento->format('md') == $dataAtual->format('md')) {
    
    $precoProdutoOriginal = 100; 
    $desconto = 10;
    $precoProdutoComDesconto = aplicarDescontoProduto($precoProdutoOriginal, $desconto);

    echo "Parabéns! Hoje é seu aniversário. Você recebe 10% de desconto em um produto. Novo preço: $precoProdutoComDesconto";
} else {
    echo "Não é seu aniversário hoje. Sem desconto.";
}
?>
