<?php
require_once "../controller/config.php";

class PerfilDAO {
    private $conexao;

    public function __construct($conexao) {
        $this->conexao = $conexao;
    }

    public function updatePerfil($profileId, $nome, $email, $sobrenome, $telefone, $apelido, $data_nascimento) {
        $sql = "UPDATE usuarios SET nome = ?, email = ?, sobrenome = ?, telefone = ?, apelido = ?, data_nascimento = ? WHERE id = ?";
        $query = $this->conexao->prepare($sql);
        $query->execute([$nome, $email, $sobrenome, $telefone, $apelido, $data_nascimento, $profileId]);
    }
}
