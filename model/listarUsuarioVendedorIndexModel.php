<?php


Class UsuarioClienteModel{

    private $dao;

    public function __construct($conexao){

        $this->dao = new UsuarioVendedorDAO($conexao);

    }

    public function getClienteVendedor(){
        return $this->dao->getClientesVendedor();

    }
}