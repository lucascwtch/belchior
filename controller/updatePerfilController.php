<?php

include_once "../model/updatePerfilModel.php";
include_once "../dao/updatePerfilDAO.php";

// controller/UserController.php
class UserController {
    private $userModel;
    private $userDAO;

    public function __construct($conexao) {
        $this->userModel = new UserModel($conexao);
        $this->userDAO = new UserDAO($conexao);
    }

    

    public function updateProfile($profileId, $nomeUsuario, $emailUsuario, $cpfUsuario, 
    $apelidoUsuario, $dataNascimentoUsuario, $telefoneUsuario) {
        $this->userModel->updateProfile($profileId, $nomeUsuario, $emailUsuario,
         $cpfUsuario, $apelidoUsuario, $dataNascimentoUsuario, $telefoneUsuario);
    }

    public function updateSessionUserName($newName, $newEmail,$newCPF, $newUsername, $newDate, $newPhone) {
        session_start();
        $_SESSION['user_profile_name'] = $newName;
        $_SESSION['user_apelido'] = $newUsername;
        $_SESSION['user_email'] = $newEmail;
        $_SESSION['user_cpf'] = $newCPF;
        $_SESSION['user_data_nascimento'] = $newDate;
        $_SESSION['user_telefone'] = $newPhone;
    }

    public function showMessage($message, $redirectUrl) {
        echo "<script>alert('$message');window.locaation  '$redirectUrl';
        </script>";
    }

}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nomeUsuario = $_POST['inputFirstName'];
    $emailUsuario = $_POST['inputEmailAddress'];
    $cpfUsuario = $_POST['inputCPF'];
    $apelidoUsuario = $_POST['inputUsername'];
    $dataNascimentoUsuario = $_POST['inputBirthday'];
    $telefoneUsuario = $_POST['inputPhone'];

    
    $profileId = $_SESSION['user_id'];

    $userController = new UserController($conexao);

    $userController->updateProfile($profileId, $nomeUsuario, 
    $emailUsuario,$cpfUsuario, $apelidoUsuario, $dataNascimentoUsuario, $telefoneUsuario);

    $userController->updateSessionUserName($nomeUsuario, $emailUsuario,$cpfUsuario, 
    $apelidoUsuario, $dataNascimentoUsuario, $telefoneUsuario);
    $userController->showMessage("Usuário Atualizado", "../view/perfil.php");

    var_dump($profileId);
    
}