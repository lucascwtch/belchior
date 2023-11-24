<?php
class PasswordResetModel
{
    private $dao;

    public function __construct($dao)
    {
        $this->dao = $dao;
    }

    public function checkUserByEmail($email)
    {
        return $this->dao->checkUserByEmail($email);
    }

    public function updateTokenByEmail($email, $tokenUsuario)
    {
        return $this->dao->updateTokenByEmail($email, $tokenUsuario);
    }
}
