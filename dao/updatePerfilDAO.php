<?php
require_once "../controller/config.php";

class PerfilDAO {
    private $conexao;

    public function __construct($conexao) {
        $this->conexao = $conexao;
    }

    public function updatePerfil($profileId, $nomeUsuario, $emailUsuario, $sobrenomeUsuario, $cpfUsuario, $apelidoUsuario, $dataNascimentoUsuario) {
        $sql = "UPDATE usuarios SET nomeUsuario = ?, emailUsuario = ?, sobrenomeUsuario = ?, cpfUsuario = ?, apelidoUsuario = ?, dataNascimentoUsuario = ? WHERE idUsuario = ?";
        $query = $this->conexao->prepare($sql);
        $query->execute([$profileId, $nomeUsuario, $emailUsuario, $sobrenomeUsuario, $cpfUsuario, $apelidoUsuario, $dataNascimentoUsuario]);
    }
}
