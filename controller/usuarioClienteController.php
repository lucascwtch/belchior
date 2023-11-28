<?php
//USUARIOCLIENTE  LISTAR CLIENTES CADASTRADOS


require_once "../model/usuariosClienteModel.php";
require_once "../dao/usuariosClienteDAO.php";

class UsuarioClienteController {

    private $model;

    public function __construct($conexao) {
        $this->model = new UsuarioClienteModel($conexao);
    }

    public function listarUsuarios() {
        try {
            // Obtém os usuários do modelo
            $usuarios = $this->model->getClienteByStats();
    
            // Verifica se há usuários antes de converter para JSON
            if (!empty($usuarios)) {
                // Converte os usuários para JSON
                $usuariosJSON = json_encode($usuarios); 
    
                // Exibe o JSON
                echo $usuariosJSON;
            } else {
                echo "Nenhum usuário encontrado";
            }
        } catch (Exception $e) {
            // Lida com exceções, se ocorrerem
            echo "Erro ao listar usuários: " . $e->getMessage();
        }
    }
}

// Cria uma instância do controlador e lista os usuários
$usuarioClienteController = new UsuarioClienteController($conexao);
$usuarioClienteController->listarUsuarios();


