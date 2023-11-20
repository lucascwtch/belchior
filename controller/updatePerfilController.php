<?php

include_once "../model/updatePerfilModel.php";
include_once "../dao/updatePerfilDAO.php";

class PerfilController {
    private $perfilModel;
    private $perfilDAO;

    public function __construct($conexao) {
        $this->perfilDAO = new PerfilDAO($conexao);
        $this->perfilModel = new PerfilModel($this->perfilDAO);
    }

    public function atualizarPerfil($profileId, $nome, $email, $sobrenome, $telefone, $apelido, $data_nascimento) {
        $this->perfilModel->updatePerfil($profileId, $nome, $email, $sobrenome, $telefone, $apelido, $data_nascimento);
        
        // Adicionar uma mensagem de sucesso à sessão
        $_SESSION['message'] = 'Perfil atualizado com sucesso';
        
        // Redirecionar de volta para a página do perfil
        header('Location: ../view/perfil.php');
        exit();
    }
}
