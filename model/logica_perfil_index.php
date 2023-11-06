<?php

require "controller/config.php";

class UserProfile {
    private $profileName;
    private $profileLink;

    public function __construct() {
        session_start();
        if (isset($_SESSION['user_logged_in']) && $_SESSION['user_logged_in'] && isset($_SESSION['user_profile_name']) && isset($_SESSION['user_apelido'])) {
            $this->profileName = $_SESSION['user_profile_name'];
            $this->profileLink = 'view/perfil.php'; // Link para o perfil quando o usuário está logado
        } else {
            $this->profileName = 'Login';
            $this->profileLink = 'view/login_page.html'; // Link para a página de login quando o usuário não está logado
        }
    }

    public function getProfileName() {
        return $this->profileName;
    }

    public function getProfileLink() {
        return $this->profileLink;
    }
}

// Criar uma instância da classe UserProfile
$userProfile = new UserProfile();

// Acessar as informações do perfil
$profileName = $userProfile->getProfileName();
$profileLink = $userProfile->getProfileLink();

// Agora você pode usar $profileName e $profileLink conforme necessário
?>
