<?php

require __DIR__ . '/../model/perfilModel.php';



class UserProfileController {
    private $userProfileModel;

    public function __construct() {
        $this->initUserProfileModel();
    }

    private function initUserProfileModel() {
        $userProfileModel = null;

        if (isset($_SESSION['user_logged_in']) && $_SESSION['user_logged_in'] && 
            isset($_SESSION['user_profile_name'])  && isset($_SESSION['user_id']) && isset($_SESSION['user_email']))
        {
            $userProfileModel = new UserProfileModel(
                $_SESSION['user_profile_name'],
                $_SESSION['user_id'],
                $_SESSION['user_sobrenome'],
                $_SESSION['user_email'],
                $_SESSION['user_apelido'],
                $_SESSION['user_telefone'],
                $_SESSION['user_data_nascimento']
            );
        }

        $this->userProfileModel = $userProfileModel;
    }

    public function getUserProfileModel() {
        return $this->userProfileModel;
    }
}

