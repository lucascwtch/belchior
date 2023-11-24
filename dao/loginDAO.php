<?php
require_once "../controller/config.php";
class UserDAO {
    private $conexao;

    public function __construct($conexao) {
        $this->conexao = $conexao;
    }

    public function getUserByEmail($email) {
        $query = $this->conexao->prepare("SELECT * FROM usuarios WHERE emailUsuario = ?");
        $query->execute([$email]);
        return $query->fetch(PDO::FETCH_ASSOC);
    }
    
    // Adicione métodos adicionais conforme necessário, como insertUser, updateUser, etc.
}
?>
