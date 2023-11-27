<?php

class UserProfileModel {
    private $profileName;
    private $profileId;
    private $profileSecondName;
    private $profileEmail;
    private $profileApelido;
    private $profileCPF;
    private $profileDataNascimento;

    private $profileTelefone;

    public function __construct($profileName, $profileId, $profileSecondName, $profileEmail, $profileApelido, $profileCPF, $profileDataNascimento , $profileTelefone ){
        $this->profileName = $profileName;
        $this->profileId = $profileId;
        $this->profileSecondName = $profileSecondName;
        $this->profileEmail = $profileEmail;
        $this->profileApelido = $profileApelido;
        $this->profileCPF = $profileCPF;
        $this->profileDataNascimento = $profileDataNascimento;
        $this->profileTelefone = $profileTelefone;
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

    public function getProfileCPF(){
        return $this->profileCPF;
    }

    public function getProfileDataNascimento(){
        return $this->profileDataNascimento;
    }

    public function getProfileTelefone(){
        return $this->profileTelefone;
    }
}

