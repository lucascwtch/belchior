<?php
// RegistroModel.php

class RegistroModel {
    private $dao;

    public function __construct($conexao) {
        $this->dao = new RegistroDAO($conexao);
    }

    public function manipularRegistro($dadosPost) {
        // Sua lógica de manipulação de registro aqui
        return $this->dao->manipularRegistro($dadosPost);
    }
}
?>
