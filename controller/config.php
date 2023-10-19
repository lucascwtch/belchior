<?php

$servidor = "localhost";
$banco = "belchior";
$usuario = "root";
$senha = "";

try{
$conexao = new PDO("mysql:host=$servidor;dbname=$banco", $usuario, $senha );
$conexao -> setAttribute(PDO ::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
}catch(PDOException $erro){

echo "Erro de Conexão: {$erro->getMessage()}"; 
$conexao = null;

}







?>