<?php




class NavBarModel {
    private $profileName;
    private $profileLink;

    public function __construct() {
        session_start();
        $this->initializeProfile();
    }

    private function initializeProfile() {
        if (isset($_SESSION['user_logged_in']) && $_SESSION['user_logged_in'] 
        && isset($_SESSION['user_profile_name'])) {
            $this->setProfileName($_SESSION['user_profile_name']);
            $this->setProfileLink('view/perfil.php');
        } else {
            $this->setProfileName('Login');
            $this->setProfileLink('view/login_page.php');
        }
    }

    public function getProfileName() {
        return $this->profileName;
    }

    public function setProfileName($profileName) {
        $this->profileName = $profileName;
    }

    public function getProfileLink() {
        return $this->profileLink;
    }

    public function setProfileLink($profileLink) {
        $this->profileLink = $profileLink;
    }

    public function getProfileInfo() {
        return [
            'profileName' => $this->getProfileName(),
            'profileLink' => $this->getProfileLink(),
        ];
    }
}
?>
