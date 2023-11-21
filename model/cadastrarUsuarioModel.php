<?php
// RegistroModel.php

class RegistroModel {
    private $dao;

    public function __construct($conexao) {
        $this->dao = new RegistroDAO($conexao);
    }

    public function manipularRegistro($dadosPost) {
        
        return $this->dao->manipularRegistro($dadosPost);
    }
}
?>
