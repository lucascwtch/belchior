<?php
class UserModel
{
    private $conexao;

    public function __construct($conexao)
    {
        $this->conexao = $conexao;
    }

    public function updateProfile($profileId, $nomeUsuario, $emailUsuario, 
    $cpfUsuario, $apelidoUsuario, $dataNascimentoUsuario, $telefoneUsuario)
    {
        $sql = "UPDATE usuarios 
        SET nomeUsuario = ?, emailUsuario = ?,cpfUsuario = ?, apelidoUsuario = ?,
        dataNascimentoUsuario = ?, telefoneUsuario = ? WHERE idUsuario = ?";

        $query = $this->conexao->prepare($sql);
        $query->execute([$nomeUsuario, $emailUsuario, $cpfUsuario,
        $apelidoUsuario, $dataNascimentoUsuario, $telefoneUsuario, $profileId]);
    }

}
