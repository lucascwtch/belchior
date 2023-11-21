<?php
// RegistroController.php

require_once "../model/cadastrarUsuarioModel.php";
require_once "../dao/cadastrarUsuarioDAO.php";

class RegistroController {
    private $model;

    public function __construct($conexao) {
        $this->model = new RegistroModel($conexao);
    }

    public function manipularRegistro($dadosPost) {
        $mensagem = $this->model->manipularRegistro($dadosPost);

        // Exibir círculo de carregamento
        echo "<div id='carregando' class='escondido'>
                  <div class='carregador'></div>
              </div>";

        // Exibir mensagem e redirecionar após um atraso
        echo "<script language='javascript' type='text/javascript'>
                alert('$mensagem');
                document.getElementById('carregando').classList.remove('escondido');
                setTimeout(function() {
                    window.location = '../index.php';
                }, 3000);
              </script>";
    }
}

$registroController = new RegistroController($conexao);

// Coleta os dados do formulário de registro e chama o método para lidar com o registro
$dadosPost = $_POST;
$registroController->manipularRegistro($dadosPost);
?>
