<?php
require_once "controller/config.php";
class UsuarioVendedorDAO{

private $conexao;

public function __construct($conexao){

    $this->conexao = $conexao;

}




public function getClientesVendedor(){
    $query = $this->conexao->prepare("SELECT idUsuario, nomeUsuario, cpfUsuario, apelidoUsuario, emailUsuario,telefoneUsuario, dataNascimentoUsuario FROM usuarios WHERE statusUsuario = 2");
    $query->execute();

    // Verifica se a consulta retornou alguma linha
    if ($query->rowCount() > 0) {
        return $query->fetchAll(PDO::FETCH_ASSOC);
    } else {
        return array(); // Retorna um array vazio se não houver resultados
    }
}
 


}