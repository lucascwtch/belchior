<?php

require_once __DIR__ . '/../model/perfilModel.php';



class UserProfileController {
    private $userProfileModel;

    public function __construct() {
        $this->initUserProfileModel();
    }

    private function initUserProfileModel() {
        session_start();
        $userProfileModel = null;
        if (isset($_SESSION['user_logged_in']) && $_SESSION['user_logged_in'] && 
            isset($_SESSION['user_profile_name'])  && isset($_SESSION['user_id']) && isset($_SESSION['user_email']))
        {
            $userProfileModel = new UserProfileModel(
                $_SESSION['user_profile_name'],
                $_SESSION['user_id'],
                $_SESSION['user_email'],
                $_SESSION['user_apelido'],
                $_SESSION['user_cpf'],
                $_SESSION['user_data_nascimento'],
                $_SESSION['user_telefone'],
                $_SESSION['user_adm'],
                $_SESSION['user_perfil_imagem']
            );
        }

        $this->userProfileModel = $userProfileModel;
    }

    public function getUserProfileModel() {
        return $this->userProfileModel;
    }
}



$userProfileController = new UserProfileController();
$userProfileModel = $userProfileController->getUserProfileModel();


$profileApelido = $userProfileModel -> getProfileApelido();
$profileNome = $userProfileModel -> getProfileName();
$profileEmail = $userProfileModel -> getProfileEmail();
$profileCPF = $userProfileModel -> getProfileCPF();
$profileDataNascimento = $userProfileModel -> getProfileDataNascimento();
$profileID = $userProfileModel -> getProfileId();
$profileTelefone = $userProfileModel -> getProfileTelefone();
$profileAdm = $userProfileModel -> getProfileAdm();
$profileImage = $userProfileModel -> getProfileImage();
