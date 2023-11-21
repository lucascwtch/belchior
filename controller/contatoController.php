<?php
require_once "../model/contatoModel.php";
require_once "../dao/contatoDAO.php";


class EmailController {
    private $model;

    public function __construct($conexao) {
        $this->model = new EmailModel($conexao);
    }

    public function sendEmails() {
        $this->model->sendEmails();
    }
}
?>

