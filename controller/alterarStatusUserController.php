<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Propostas</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

</head>

<body>

<?php
require_once "../model/alterarStatusUserModel.php";

class AtualizarStatusController {
    private $afiliarModel;

    public function __construct($conexao) {
        $this->afiliarModel = new alterarStatusModel($conexao);
    }

    public function atualizarStatusEExcluirSolicitacao($idUsuario) {
        // Atualiza o status na tabela usuarios
        $this->afiliarModel->updateStatusUsuario($idUsuario, 2);

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
    $atualizarStatusController->atualizarStatusEExcluirSolicitacao($idUsuario);

    // Redireciona para a página desejada após a conclusão
    echo "<script language='javascript' type='text/javascript'>
    Swal.fire({
        text: 'Proposta Aceita!',
        icon: 'success',
    });
  </script>";
exit();
}
?>

</body>
</html>