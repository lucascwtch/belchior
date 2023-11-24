<?php

require_once "../controller/config.php";


class UsuarioDAO {
    private $db;

    public function __construct($conexao) {
        $this->db = $conexao;
    }

    public function getUsuarioByToken($tokenUsuario) {
        $query = $this->db->prepare("SELECT * FROM usuarios WHERE tokenUsuario = :tokenUsuario");
        $query->bindParam(':tokenUsuario', $tokenUsuario, PDO::PARAM_STR);
        $query->execute();
        return $query->fetch(PDO::FETCH_ASSOC);
    }

    public function atualizarSenha($tokenUsuario, $senhaHash) {
        $updateQuery = $this->db->prepare("UPDATE usuarios SET senhaUsuario = :nova_senha WHERE tokenUsuario = :tokenUsuario");
        $updateQuery->bindParam(':nova_senha', $senhaHash, PDO::PARAM_STR);
        $updateQuery->bindParam(':tokenUsuario', $tokenUsuario, PDO::PARAM_STR);
        return $updateQuery->execute();
    }
}
?>
