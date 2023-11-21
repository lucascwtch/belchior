<?php

require_once "../model/produtoModel.php";
require_once "../dao/produtoDAO.php";
class ProdutoController {
    
    private $model;

    public function __construct($conexao) {
        
        $this->model = new ProdutoModel($conexao);
        
    }

    public function listarProdutos() {
        // Obtém a lista de produtos do modelo
        return $this->model->getAllProdutos();

        // Inclui a view para exibir os produtos
        require "../view/produtos";

      
    }
}
