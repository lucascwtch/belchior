<?php class UserProfile {
    private $profileName;
    private $profileId;
    private $profileSecondName;
    private $profileEmail;
    private $profileApelido;
    private $profileTelefone;
    private $profiledataNascimento;



    public function __construct() {
        session_start();
        if (isset($_SESSION['user_logged_in']) && $_SESSION['user_logged_in'] && 
        isset($_SESSION['user_profile_name'])  && isset($_SESSION['user_id']) && 
        isset($_SESSION['user_sobrenome']) && isset($_SESSION['user_email']) &&
        isset($_SESSION['user_apelido']) && isset($_SESSION['user_telefone']) &&
        isset($_SESSION['user_data_nascimento'])){

            $this->profileName = $_SESSION['user_profile_name'];
            $this->profileId = $_SESSION['user_id'];
            $this->profileSecondName = $_SESSION['user_sobrenome'];
            $this->profileEmail = $_SESSION['user_email'];
            $this->profileApelido = $_SESSION['user_apelido']; 
            $this->profileTelefone = $_SESSION['user_telefone'];
            $this->profiledataNascimento = $_SESSION['user_data_nascimento'];

        } else {
            $this->profileName = 'Login';
        }
    }

    public function getProfileName() {
        return $this->profileName;
    }

    public function getProfileId(){
        return $this->profileId;
    }
    public function getProfileSecondName() {
        return $this->profileSecondName;
    }

    public function getProfileEmail(){
        return $this->profileEmail;
    }

    public function getProfileApelido(){
        return $this->profileApelido;
    }

    public function getProfileTelefone(){
        return $this->profileTelefone;
    }

    public function getProfiledataNascimento(){
        return $this->profiledataNascimento;
    }
}



// Criar uma instância da classe UserProfile
$userProfile = new UserProfile();

// Obter o nome de perfil
$profileName = $userProfile->getProfileName();

// Obter o Id do perfil
$profileId = $userProfile->getProfileId();

// Obter o Sobrenome do Perfil
$profileSecondName = $userProfile->getProfileSecondName();

// Obter o Email do Perfil
$profileEmail = $userProfile->getProfileEmail();

//Obter o Apelido do Perfil
$profileApelido = $userProfile->getProfileApelido();


//Obter o Telefone do Perfil
$profileTelefone = $userProfile->getProfileTelefone();


//Obter o Nascimento do Perfil
$profiledataNascimento = $userProfile->getProfiledataNascimento();




?>