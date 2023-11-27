<?php

include_once "logica_perfil.php";
require "../controller/config.php";

class updaterProfile {
    private $conexao;

    public function __construct($conexao) {
        $this->conexao = $conexao; // Corrigindo a atribuição da conexão
    }

    public function updateProfile($profileId, $nomeUsuario, $emailUsuario, $sobrenomeUsuario, $cpfUsuario, $apelidoUsuario, $dataNascimentoUsuario) {
        $sql = "UPDATE usuarios SET nomeUsuario = ?, emailUsuario = ? , sobrenomeUsuario = ?, cpfUsuario = ? ,apelidoUsuario= ? ,dataNascimentoUsuario = ? WHERE idUsuario = ?";
        $query = $this->conexao->prepare($sql);
        $query->execute([$nomeUsuario, $emailUsuario, $sobrenomeUsuario ,$cpfUsuario, $apelidoUsuario, $dataNascimentoUsuario, $profileId]);

        //EXIBIR MENSAGEM SE O USUÁRIO FOI ATUALIZADO
        echo '<script>alert("Usuário Atualizado"); window.location = "../view/perfil.php";</script>';
    }

   
}

Class userProfileSet{
    public function updateSessionUserName($newName, $newEmail, $newLastName, $newCPF, $newUsername, $newDate){

        session_start();
        $_SESSION['user_profile_name'] = $newName;
        $_SESSION['user_apelido'] = $newUsername;
        //$_SESSION{'user_profile_last_name'} = $newLastName;
        $_SESSION['user_email'] = $newEmail;
        $_SESSION['user_cpf'] = $newCPF; 
        $_SESSION['user_data_nascimento'] = $newDate;

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

    $updaterProfile = new updaterProfile($conexao); // Use a conexão do config.php

    $updaterProfile->updateProfile($profileId, $nomeUsuario, $emailUsuario, $sobrenomeUsuario, $cpfUsuario, $apelidoUsuario, $dataNascimentoUsuario);

    $userProfileSession = new userProfileSet();
    $userProfileSession->updateSessionUserName($nomeUsuario, $emailUsuario, $sobrenomeUsuario, $cpfUsuario, $apelidoUsuario, $dataNascimentoUsuario);
}
