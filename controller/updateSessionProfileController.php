<?php

require_once "updatePerfilController.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nomeUsuario = $_POST['inputFirstName'];
    $emailUsuario = $_POST['inputEmailAddress'];
    $sobrenomeUsuario = $_POST['inputLastName'];
    $telefoneUsuario = $_POST['inputPhone'];
    $apelidoUsuario = $_POST['inputUsername'];
    $dataNascimentoUsuario = $_POST['inputBirthday'];

    $profileId = $profileId ?? 1; // Valor padrão se $profileId não estiver definido

    $perfilController = new PerfilController($conexao);
    $perfilController->atualizarPerfil($profileId, $nomeUsuario, $emailUsuario, $sobrenomeUsuario, $telefoneUsuario, $apelidoUsuario, $dataNascimentoUsuario);

    session_start();
    $_SESSION['message'] = 'Perfil atualizado com sucesso';
}

