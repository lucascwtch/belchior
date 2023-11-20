
<?php
require_once "../controller/config.php";

// ProdutoDAO.php

class ProdutoDAO {
    private $db;

    public function __construct($conexao) {
        $this->db = $conexao;
    }

    public function getAllProdutos() {
        // Retorna todos os produtos do banco de dados
        $query = "SELECT * FROM produtos";
        $result = $this->db->query($query);
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }
    //adicionar outras consultas
}
