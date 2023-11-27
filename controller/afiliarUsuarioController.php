<?php
require_once "../model/afiliarUsuarioModel.php";
require_once "../dao/afiliarUsuarioDao.php";


Class AfiliarController{

    private $afiliarModel;

    public function __construct($conexao){
        $this->afiliarModel = new AfiliarModel($conexao);
    }


    public function updateStatusByCPF($cpf) {
        return $this->afiliarModel->updateUserByCPF($cpf);
    }

    public function hasCad($email) {
        return $this->afiliarModel->selectByEmail($email);
    }


    
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['updateStatus'])) {
    // Recuperar valores do formulário
    $cpfUsuario = $_POST['inputCPF']; // Substitua pelo nome real do campo no seu formulário
    $emailUsuario = $_POST['inputEmail']; // Substitua pelo nome real do campo no seu formulário

    $userController = new AfiliarController($conexao);

    // Verificar se o usuário já possui um e-mail cadastrado
    if ($userController->hasCad($emailUsuario)) {
        // Atualizar o status baseado no CPF
        $atualizacaoBemSucedida = $userController->updateStatusByCPF($cpfUsuario);

        if ($atualizacaoBemSucedida) {
            echo "Status atualizado com sucesso!";
        } else {
            echo "Erro ao atualizar o status.";
        }
    } else {
        // Redirecionar para a página de cadastro_afiliado.php
        echo "<script>
                alert('Você precisa realizar o cadastro para se tornar afiliado.');
                window.location.href = 'cadastro_afiliado.php';
              </script>";
    }
}