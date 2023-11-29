<?php
require_once "../controller/config.php";



Class ListarProdutosModel{
    private $conexao;

    public function __construct($conexao){
        $this->conexao = $conexao;
    }


    public function listarProdutosByUsuarioId($fkIdUsuario){

        $sql  = $this->conexao->prepare("SELECT*FROM produtos WHERE fkUsuario = $fkIdUsuario");
        $sql -> execute();
        return $sql->fetchAll(PDO::FETCH_ASSOC);

    }

    public function listarProdutosGeral(){
        $sql  = $this->conexao->prepare("SELECT*FROM produtos");
        $sql -> execute();
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }

}