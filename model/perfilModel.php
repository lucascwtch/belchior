<?php

class UserProfileModel {
    private $profileName;
    private $profileId;
    private $profileSecondName;
    private $profileEmail;
    private $profileApelido;
    private $profileTelefone;
    private $profileDataNascimento;

    public function __construct($profileName, $profileId, $profileSecondName, $profileEmail, $profileApelido, $profileTelefone, $profileDataNascimento) {
        $this->profileName = $profileName;
        $this->profileId = $profileId;
        $this->profileSecondName = $profileSecondName;
        $this->profileEmail = $profileEmail;
        $this->profileApelido = $profileApelido;
        $this->profileTelefone = $profileTelefone;
        $this->profileDataNascimento = $profileDataNascimento;
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

    public function getProfileDataNascimento(){
        return $this->profileDataNascimento;
    }
}
?>
