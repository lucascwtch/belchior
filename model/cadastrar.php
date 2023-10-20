<!DOCTYPE html>
<html lang="en">

<head>
<style>
.hidden {
      display: none;
  }

  /* Estilo para centralizar o círculo de carregamento na tela */
  #loading {
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
  }

  /* Estilo para o círculo de carregamento com tamanho maior e cor cinza */
  .loader {
      border: 6px solid #ccc; /* Altere a cor do círculo para cinza (#ccc) */
      border-top: 6px solid #686969; /* Cor do topo do círculo, se desejar */
      border-radius: 50%;
      width: 50px; /* Largura maior */
      height: 50px; /* Altura maior */
      animation: spin 2s linear infinite;
  }

  @keyframes spin {
      0% { transform: rotate(0deg); }
      100% { transform: rotate(360deg); }
  }
</style>
</head>

<body>
    <?php
    require("../controller/config.php");

    if (isset($_POST['nome']) && isset($_POST['password']) && isset($_POST['email']) && isset($_POST['confirm_password']) && $conexao != null) {
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $senha = $_POST['password'];
        
        // Consulta para verificar se o email já existe
        $email_check_query = $conexao->prepare("SELECT * FROM usuarios WHERE email = :email");
        $email_check_query->bindParam(':email', $email, PDO::PARAM_STR);
        $email_check_query->execute();
        
        if ($email_check_query->rowCount() > 0) {
            // O email já existe, exiba uma mensagem de erro e redirecione após um atraso
            echo "<script language='javascript' type='text/javascript'>
                alert('Este email já foi cadastrado. Tente com outro.');
                setTimeout(function() {
                    window.location = '../view/siginup_page.html';
                }, 3000); // Redireciona após 3 segundos
            </script>";
        } elseif ($_POST['password'] == $_POST['confirm_password']) {
            // A senha foi confirmada e o email não existe, então prossiga com a inserção no banco de dados
            $senha_hash = password_hash($senha, PASSWORD_DEFAULT);

            $query = "INSERT INTO usuarios (nome, senha, email) VALUES (:nome, :senha, :email)";
            $insert = $conexao->prepare($query);
            $insert->bindParam(':nome', $nome, PDO::PARAM_STR);
            $insert->bindParam(':email', $email, PDO::PARAM_STR);
            $insert->bindParam(':senha', $senha_hash, PDO::PARAM_STR);

            // Exibir círculo de carregamento
            echo "<div id='loading' class='hidden'>
                      <div class='loader'></div>
                  </div>";

            $insert->execute();

            if ($insert->rowCount() > 0) {
                // Cadastro bem-sucedido, exiba uma mensagem e redirecione após um atraso
                echo "<script language='javascript' type='text/javascript'>
                    alert('Usuário Cadastrado com Sucesso!');
                    document.getElementById('loading').classList.remove('hidden'); // Mostrar o círculo de carregamento
                    setTimeout(function() {
                        window.location = '../index.php';
                    }, 3000); // Redireciona após 2 segundos
                </script>";
            } else {
                // Erro na inserção, exiba uma mensagem de erro e redirecione após um atraso
                echo "<script language='javascript' type='text/javascript'>
                    alert('Erro ao Inserir os Dados!');
                    document.getElementById('loading').classList.remove('hidden'); // Mostrar o círculo de carregamento
                    setTimeout(function() {
                        window.location = '../view/siginup_page.html';
                    }, 3000); // Redireciona após 2 segundos
                </script>";
            }
        } else {
            // Senhas não coincidem, exiba uma mensagem de erro e redirecione após um atraso
            echo "<script language='javascript' type='text/javascript'>
                alert('Senhas não coincidem');
                setTimeout(function() {
                    window.location = '../index.php';
                }, 3000); // Redireciona após 2 segundos
            </script>";
        }
    } else {
        // Erro, exiba uma mensagem de erro e redirecione após um atraso
        echo "<script language='javascript' type='text/javascript'>
            alert('Erro!');
            setTimeout(function() {
                window.location = '../view/siginup_page.html';
            }, 2000); // Redireciona após 2 segundos
        </script>";
    }
    ?>
</body>

</html>