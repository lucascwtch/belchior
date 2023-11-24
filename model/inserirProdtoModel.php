<?php
// ProductModel.php

class ProductModel {
    private $dao;

    public function __construct($conexao) {
        $this->dao = new ProductDAO($conexao);
    }

    public function uploadProduct($tipoProduto, $nomeProduto, $precoProduto, $especificacoesProduto, $imagemProduto) {
        return $this->dao->uploadProduct($tipoProduto, $nomeProduto, $precoProduto, $especificacoesProduto, $imagemProduto);
    }
}
?>
