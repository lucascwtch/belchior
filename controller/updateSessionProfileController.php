<?php

require_once "updatePerfilController.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['inputFirstName'];
    $email = $_POST['inputEmailAddress'];
    $sobrenome = $_POST['inputLastName'];
    $telefone = $_POST['inputPhone'];
    $apelido = $_POST['inputUsername'];
    $data_nascimento = $_POST['inputBirthday'];

    $profileId = $profileId ?? 1; // Valor padrão se $profileId não estiver definido

    $perfilController = new PerfilController($conexao);
    $perfilController->atualizarPerfil($profileId, $nome, $email, $sobrenome, $telefone, $apelido, $data_nascimento);

    session_start();
    $_SESSION['message'] = 'Perfil atualizado com sucesso';
}

