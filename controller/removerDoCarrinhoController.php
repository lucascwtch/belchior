<?php


if (session_status() == PHP_SESSION_NONE) {
    session_start();
}


if (isset($_GET['id'])) {
    $productId = $_GET['id'];

    // Encontre o produto no carrinho
    $index = array_search($productId, $_SESSION['cart']);

    // Remova o produto do carrinho se for encontrado
    if ($index !== false) {
        unset($_SESSION['cart'][$index]);

        // Reindexe o array para evitar buracos
        $_SESSION['cart'] = array_values($_SESSION['cart']);
    }
}

// Redirecione de volta para a página do carrinho
header('Location: ../view/carrinho.php');
exit();
