<?php


require_once "../model/listarProdutosModel.php";


Class ListarProdutosController{

private $model;


public function __construct($conexao) { 
    $this->model = new ListarProdutosModel($conexao);
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


$listarProdutosController = new ListarProdutosController($conexao);
$produtosDoUsuario = $listarProdutosController -> listarProdutos();
