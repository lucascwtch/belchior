<?php

require __DIR__ . '/../controller/navbarController.php';

$navbarController = new NavBarController();
$profileInfo = $navbarController->getProfileInfo();

$profileName = $profileInfo['profileName'];
$profileLink = $profileInfo['profileLink'];


