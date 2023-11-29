<?php

require_once "../model/listarProdutosModel.php";


Class ListarProdutosController{

private $model;


public function __construct($conexao) { 
    $this->model = new ListarProdutosModel($conexao);
}


public function listarProdutos($fkIdUsuario) {
  
 try{
   $produtos = $this->model->listarProdutosByUsuarioId($fkIdUsuario);

   if(!empty($produtos)){
    return $produtos;
   }
   else{
    echo "Nenhum produto encontrado";

   }
 }catch (Exception $e){
    echo "Erro ao listar produtos: " . $e->getMessage();

 }
    
}

}
$fkIdUsuario = $_SESSION['user_id'];

$listarProdutosController = new ListarProdutosController($conexao);
$produtosDoUsuario = $listarProdutosController -> listarProdutos($fkIdUsuario);
