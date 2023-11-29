<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produto</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

</head>

<body>

    <?php
    // ProductController.php

    require_once "../model/inserirProdutoModel.php";
    require_once "../dao/inserirProdutoDAO.php";

    class ProductController {
        private $model;
    
        public function __construct($conexao) {
            $this->model = new ProductModel($conexao);
        }
    
        public function uploadProductController($nomeProduto, $categoriaProduto, $descricaoProduto, $precoProduto, $estoqueProduto, $tamanhoProduto, $imagemProduto, $fkIdUsuario) {
            try {
                $this->model->uploadProduct($nomeProduto, $categoriaProduto, $descricaoProduto, $precoProduto, $estoqueProduto, $tamanhoProduto, $imagemProduto, $fkIdUsuario);
    
                // Exibe uma mensagem de sucesso
                echo '<script>alert("Produto Adicionado");window.location.href="../index.php";</script>';
            } catch (Exception $e) {
                // Exibe uma mensagem de erro
                echo '<script>alert("Erro ao adicionar produto: ' . $e->getMessage() . '");</script>';
            }
        }
    }
    
    // Verifica se o formulário foi enviado
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        try {
            // Validar os dados recebidos
            $nome_produto = $_POST['nomeProduto'];
            $categoria_produto = $_POST['categoriaProduto'];
            $descricao_produto = $_POST['descricaoProduto'];
            $preco_produto = $_POST['precoProduto'];
            $estoque_produto = $_POST['estoqueProduto'];
            $tamanho_produto = $_POST['tamanhoProduto'];
            $imagem_produto = $_FILES['imagemProduto'];
            $fkIdUsuario = $_POST['inputId'];

            // Chama o método para fazer upload do produto
            $productController = new ProductController($conexao);
            $productController->uploadProductController($nome_produto, $categoria_produto,
             $descricao_produto, $preco_produto, $estoque_produto, $tamanho_produto, $imagem_produto, $fkIdUsuario);
        } catch (Exception $e) {
            // Exibe uma mensagem de erro geral
            echo '<script>alert("Erro ao processar o formulário.");</script>';
        }
    }