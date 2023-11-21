<?php
// ProductModel.php

class ProductModel {
    private $dao;

    public function __construct($conexao) {
        $this->dao = new ProductDAO($conexao);
    }

    public function uploadProduct($tipo, $nome, $preco, $especificacoes, $imagem) {
        return $this->dao->uploadProduct($tipo, $nome, $preco, $especificacoes, $imagem);
    }
}
?>
