<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}


if (isset($_GET['product_id'])) {
    $productId = $_GET['product_id'];

    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = array();
    }

    if (!in_array($productId, $_SESSION['cart'])) {
        $_SESSION['cart'][] = $productId;
    }

    header("Location: ../view/carrinho.php");
    exit();
}
