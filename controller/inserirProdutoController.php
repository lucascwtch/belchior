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

    class ProductController
    {
        private $model;

        public function __construct($conexao)
        {
            $this->model = new ProductModel($conexao);
        }

        public function uploadProduct($nomeProduto, $categoriaProduto, $descricaoProduto, $precoProduto,  $estoqueProduto,  $tamanhoProduto, $imagemProduto)
        {
            $mensagem = $this->model->uploadProduct($nomeProduto, $categoriaProduto, $descricaoProduto, $precoProduto,  $estoqueProduto, $tamanhoProduto, $imagemProduto);

            // Exibe uma mensagem e redireciona após um atraso
            echo '<script>
                Swal.fire({
                    text: "' . $mensagem . '",
                    icon: "success",
                }).then(function() {
                    window.location.href="../index.php";
                });
             </script>';
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


        // Chama o método para fazer upload do produto
        $productController->uploadProduct($nome_produto, $categoria_produto, $descricao_produto, $preco_produto, $estoque_produto, $tamanho_produto,  $imagem_produto);
    }

    ?>

</body>

</html>