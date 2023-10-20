<?php
require("../controller/config.php");

// Verifique se o token está presente na URL
$token = $_GET['token'] ?? '';

if (!empty($token)) {
    // Verifique se o token é válido no banco de dados
    $query = $conexao->prepare("SELECT * FROM usuarios WHERE token = :token");
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
            $query = $conexao->prepare("UPDATE usuarios SET senha = :nova_senha WHERE token = :token");
            $query->bindParam(':nova_senha', $senha_hash, PDO::PARAM_STR);
            $query->bindParam(':token', $token, PDO::PARAM_STR);
            $query->execute();

            // Após a redefinição bem-sucedida, redirecione para a página de login com uma mensagem
            echo '<script>alert("Senha redefinida com sucesso. Faça login.");</script>';
            echo '<script>window.location.href = "../view/login_page.html";</script>';
        } else {
            // Exibe o formulário para redefinir a senha
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
    } else {
        echo 'Token inválido ou expirado.';
    }
} else {
    echo 'Token inválido ou não fornecido.';
}
?>
