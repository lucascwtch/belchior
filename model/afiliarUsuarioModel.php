<?php
require_once"../controller/config.php";

class AfiliarModel{
    private $conexao;

    public function __construct($conexao){
        $this->conexao = $conexao;
}

public function selectByEmail($userEmail){
    $consultaEmail = $this->conexao->prepare("SELECT * FROM usuarios WHERE emailUsuario = :email");
    $consultaEmail->bindParam(':email', $userEmail, PDO::PARAM_STR);
    $consultaEmail->execute();

    return $consultaEmail->rowCount() > 0;
}


public function updateUserByCPF($userCpf){
    $atualizarStatusQuery = "UPDATE usuarios SET statusUsuario = 2 WHERE cpfUsuario = :cpf";
    $atualizarStatusInstrucao = $this->conexao->prepare($atualizarStatusQuery);

    $atualizarStatusInstrucao->bindParam(':cpf', $userCpf, PDO::PARAM_STR);
    $atualizarStatusInstrucao->execute();

    return $atualizarStatusInstrucao->rowCount() > 0;
}


}