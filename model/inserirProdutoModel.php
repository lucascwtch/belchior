<?php
// ProductModel.php

class ProductModel {
    private $dao;

    public function __construct($conexao) {
        $this->dao = new ProductDAO($conexao);
    }

    public function uploadProduct($nomeProduto, $categoriaProduto, $descricaoProduto, $precoProduto, $tamanhoProduto, $estoqueProduto, $imagemProduto, $fkIdUsuario) {
        $this->dao->uploadProduct($nomeProduto, $categoriaProduto, $descricaoProduto, $precoProduto, $tamanhoProduto, $estoqueProduto, $imagemProduto, $fkIdUsuario);
    }
}
?>
