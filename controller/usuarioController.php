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
include_once('config.php');

class UsuarioModel {
    private $idUsuario;
    private $emailUsuario;

    private $conexao; // Adiciona uma propriedade para armazenar a conexão

    public function __construct($idUsuario, $emailUsuario, $conexao) {
        $this->setIdUsuario($idUsuario);
        $this->setEmailUsuario($emailUsuario);
        $this->conexao = $conexao;
    }

    public function getIdUsuario() {
        return $this->idUsuario;
    }

    public function setIdUsuario($idUsuario) {
        $this->idUsuario = $idUsuario;
    }

    public function getEmailUsuario() {
        return $this->emailUsuario;
    }

    public function setEmailUsuario($emailUsuario) {
        $this->emailUsuario = $emailUsuario;
    }

    public function exibirInformacoes() {
        return "ID: " . $this->getIdUsuario() . ", Email: " . $this->getEmailUsuario();
    }

    public function getAniversariantes() {
        try {
            $query = "SELECT idUsuario, emailUsuario FROM usuarios WHERE DAY(dataNascimentoUsuario) = DAY(NOW()) AND MONTH(dataNascimentoUsuario) = MONTH(NOW())";
            $stmt = $this->conexao->prepare($query);
            $stmt->execute();

            $aniversariantes = array();

            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $usuario = new UsuarioModel($row['idUsuario'], $row['emailUsuario'], $this->conexao);
                $aniversariantes[] = $usuario;
            }

            return $aniversariantes;
        } catch (PDOException $e) {
            throw new Exception("Erro ao buscar aniversariantes: " . $e->getMessage());
        }
    }
}

class UsuarioController {
    private $usuarioModel;

    public function __construct(UsuarioModel $usuarioModel) {
        $this->usuarioModel = $usuarioModel;
    }

    public function listarAniversariantes() {
        return $this->usuarioModel->getAniversariantes();
    }
}

// Exemplo de uso
$idUsuario = 1;
$emailUsuario = "@example.com";

// Criar uma instância do modelo
$usuarioModel = new UsuarioModel($idUsuario, $emailUsuario, $conexao);

// Criar uma instância do controlador passando o modelo como parâmetro
$usuarioController = new UsuarioController($usuarioModel);

// Chamar o método do controlador para obter os aniversariantes
$aniversariantes = $usuarioController->listarAniversariantes();

// Exemplo de como você pode usar os dados retornados
foreach ($aniversariantes as $aniversariante) {
    echo "ID do Aniversariante: " . $aniversariante->getIdUsuario() . "<br>";
    echo "Email do Aniversariante: " . $aniversariante->getEmailUsuario() . "<br>";
}
