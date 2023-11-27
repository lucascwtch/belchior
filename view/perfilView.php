<?php

require_once __DIR__ . '/../controller/perfilController.php';


$userProfileController = new UserProfileController();
$userProfileModel = $userProfileController->getUserProfileModel();


$profileApelido = $userProfileModel -> getProfileApelido();
$profileNome = $userProfileModel -> getProfileName();
$profileSobrenome = $userProfileModel -> getProfileSecondName();
$profileEmail = $userProfileModel -> getProfileEmail();
$profileCPF = $userProfileModel -> getProfileCPF();
$profileDataNascimento = $userProfileModel -> getProfileDataNascimento();
$profileID = $userProfileModel -> getProfileId();

