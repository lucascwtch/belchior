
<?php
require_once __DIR__ . '/../model/navbarModel.php';


class NavBarController {
    private $userProfileModel;

    public function __construct() {
        $this->userProfileModel = new NavBarModel();
    }

    public function getProfileInfo() {
        return $this->userProfileModel->getProfileInfo();
    }
}
?>
