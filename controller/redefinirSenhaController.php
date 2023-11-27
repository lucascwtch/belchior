<?php
require_once "../model/redefinirSenhaModel.php";
require_once "../dao/redefinirSenhaDAO.php";
class PasswordResetController {
    private $model;

    public function __construct($conexao) {
        $this->model = new UsuarioModel($conexao);
    }

    public function handlePasswordReset($tokenUsuario) {
        if (!empty($tokenUsuario)) {
            $usuario = $this->model->verificarToken($tokenUsuario);

            if ($usuario) {
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    $novaSenha = $_POST['nova_senha'];
                    $senhaAtualizada = $this->model->atualizarSenha($tokenUsuario, $novaSenha);

                    if ($senhaAtualizada) {
                        echo '<script>alert("Senha redefinida com sucesso. Faça login.");</script>';
                        echo '<script>window.location.href = "../view/login_page.php";</script>';
                    } else {
                        echo 'Erro ao atualizar a senha.';
                    }
                } else {
                    $this->showPasswordResetForm($tokenUsuario);
                }
            } else {
                echo 'Token inválido ou expirado.';
            }
        } else {
            echo 'Token inválido ou não fornecido.';
            echo $tokenUsuario;
        }
    }

    private function showPasswordResetForm($tokenUsuario) {
        echo '
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <title>Redefinir Senha</title>
        </head>
        <body>
            <h2>Redefinir Senha</h2>
            <form method="post" action="redefinirSenhaController.php?token=' . $tokenUsuario . '">
                <label for="nova_senha">Nova Senha:</label>
                <input type="password" id="nova_senha" name="nova_senha" required>
                <button type="submit">Redefinir Senha</button>
            </form>
        </body>
        </html>
        ';
    }
}


$resetController = new PasswordResetController($conexao);

// Obtém o token da URL (se disponível) e passa para o controlador de redefinição de senha
$token = $_GET['token'] ?? '';
$resetController->handlePasswordReset($token);

