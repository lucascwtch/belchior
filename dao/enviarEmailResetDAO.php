<?php
class PasswordResetDAO {
    private $conexao;

    public function __construct($conexao) {
        $this->conexao = $conexao;
    }

    public function checkUserByEmail($email) {
        $query = $this->conexao->prepare("SELECT * FROM usuarios WHERE emailUsuario = :email");
        $query->bindParam(':email', $email, PDO::PARAM_STR);
        $query->execute();
        return $query->fetch(PDO::FETCH_ASSOC);
    }

    public function updateTokenByEmail($email, $token) {
        $updateQuery = $this->conexao->prepare("UPDATE usuarios SET tokenUsuario = :tokenUsuario WHERE emailUsuario = :email");
        $updateQuery->bindParam(':tokenUsuario', $token, PDO::PARAM_STR);
        $updateQuery->bindParam(':email', $email, PDO::PARAM_STR);
        $updateQuery->execute();
        return $updateQuery->rowCount() > 0;
    }
}
?> 