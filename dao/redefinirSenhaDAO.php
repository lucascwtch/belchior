<?php

require_once "../controller/config.php";


class UsuarioDAO {
    private $db;

    public function __construct($conexao) {
        $this->db = $conexao;
    }

    public function getUsuarioByToken($token) {
        $query = $this->db->prepare("SELECT * FROM usuarios WHERE token = :token");
        $query->bindParam(':token', $token, PDO::PARAM_STR);
        $query->execute();
        return $query->fetch(PDO::FETCH_ASSOC);
    }

    public function atualizarSenha($token, $senhaHash) {
        $updateQuery = $this->db->prepare("UPDATE usuarios SET senha = :nova_senha WHERE token = :token");
        $updateQuery->bindParam(':nova_senha', $senhaHash, PDO::PARAM_STR);
        $updateQuery->bindParam(':token', $token, PDO::PARAM_STR);
        return $updateQuery->execute();
    }
}
?>
