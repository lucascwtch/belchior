<?php


require_once "model/listarProdutosIndexModel.php";


Class ListarProdutosIndexController{

private $model;


public function __construct($conexao) { 
    $this->model = new ListarProdutosIndexModel($conexao);
}


public function listarProdutos() {
  
 try{
   $produtos = $this->model->listarProdutosGeral();

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


$listarProdutosController = new ListarProdutosIndexController($conexao);
$produtosDoUsuario = $listarProdutosController -> listarProdutos();
