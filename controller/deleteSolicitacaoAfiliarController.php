<?php
require_once "../model/alterarStatusUserModel.php";

class AtualizarStatusController {
    private $afiliarModel;

    public function __construct($conexao) {
        $this->afiliarModel = new alterarStatusModel($conexao);
    }

    public function ExcluirSolicitacao($idUsuario) {
        // Exclui a entrada correspondente na tabela solicitacoesAfiliar
        $this->afiliarModel->excluirSolicitacaoAfiliar($idUsuario);
    }
}

// Verifica se a requisição é do tipo POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Obtém o ID do usuário a ser atualizado
    $idUsuario = $_POST['idUsuario']; // Certifique-se de ajustar o nome do campo conforme necessário

    // Cria uma instância do controlador
    $atualizarStatusController = new AtualizarStatusController($conexao);

    // Chama o método para atualizar o status e excluir a solicitação
    $atualizarStatusController->ExcluirSolicitacao($idUsuario);

    // Redireciona para a página desejada após a conclusão
    echo '<script>alert("Proposta Recusada!! ");</script>';        
    exit();
}
?>
