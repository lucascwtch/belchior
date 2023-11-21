<?php


class UserModel {
    private $dao;

    public function __construct($conexao) {
        $this->dao = new UserDAO($conexao);
    }

    public function getUserByEmail($email) {
        return $this->dao->getUserByEmail($email);
    }
    
    // Adicione métodos adicionais conforme necessário.
}
?>
