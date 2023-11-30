<?php
class UpdateImageUserModel
{
    private $conexao;

    public function __construct($conexao)
    {
        $this->conexao = $conexao;
    }

    public function updateImagePerfil($profileId, $imagemPerfil)
{
    // Diretório de destino para o upload
    $diretorio_destino = "../assets/img/perfil/";

    // Verificar se o arquivo foi enviado corretamente
    if ($imagemPerfil['error'] !== UPLOAD_ERR_OK) {
        return "Erro no upload do arquivo. Código: " . $imagemPerfil['error'];
    }

    // Verificar se é um arquivo de imagem
    $tipoArquivo = mime_content_type($imagemPerfil['tmp_name']);
    if (strpos($tipoArquivo, 'image') !== 0) {
        return "Erro: O arquivo enviado não é uma imagem.";
    }

    // Move o arquivo de imagem para o diretório de destino
    $imagem_destino = $diretorio_destino . basename($imagemPerfil['name']);
    if (move_uploaded_file($imagemPerfil['tmp_name'], $imagem_destino)) {
        // Atualização do caminho da imagem no banco de dados
        $sql = "UPDATE usuarios SET perfilImageUsuario = ? WHERE idUsuario = ?";
        $query = $this->conexao->prepare($sql);
        $query->execute([$imagem_destino, $profileId]);

        $this->updateSessionImage($profileId, $imagem_destino);


        // Retorna uma mensagem indicando o resultado da operação
        return "Imagem de perfil atualizada!";
    } else {
        return "Falha ao fazer upload da nova imagem de perfil.";
    }
}


private function updateSessionImage($profileId, $newImagePath) {
    // Inicie a sessão
    session_start();

    // Verifique se o perfilId é o mesmo do usuário logado antes de atualizar a sessão
    if ($_SESSION['user_id'] == $profileId) {
        $_SESSION['user_perfil_imagem'] = $newImagePath;
    }
}
       
}


