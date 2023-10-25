<?php

class ConexaoBD {
    private $conexao;

    public function __construct($servidor, $banco, $usuario, $senha) {
        try {
            $this->conexao = new PDO("mysql:host=$servidor;dbname=$banco", $usuario, $senha);
            $this->conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $erro) {
            echo "Erro de Conexão: {$erro->getMessage()}";
            $this->conexao = null;
        }
    }

    public function getConexao() {
        return $this->conexao;
    }
}

// Configurações de conexão
$servidor = "localhost";
$banco = "belchior";
$usuario = "root";
$senha = "";

// Criar uma instância da classe para estabelecer a conexão
$gerenciadorConexao = new ConexaoBD($servidor, $banco, $usuario, $senha);

// Obter a conexão ativa
$conexao = $gerenciadorConexao->getConexao();
?>
