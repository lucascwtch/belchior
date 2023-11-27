<?php
require_once "../controller/config.php";

// dao/UserDAO.php
class UserDAO {
    private $conexao;

    public function __construct($conexao) {
        $this->conexao = $conexao;
    }


    public function getUserById($userId) {
        $sql = "SELECT * FROM usuarios WHERE idUsuario = ?";
        $query = $this->conexao->prepare($sql);
        $query->execute([$userId]);
        return $query->fetch(PDO::FETCH_ASSOC);
    }
}
