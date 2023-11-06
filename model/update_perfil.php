<?php

include_once "logica_perfil.php";
require "../controller/config.php";

class updaterProfile {
    private $conexao;

    public function __construct($conexao) {
        $this->conexao = $conexao; // Corrigindo a atribuição da conexão
    }

    public function updateProfile($profileId, $nome, $email, $sobrenome, $telefone, $apelido, $data_nascimento) {
        $sql = "UPDATE usuarios SET nome = ?, email = ? , sobrenome = ?, telefone = ? ,apelido= ? ,data_nascimento = ? WHERE id = ?";
        $query = $this->conexao->prepare($sql);
        $query->execute([$nome, $email, $sobrenome,$telefone, $apelido, $data_nascimento, $profileId]);

        //EXIBIR MENSAGEM SE O USUÁRIO FOI ATUALIZADO
        echo '<script>alert("Usuário Atualizado"); window.location = "../view/perfil.php";</script>';
    }

   
}

Class userProfileSet{
    public function updateSessionUserName($newName, $newEmail, $newLastName, $newPhone, $newUsername, $newDate){

        session_start();
        $_SESSION['user_profile_name'] = $newName;
        $_SESSION['user_apelido'] = $newUsername;
        $_SESSION['user_email'] = $newEmail;
        $_SESSION['user_telefone'] = $newPhone; 
        $_SESSION['user_data_nascimento'] = $newDate;

    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['inputFirstName'];
    $email = $_POST['inputEmailAddress'];
    $sobrenome = $_POST['inputLastName'];
    $telefone = $_POST['inputPhone'];
    $apelido = $_POST['inputUsername'];
    $data_nascimento = $_POST['inputBirthday'];

    // Suponha que $profileId seja definido em logica_perfil.php
    $profileId = $profileId ?? 1; //valor padrão se $profileId não estiver definido

    $updaterProfile = new updaterProfile($conexao); // Use a conexão do config.php

    $updaterProfile->updateProfile($profileId, $nome, $email, $sobrenome, $telefone, $apelido, $data_nascimento);

    $userProfileSession = new userProfileSet();
    $userProfileSession->updateSessionUserName($nome, $email, $sobrenome, $telefone, $apelido, $data_nascimento);
}
