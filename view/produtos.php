<?php
// Exibe o resultado do var_dump na página da web
require_once "../controller/produtoController.php";


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Produtos</title>
    <style>
        /* Adicione estilos conforme necessário */
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        h1 {
            color: #333;
        }

        .produto {
            border: 1px solid #ccc;
            padding: 10px;
            margin-bottom: 20px;
        }

        .produto img {
            max-width: 100%;
            height: auto;
        }
    </style>
</head>
<body>
    <h1>Lista de Produtos</h1>
    <?php 
    
    $produtocontrolador = new ProdutoController($conexao);
    
    $produtos = $produtocontrolador->listarProdutos()
    
    ?>
    <?php foreach ($produtos as $produto): ?>
        <div class="produto">
            <h2><?= $produto['tituloProduto'] ?></h2>
            <p>Tipo: <?= $produto['categoriaProduto'] ?></p>
            <p>Preço: R$<?= number_format($produto['precoProduto'], 2, ',', '.') ?></p>
            <p>Especificações: <?= $produto['tamanhoProduto'] ?></p>
            <p>Descrição: <?= $produto['descricaoProduto'] ?></p>
            <img src="../assets/img/produtos/<?= $produto['imagemProduto'] ?>" alt="<?= $produto['tituloProduto'] ?>">
        </div>
    <?php endforeach; ?>
</body>
</html>
