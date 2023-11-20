<?php
// ProductDAO.php
require_once "../controller/config.php";

class ProductDAO {
    private $db;

    public function __construct($conexao) {
        $this->db = $conexao;
    }

    public function uploadProduct($tipo, $nome, $preco, $especificacoes, $imagem) {
        // Move o arquivo de imagem para o diretório de destino
        $imagem_destino = "../assets/img/produtos/" . basename($imagem['name']);
        if (move_uploaded_file($imagem['tmp_name'], $imagem_destino)) {
            // Inserção dos dados do produto no banco de dados
            $sql = "INSERT INTO produtos (categoria, titulo, imagem, preco, descricao) VALUES (?, ?, ?, ?, ?)";
            $query = $this->db->prepare($sql);
            $query->execute([$tipo, $nome, $imagem['name'], $preco, $especificacoes]);

            // Retorna uma mensagem indicando o resultado da operação
            return "Produto cadastrado!";
        } else {
            return "Falha ao fazer upload da imagem.";
        }
    }
}
?>