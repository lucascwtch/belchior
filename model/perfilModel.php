<?php

class UserProfileModel {
    private $profileName;
    private $profileId;
    private $profileAdm;
    private $profileEmail;
    private $profileApelido;
    private $profileCPF;
    private $profileDataNascimento;

    private $profileTelefone;

    public function __construct($profileName, $profileId, $profileEmail, $profileApelido, $profileCPF, $profileDataNascimento , $profileTelefone, $profileAdm){
        $this->profileName = $profileName;
        $this->profileId = $profileId;
        $this->profileEmail = $profileEmail;
        $this->profileApelido = $profileApelido;
        $this->profileCPF = $profileCPF;
        $this->profileDataNascimento = $profileDataNascimento;
        $this->profileTelefone = $profileTelefone;
        $this->profileAdm = $profileAdm;
    }

    public function getProfileName() {
        return $this->profileName;
    }

    public function getProfileId(){
        return $this->profileId;
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

    public function getProfileAdm(){
        return $this->profileAdm;
    }
}

