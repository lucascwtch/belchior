<?php

class PerfilModel {
    private $dao;

    public function __construct($dao) {
        $this->dao = $dao;
    }

    public function updatePerfil($profileId, $nomeUsuario, $emailUsuario, $sobrenomeUsuario, $telefoneUsuario, $apelidoUsuario, $dataNascimentoUsuario) {
        $this->dao->updatePerfil($profileId, $nomeUsuario, $emailUsuario, $sobrenomeUsuario, $telefoneUsuario, $apelidoUsuario, $dataNascimentoUsuario);
    }
}
