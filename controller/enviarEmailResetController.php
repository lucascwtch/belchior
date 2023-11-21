<?php
require_once "../model/enviarEmailResetModel.php";
require_once "../dao/enviarEmailResetDAO.php";
class PasswordResetController {
    private $model;

    public function __construct($conexao) {
        $this->model = new UsuarioModel($conexao);
    }

    public function handlePasswordReset($token) {
        if (!empty($token)) {
            $usuario = $this->model->verificarToken($token);

            if ($usuario) {
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    $novaSenha = $_POST['nova_senha'];
                    $senhaAtualizada = $this->model->atualizarSenha($token, $novaSenha);

                    if ($senhaAtualizada) {
                        echo '<script>alert("Senha redefinida com sucesso. Faça login.");</script>';
                        echo '<script>window.location.href = "../view/login_page.html";</script>';
                    } else {
                        echo 'Erro ao atualizar a senha.';
                    }
                } else {
                    $this->showPasswordResetForm($token);
                }
            } else {
                echo 'Token inválido ou expirado.';
            }
        } else {
            echo 'Token inválido ou não fornecido.';
        }
    }

    private function showPasswordResetForm($token) {
        // (Deixe a função showPasswordResetForm como está)
    }
}
?>
