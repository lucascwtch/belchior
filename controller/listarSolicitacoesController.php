
<?php
require_once "../model/listarSolicitacoesModel.php";

//LISTAR SOLICITAÇOES FILIAR

Class ListarSolicitacoesController{
private $model;

public function __construct($conexao) {
    $this->model = new listarSolicitacoesModel($conexao);
}

public function listarUsuariosFiliar() {
        try {
            // Obtém os usuários do modelo
            $usuarios = $this->model->listarSolicitacoes();
    
            // Verifica se há usuários antes de converter para JSON
            if (!empty($usuarios)) {
                // Converte os usuários para JSON
                $usuariosJSON = json_encode($usuarios);
    
                // Exibe o JSON
                echo "$usuariosJSON";
                
            } else {
                echo "Nenhum usuário encontrado";
            }
        } catch (Exception $e) {
            // Lida com exceções, se ocorrerem
            echo "Erro ao listar usuários: " . $e->getMessage();
        }
    }

}

$listarSolicitacoesController = new ListarSolicitacoesController($conexao);
$listarSolicitacoesController->listarUsuariosFiliar();
