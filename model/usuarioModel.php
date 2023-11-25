<?php

class UsuarioModel {
    private $idUsuario;
    private $emailUsuario;

    public function __construct($idUsuario, $emailUsuario) {
        $this->setIdUsuario($idUsuario);
        $this->setEmailUsuario($emailUsuario);
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
                $usuario = new UsuarioModel($row['idUsuario'], $row['emailUsuario']);
                $aniversariantes[] = $usuario;
            }

            return $aniversariantes;
        } catch (PDOException $e) {
            throw new Exception("Erro ao buscar aniversariantes: " . $e->getMessage());
        }
    }
}

try {
    // Criar uma instância da classe para estabelecer a conexão
    $gerenciadorConexao = new ConexaoComBanco($servidor, $banco, $usuario, $senha);

    // Obter a conexão ativa
    $conexao = $gerenciadorConexao->getConexao();

    // Criar uma instância do modelo
    $usuarioModel = new UsuarioModel();

    // Chamar o método do modelo para obter os aniversariantes
    $aniversariantes = $usuarioModel->getAniversariantes($conexao);

    // Exemplo de como você pode usar os dados retornados
    foreach ($aniversariantes as $aniversariante) {
        echo "ID do Aniversariante: " . $aniversariante->getIdUsuario() . "<br>";
        echo "Email do Aniversariante: " . $aniversariante->getEmailUsuario() . "<br>";
    }

} catch (Exception $e) {
    // Lidar com erros de conexão
    echo "Erro: " . $e->getMessage();
}
