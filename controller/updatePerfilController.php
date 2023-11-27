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

    public function updateProfile($profileId, $nomeUsuario, $emailUsuario, $sobrenomeUsuario, $cpfUsuario, $apelidoUsuario, $dataNascimentoUsuario) {
        $this->userModel->updateProfile($profileId, $nomeUsuario, $emailUsuario, $sobrenomeUsuario, $cpfUsuario, $apelidoUsuario, $dataNascimentoUsuario);
    }

    public function updateSessionUserName($newName, $newEmail, $newLastName, $newCPF, $newUsername, $newDate) {
        session_start();
        $_SESSION['user_profile_name'] = $newName;
        $_SESSION['user_apelido'] = $newUsername;
        $_SESSION['user_email'] = $newEmail;
        $_SESSION['user_cpf'] = $newCPF;
        $_SESSION['user_data_nascimento'] = $newDate;
    }

    public function showMessage($message, $redirectUrl) {
        echo "<script>alert('$message'); window.location = '$redirectUrl';</script>";
    }

}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nomeUsuario = $_POST['inputFirstName'];
    $emailUsuario = $_POST['inputEmailAddress'];
    $sobrenomeUsuario = $_POST['inputLastName'];
    $cpfUsuario = $_POST['inputCPF'];
    $apelidoUsuario = $_POST['inputUsername'];
    $dataNascimentoUsuario = $_POST['inputBirthday'];

    // Suponha que $profileId seja definido em logica_perfil.php
    $profileId = $profileId ?? 1; //valor padrão se $profileId não estiver definido

    $userController = new UserController($conexao);

    $userController->updateProfile($profileId, $nomeUsuario, $emailUsuario, $sobrenomeUsuario, $cpfUsuario, $apelidoUsuario, $dataNascimentoUsuario);

    $userController->updateSessionUserName($nomeUsuario, $emailUsuario, $sobrenomeUsuario, $cpfUsuario, $apelidoUsuario, $dataNascimentoUsuario);
    $userController->showMessage("Usuário Atualizado", "../view/perfil.php");
}