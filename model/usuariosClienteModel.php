<?php


Class UsuarioClienteModel{

    private $dao;

    public function __construct($conexao){

        $this->dao = new UsuarioClienteDAO($conexao);

    }

    public function getClienteByStats(){
        return $this->dao->getClientes();
    }
}