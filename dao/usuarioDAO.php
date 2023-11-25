<?php

include_once('../controller/Config.php');
include_once('../model/UsuarioModel.php');

class UsuarioDAO {
    private $conexao;

    public function __construct($conexao) {
        $this->conexao = $conexao;
    }

    public function getAniversariantes() {
        $aniversariantes = array();

        try {
            $query = "SELECT idUsuario, emailUsuario FROM usuarios WHERE DAY(dataNascimentoUsuario) = DAY(NOW()) AND MONTH(dataNascimentoUsuario) = MONTH(NOW())";
            $stmt = $this->conexao->prepare($query);
            $stmt->execute();

            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $usuario = new UsuarioModel($row['idUsuario'], $row['emailUsuario']);
                $aniversariantes[] = $usuario;
            }
        } catch (PDOException $e) {
            throw new Exception("Erro ao buscar aniversariantes: " . $e->getMessage());
        }

        return $aniversariantes;
    }
}

// Exemplo de uso:
try {
    // Criar uma instância da classe para estabelecer a conexão
    $gerenciadorConexao = new ConexaoComBanco($servidor, $banco, $usuario, $senha);

    // Obter a conexão ativa
    $conexao = $gerenciadorConexao->getConexao();

    // Criar uma instância do DAO passando a conexão
    $usuarioDAO = new UsuarioDAO($conexao);

    // Obter aniversariantes
    $aniversariantes = $usuarioDAO->getAniversariantes();

    // Faça algo com $aniversariantes...

} catch (Exception $e) {
    // Lidar com erros de conexão
    echo "Erro: " . $e->getMessage();
    $conexao = null;
}
