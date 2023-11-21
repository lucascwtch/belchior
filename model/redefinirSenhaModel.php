<?php

class UsuarioModel {
    private $dao;

    public function __construct($conexao) {
        $this->dao = new UsuarioDAO($conexao);
    }

    public function verificarToken($token) {
        return $this->dao->getUsuarioByToken($token);
    }

    public function atualizarSenha($token, $novaSenha) {
        $senhaHash = password_hash($novaSenha, PASSWORD_DEFAULT);
        return $this->dao->atualizarSenha($token, $senhaHash);
    }
}
?>
