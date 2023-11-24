<?php

class UsuarioModel {
    private $dao;

    public function __construct($conexao) {
        $this->dao = new UsuarioDAO($conexao);
    }

    public function verificarToken($tokenUsuario) {
        return $this->dao->getUsuarioByToken($tokenUsuario);
    }

    public function atualizarSenha($tokenUsuario, $novaSenha) {
        $senhaHash = password_hash($novaSenha, PASSWORD_DEFAULT);
        return $this->dao->atualizarSenha($tokenUsuario, $senhaHash);
    }
}
?>
