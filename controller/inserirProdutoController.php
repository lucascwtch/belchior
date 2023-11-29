<?php
// ProductController.php

require_once "../model/inserirProdutoModel.php";
require_once "../dao/inserirProdutoDAO.php";

class ProductController {
    private $model;

    public function __construct($conexao) {
        $this->model = new ProductModel($conexao);
    }

    public function uploadProduct($nomeProduto, $categoriaProduto, $descricaoProduto, $precoProduto,  $estoqueProduto,  $tamanhoProduto, $imagemProduto, $fkIdUsuario) {
        $mensagem = $this->model->uploadProduct($nomeProduto, $categoriaProduto, $descricaoProduto, $precoProduto,  $estoqueProduto, $tamanhoProduto, $imagemProduto, $fkIdUsuario);

        // Exibe uma mensagem e redireciona 
        echo '<script>alert("' . $mensagem . '");window.location.href= ../index.php </script>';
    }
}

$productController = new ProductController($conexao);

// Verifica se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome_produto = $_POST['nomeProduto'];
    $categoria_produto = $_POST['categoriaProduto'];
    $descricao_produto = $_POST['descricaoProduto'];
    $preco_produto = $_POST['precoProduto'];
    $estoque_produto = $_POST['estoqueProduto'];
    $tamanho_produto = $_POST['tamanhoProduto'];
    $imagem_produto = $_FILES['imagemProduto'];
    $fkIdUsuario = $_POST['inputId'];
    

    // Chama o método para fazer upload do produto
    $productController->uploadProduct($nome_produto, $categoria_produto, $descricao_produto, $preco_produto, $estoque_produto, $tamanho_produto,  $imagem_produto, $fkIdUsuario);
}
?>
