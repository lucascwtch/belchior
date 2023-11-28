<?php
require_once"../controller/config.php";

class AfiliarModel{
    private $conexao;

    public function __construct($conexao){
        $this->conexao = $conexao;
}


public function temEmailInSolicitacoes($email) {
    $consultaEmail = $this->conexao->prepare("SELECT * FROM solicitacoesAfiliar WHERE emailUsuarioCliente = :email");
    $consultaEmail->bindParam(':email', $email, PDO::PARAM_STR);
    $consultaEmail->execute();

    return $consultaEmail->rowCount() > 0;
}


public function selectByEmail($dadosPost){
    $consultaEmail = $this->conexao->prepare("SELECT * FROM usuarios WHERE emailUsuario = :email");
    $consultaEmail->bindParam(':email', $dadosPost['emailUsuarioCliente'], PDO::PARAM_STR);
    $consultaEmail->execute();

    return $consultaEmail->rowCount() > 0;
}


public function insertAfiliarPedidos($dadosPost){
    $insertAfiliar = "INSERT INTO solicitacoesAfiliar (nomeUsuarioCliente, emailUsuarioCliente,
    cpfUsuarioCliente, telefoneUsuarioCliente, mensagemUsuarioCliente, fkIdUsuario)
    VALUES(:nome, :email, :cpf, :telefone,:mensagem, :fkIdUsuario)";
    $atualizarStatusInstrucao = $this->conexao->prepare($insertAfiliar);
    $atualizarStatusInstrucao->bindParam(':nome', $dadosPost['nomeUsuarioCliente'], PDO::PARAM_STR);
    $atualizarStatusInstrucao->bindParam(':email', $dadosPost['emailUsuarioCliente'], PDO::PARAM_STR);
    $atualizarStatusInstrucao->bindParam(':cpf', $dadosPost['cpfUsuarioCliente'], PDO::PARAM_INT);
    $atualizarStatusInstrucao->bindParam(':telefone', $dadosPost['telefoneUsuarioCliente'], PDO::PARAM_STR);
    $atualizarStatusInstrucao->bindParam(':mensagem', $dadosPost['mensagemUsuarioCliente'], PDO::PARAM_STR);
    $atualizarStatusInstrucao->bindParam(':fkIdUsuario', $dadosPost['idUsuario'], PDO::PARAM_INT);
    $atualizarStatusInstrucao->execute();
    return $atualizarStatusInstrucao->rowCount() > 0;
}


}