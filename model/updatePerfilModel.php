<?php

class PerfilModel {
    private $dao;

    public function __construct($dao) {
        $this->dao = $dao;
    }

    public function updatePerfil($profileId, $nome, $email, $sobrenome, $telefone, $apelido, $data_nascimento) {
        $this->dao->updatePerfil($profileId, $nome, $email, $sobrenome, $telefone, $apelido, $data_nascimento);
    }
}
