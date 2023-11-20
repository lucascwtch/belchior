<?php
// ProdutoModel.php

class ProdutoModel {
    private $dao;

    public function __construct($conexao) {
        $this->dao = new ProdutoDAO($conexao);
    }

    public function getAllProdutos() {
        // Obtém todos os produtos da DAO
        return $this->dao->getAllProdutos();
    }
}
