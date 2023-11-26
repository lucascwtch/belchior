<?php
// ProductDAO.php
require_once "../controller/config.php";

class ProductDAO {
    private $db;

    public function __construct($conexao) {
        $this->db = $conexao;
    }

    public function uploadProduct($tipoProduto, $nomeProduto, $precoProduto, $descricaoProduto, $imagemProduto) {
        // Move o arquivo de imagem para o diretório de destino
        $imagem_destino = "../assets/img/produtos/" . basename($imagemProduto['name']);
        if (move_uploaded_file($imagemProduto['tmp_name'], $imagem_destino)) {
            // Inserção dos dados do produto no banco de dados
            $sql = "INSERT INTO produtos (categoriaProduto, tituloProduto, imagemProduto, precoProduto, descricaoProduto) VALUES (?, ?, ?, ?, ?)";
            $query = $this->db->prepare($sql);
            $query->execute([$tipoProduto, $nomeProduto, $imagemProduto['name'], $precoProduto, $descricaoProduto]);

            // Retorna uma mensagem indicando o resultado da operação
            return "Produto cadastrado!";
        } else {
            return "Falha ao fazer upload da imagem.";
        }
    }
}
?>
