<?php

include_once "../model/updatePerfilModel.php";
include_once "../dao/updatePerfilDAO.php";

// controller/UserController.php
class UserController {
    private $userModel;
    private $userDAO;

    private $userNav;

    public function __construct($conexao) {
        $this->userModel = new UserModel($conexao);
        $this->userDAO = new UserDAO($conexao);
        
    }

    

    public function updateProfile($profileId, $nomeUsuario, $emailUsuario, $cpfUsuario, 
    $apelidoUsuario, $dataNascimentoUsuario, $telefoneUsuario) {
        $this->userModel->updateProfile($profileId, $nomeUsuario, $emailUsuario,
         $cpfUsuario, $apelidoUsuario, $dataNascimentoUsuario, $telefoneUsuario);
    }

    public function showMessage($message, $redirectUrl) {
        echo "<script>alert('$message');window.locaation.href='$redirectUrl';
        </script>";

        

    }

}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nomeUsuario = $_POST['inputFirstName'];
    $emailUsuario = $_POST['inputEmailAddres'];
    $cpfUsuario = $_POST['inputCPF'];
    $apelidoUsuario = $_POST['inputUsername'];
    $dataNascimentoUsuario = $_POST['inputBirthday'];
    $telefoneUsuario = $_POST['inputPhone'];
    $profileId = $_POST['inputId'];

    $userController = new UserController($conexao);

    $userController->updateProfile($profileId, $nomeUsuario, 
    $emailUsuario,$cpfUsuario, $apelidoUsuario, $dataNascimentoUsuario, $telefoneUsuario);
    $userController->showMessage("Usuário Atualizado", "../index.php");

    
}