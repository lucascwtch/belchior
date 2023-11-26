<?php
// RegistroDAO.php
require_once "../controller/config.php";

class RegistroDAO {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function manipularRegistro($dadosPost) {
        // Consulta para verificar se o email já existe
        $consultaEmail = $this->db->prepare("SELECT * FROM usuarios WHERE emailUsuario = :email");
        $consultaEmail->bindParam(':email', $dadosPost['email'], PDO::PARAM_STR);
        $consultaEmail->execute();

        if ($consultaEmail->rowCount() > 0) {
            // O email já existe, retorne uma mensagem de erro
            return "Este email já foi cadastrado. Tente com outro.";
        } elseif ($dadosPost['password'] == $dadosPost['confirm_password']) {
            // A senha foi confirmada e o email não existe, então prossiga com a inserção no banco de dados
            $senhaHash = password_hash($dadosPost['password'], PASSWORD_DEFAULT);

            $inserirQuery = "INSERT INTO usuarios (nomeUsuario, senhaUsuario, emailUsuario) VALUES (:nome,:senha,:email)";
            $inserirInstrucao = $this->db->prepare($inserirQuery);
            $inserirInstrucao->bindParam(':nome', $dadosPost['nomeUsuario'], PDO::PARAM_STR);
            $inserirInstrucao->bindParam(':email', $dadosPost['emailUsuario'], PDO::PARAM_STR);
            $inserirInstrucao->bindParam(':senha', $senhaHash, PDO::PARAM_STR);

            $inserirInstrucao->execute();

            if ($inserirInstrucao->rowCount() > 0) {
                // Cadastro bem-sucedido, retorne uma mensagem de sucesso
                return "Usuário Cadastrado com Sucesso!";
            } else {
                // Erro na inserção, retorne uma mensagem de erro
                return "Erro ao Inserir os Dados!";
            }
        } else {
            // Senhas não coincidem, retorne uma mensagem de erro
            return "Senhas não coincidem";
        }
    }
}
?>
