<?php
require_once "controller/config.php";



Class ListarProdutosIndexModel{
    private $conexao;

    public function __construct($conexao){
        $this->conexao = $conexao;
    }


    public function listarProdutosByUsuarioId($fkIdUsuario){

        $sql  = $this->conexao->prepare("SELECT produtos.*, usuarios.nomeUsuario 
        FROM produtos
        INNER JOIN usuarios ON produtos.fkUsuario = usuarios.idUsuario
        WHERE usuarios.idUsuario = produtos.fkUsuario");
        $sql -> execute();
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function listarProdutosGeral(){
        $sql  = $this->conexao->prepare("SELECT produtos.*, usuarios.nomeUsuario 
        FROM produtos
        INNER JOIN usuarios ON produtos.fkUsuario = usuarios.idUsuario
        WHERE usuarios.idUsuario = produtos.fkUsuario");
        $sql -> execute();
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }

}