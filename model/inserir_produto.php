<?php
require("../controller/config.php");

class ProductUploader {
    private $conexao;

    public function __construct($conexao) {
        $this->conexao = $conexao;
    }

    public function uploadProduct($tipo, $nome, $preco, $especificacoes, $imagem) {
        // Move o arquivo de imagem para o diretório de destino
        $imagem_destino = "dbimg/" . basename($imagem['name']);
        if (move_uploaded_file($imagem['tmp_name'], $imagem_destino)) {
            // Inserção dos dados do produto no banco de dados
            $sql = "INSERT INTO produto (tipo_produto, nome_produto, imagem_produto, preco_produto, especificacoes_produto) VALUES (?, ?, ?, ?, ?)";
            $query = $this->conexao->prepare($sql);
            $query->execute([$tipo, $nome, $imagem['name'], $preco, $especificacoes]);
            
            // Exibe uma mensagem de sucesso e redireciona para a página inicial
            echo '<script>alert("Produto cadastrado!"); window.location = "../index.php";</script>';
        } else {
            echo '<script>alert("Falha ao fazer upload da imagem."); window.location = "../index.php";</script>';
        }
    }
}

$productUploader = new ProductUploader($conexao);

// Verifica se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $tipo_produto = $_POST['tipo'];
    $nome_produto = $_POST['nome'];
    $preco_produto = $_POST['preco'];
    $especificacoes_produto = $_POST['especificacoes'];
    $imagem_produto = $_FILES['imagem'];

    // Chama o método para fazer upload do produto
    $productUploader->uploadProduct($tipo_produto, $nome_produto, $preco_produto, $especificacoes_produto, $imagem_produto);
}
?>
