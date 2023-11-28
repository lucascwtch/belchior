<?php

require_once "../controller/config.php";

class ListarSolicitacoesModel {
    private $conexao;

    public function __construct($conexao) {
        $this->conexao = $conexao;
    }

    public function listarSolicitacoes(){
        $consultaEmail = $this->conexao->prepare("SELECT * FROM  solicitacoesafiliar");
        $consultaEmail->execute();
        return $consultaEmail->fetchAll(PDO::FETCH_ASSOC);
    }
    
}
?>
