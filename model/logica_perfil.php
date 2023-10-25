<?php class UserProfile {
    private $profileName;

    public function __construct() {
        session_start();
        if (isset($_SESSION['user_logged_in']) && $_SESSION['user_logged_in'] && isset($_SESSION['user_profile_name'])) {
            $this->profileName = $_SESSION['user_profile_name'];
        } else {
            $this->profileName = 'Login';
        }
    }

    public function getProfileName() {
        return $this->profileName;
    }
}

// Criar uma instância da classe UserProfile
$userProfile = new UserProfile();

// Obter o nome de perfil
$profileName = $userProfile->getProfileName();

// Agora você pode usar $profileName conforme necessário
?>