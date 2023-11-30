<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

</head>

<body>


<?php

include_once "../model/alterarImagemPerfilUsuarioModel.php";
include_once "../dao/updatePerfilDAO.php";


// controller/UserController.php
class UpdateImageController {
    private $userModel;


    public function __construct($conexao) {
        $this->userModel = new UpdateImageUserModel($conexao);

    }

    

    public function updateProfile($profileId, $imagemPerfil) {
        $this->userModel->updateImagePerfil($profileId, $imagemPerfil);
       

    }

 

    public function updateSessionImage($imagemPerfil){
        
        session_start();

        $_SESSION['user_perfil_imagem'] = $imagemPerfil;

    }
    


}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $imagemPerfil = $_FILES['imagePerfil'];
    $profileId = $_POST['inputId'];

    $updateImageController = new UpdateImageController($conexao);
    $updateImageController->updateProfile($profileId, $imagemPerfil);
    
    

  

    echo "<script>
        Swal.fire({
            text: 'Imagem de perfil atualizada com sucesso!',
            icon: 'success',
        }).then(function() {
            window.location.href = '../index.php';
        });
      </script>";

    include_once "../view/navbar.php";
}

?>

</body>
</html>