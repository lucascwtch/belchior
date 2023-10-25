<?php 
class ConexaoComBanco {
    private $conexao;

    public function __construct($servidor, $banco, $usuario, $senha) {
        try {
            // Inicializa a conexão PDO
            $this->conexao = new PDO("mysql:host=$servidor;dbname=$banco", $usuario, $senha);
            $this->conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $erro) {
            // Em vez de apenas exibir o erro, lance uma exceção para tratamento adequado
            throw new Exception("Erro de Conexão: " . $erro->getMessage());
        }
    }

    public function getConexao() {
        // Retorna a conexão ativa
        return $this->conexao;
    }
}

// Configurações de conexão
$servidor = "localhost";
$banco = "belchior";
$usuario = "root";
$senha = "";

try {
    // Criar uma instância da classe para estabelecer a conexão
    $gerenciadorConexao = new ConexaoComBanco($servidor, $banco, $usuario, $senha);

    // Obter a conexão ativa
    $conexao = $gerenciadorConexao->getConexao();
} catch (Exception $e) {
    // Lidar com erros de conexão
    echo "Erro: " . $e->getMessage();
    $conexao = null;
}
