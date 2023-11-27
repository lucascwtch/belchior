<?php
class UserModel {
    private $conexao;

    public function __construct($conexao) {
        $this->conexao = $conexao;
    }

    public function updateProfile($profileId, $nomeUsuario, $emailUsuario, $sobrenomeUsuario, $cpfUsuario, $apelidoUsuario, $dataNascimentoUsuario) {
        $sql = "UPDATE usuarios SET nomeUsuario = ?, emailUsuario = ?, sobrenomeUsuario = ?, cpfUsuario = ?, apelidoUsuario = ?, dataNascimentoUsuario = ? WHERE idUsuario = ?";
        $query = $this->conexao->prepare($sql);
        $query->execute([$nomeUsuario, $emailUsuario, $sobrenomeUsuario, $cpfUsuario, $apelidoUsuario, $dataNascimentoUsuario, $profileId]);
    }

    
}
