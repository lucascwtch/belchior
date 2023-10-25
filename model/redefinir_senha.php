<?php
require("../controller/config.php");

class PasswordResetHandler {
    private $conexao;

    public function __construct($conexao) {
        $this->conexao = $conexao;
    }

    public function handlePasswordReset($token) {
        if (!empty($token)) {
            // Verifica se o token é válido no banco de dados
            $query = $this->conexao->prepare("SELECT * FROM usuarios WHERE token = :token");
            $query->bindParam(':token', $token, PDO::PARAM_STR);
            $query->execute();
            $usuario = $query->fetch(PDO::FETCH_ASSOC);

            if ($usuario) {
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    // Processar a redefinição de senha aqui
                    $nova_senha = $_POST['nova_senha'];

                    // Aplicar hash à nova senha
                    $senha_hash = password_hash($nova_senha, PASSWORD_DEFAULT);

                    // Execute o código para atualizar a senha no banco de dados
                    $updateQuery = $this->conexao->prepare("UPDATE usuarios SET senha = :nova_senha WHERE token = :token");
                    $updateQuery->bindParam(':nova_senha', $senha_hash, PDO::PARAM_STR);
                    $updateQuery->bindParam(':token', $token, PDO::PARAM_STR);
                    $updateQuery->execute();

                    // Após a redefinição bem-sucedida, redirecione para a página de login com uma mensagem
                    echo '<script>alert("Senha redefinida com sucesso. Faça login.");</script>';
                    echo '<script>window.location.href = "../view/login_page.html";</script>';
                } else {
                    // Exibe o formulário para redefinir a senha
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
        echo '
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <title>Redefinir Senha</title>
        </head>
        <body>
            <h2>Redefinir Senha</h2>
            <form method="post" action="redefinir_senha.php?token=' . $token . '">
                <label for="nova_senha">Nova Senha:</label>
                <input type="password" id="nova_senha" name="nova_senha" required>
                <button type="submit">Redefinir Senha</button>
            </form>
        </body>
        </html>
        ';
    }
}

$resetHandler = new PasswordResetHandler($conexao);

// Obtém o token da URL (se disponível) e passa para o manipulador de redefinição de senha
$token = $_GET['token'] ?? '';
$resetHandler->handlePasswordReset($token);
?>
