<?php
require_once "../controller/config.php";

class alterarStatusModel {
    private $conexao;

    public function __construct($conexao) {
        $this->conexao = $conexao;
    }

    // Restante do seu código...

    public function updateStatusUsuario($idUsuario, $novoStatus) {
        $atualizarStatusQuery = "UPDATE usuarios SET statusUsuario = :novoStatus WHERE idUsuario = :idUsuario";
        $atualizarStatusInstrucao = $this->conexao->prepare($atualizarStatusQuery);

        $atualizarStatusInstrucao->bindParam(':novoStatus', $novoStatus, PDO::PARAM_INT);
        $atualizarStatusInstrucao->bindParam(':idUsuario', $idUsuario, PDO::PARAM_INT);

        $atualizarStatusInstrucao->execute();

        return $atualizarStatusInstrucao->rowCount() > 0;
    }

    public function excluirSolicitacaoAfiliar($idUsuario) {
        $excluirSolicitacaoQuery = "DELETE FROM solicitacoesAfiliar WHERE fkIdUsuario = :idUsuario";
        $excluirSolicitacaoInstrucao = $this->conexao->prepare($excluirSolicitacaoQuery);

        $excluirSolicitacaoInstrucao->bindParam(':idUsuario', $idUsuario, PDO::PARAM_INT);

        $excluirSolicitacaoInstrucao->execute();

        return $excluirSolicitacaoInstrucao->rowCount() > 0;
    }
}
?>
