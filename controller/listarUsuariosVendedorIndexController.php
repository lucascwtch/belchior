<?php

require_once "model/listarUsuarioVendedorIndexModel.php";
require_once "dao/listarUsuarioVendedorIndexDAO.php";

class UsuarioClienteController {

    private $model;

    public function __construct($conexao) {
        $this->model = new UsuarioClienteModel($conexao);
    }

    public function listarUsuarios() {
        try {
            // Obtém os usuários do modelo
            $usuarios = $this->model->getClienteVendedor();
    
            // Verifica se há usuários 
            if (!empty($usuarios)) {
                
                return $usuarios;
               
                
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
$usuariosVendedor = $usuarioClienteController->listarUsuarios();


