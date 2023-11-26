<?php
// ProductController.php

require_once "../model/inserirProdutoModel.php";
require_once "../dao/inserirProdutoDAO.php";

class ProductController {
    private $model;

    public function __construct($conexao) {
        $this->model = new ProductModel($conexao);
    }

    public function uploadProduct($tipoProduto, $nomeProduto, $precoProduto, $descricaoProduto, $imagemProduto) {
        $mensagem = $this->model->uploadProduct($tipoProduto, $nomeProduto, $precoProduto, $descricaoProduto, $imagemProduto);

        // Exibe uma mensagem e redireciona após um atraso
        echo '<script>alert("' . $mensagem . '"); </script>';
    }
}

$productController = new ProductController($conexao);

// Verifica se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $tipo_produto = $_POST['tipoProduto'];
    $nome_produto = $_POST['nomeProduto'];
    $preco_produto = $_POST['precoProduto'];
    $descricaoProduto = $_POST['descricaoProduto'];
    $imagem_produto = $_FILES['imagemProduto'];

    // Chama o método para fazer upload do produto
    $productController->uploadProduct($tipo_produto, $nome_produto, $preco_produto, $descricaoProduto, $imagem_produto);
}
?>
