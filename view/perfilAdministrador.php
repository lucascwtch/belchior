<?php

require_once "../controller/perfilController.php";


$isLoggedIn = isset($_SESSION['user_logged_in']) && $_SESSION['user_logged_in'];

$profileLink = 'view/login_page.php'; // Página padrão para usuários não logados ou casos não especificados



if ($isLoggedIn) {
    switch ($_SESSION['user_adm']) {
        case 0:
            $profileLink = 'perfilAdministrador.php';

            break;
        case 1:
            $profileLink = 'perfil.php';

            break;
        case 2:
            $profileLink = 'perfilVendedor.php';

            break;
            // Adicione outros casos conforme necessário
        default:
            // Caso não corresponda a nenhum dos casos anteriores, permanece como 'login_page.php'

            echo "Default Case";
    }
}


$profileName = $isLoggedIn ? $_SESSION['user_profile_name'] : 'Login';
?>



<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/057ae39a47.js" crossorigin="anonymous"></script>

    <title>Perfil - Belchior</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="icon" href="../assets/img/favicon.png" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">

    <link rel="stylesheet" href="../assets/css/ionicons.min.css">
    <link rel="stylesheet" href="../assets/css/flaticon.css">
    <link rel="stylesheet" href="../assets/css/icomoon.css">
    <link rel="stylesheet" href="../assets/css/animate.css">

    <link rel="stylesheet" href="../assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="../assets/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="../assets/css/magnific-popup.css">
    <link rel="stylesheet" href="../assets/css/aos.css">


    <link rel="stylesheet" href="../assets/css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/animate.css">

    <link rel="stylesheet" href="../assets/css/profile-style.css">


    <script>
        let valoresAnteriores = {};

        function confirmarEnvio() {
            var confirmacao = confirm("Tem certeza que deseja enviar este formulário?");

            if (confirmacao) {
                return true; // Permite o envio do formulário
            } else {
                // Se o usuário clicou em "Cancelar", restaura os valores anteriores nos campos do formulário
                document.getElementById('EdituserForm').reset(); // Limpa os campos

                for (let campo in valoresAnteriores) {
                    document.getElementsByName(campo)[0].value = valoresAnteriores[campo];
                }

                return false; // Impede o envio do formulário
            }
        }

        // Salva os valores atuais antes de enviar o formulário
        document.getElementById('EdituserForm').addEventListener('submit', function(event) {
            let inputs = this.getElementsByTagName('input');
            for (let input of inputs) {
                valoresAnteriores[input.name] = input.value;
            }
        });
    </script>



    <style>

    </style>

</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
        <div class="container">
            <a class="navbar-brand mx-auto" href="#">Belchior</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="../index.php">Início</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="produtos.php">Produtos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contato.php">Contato</a>
                    </li>
                    <li class="nav-item <?php echo $isLoggedIn ? 'dropdown' : ''; ?>">
                        <?php if ($isLoggedIn) : ?>
                            <div class="dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button" id="profileDropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fa-regular fa-user"></i><span></span>
                                    <?php echo $profileName; ?>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="profileDropdown">
                                    <a href="carrinho.php" class="dropdown-item"><i class="fa-solid fa-cart-shopping"></i> Carrinho [0]</a>
                                    <a href="<?php echo $profileLink;  ?>" class="dropdown-item"><i class="fa-solid fa-user"></i> Ver perfil</a>
                                    <a href="../controller/logoutController.php" class="dropdown-item"><i class="fa-solid fa-power-off"></i> Logout</a>
                                </div>
                            </div>
                        <?php else : ?>
                            <a class="nav-link" href="<?php echo $profileLink; ?>">
                                <i class="fa-regular fa-user"></i><span></span>
                                <?php echo $profileName; ?>
                            </a>
                        <?php endif; ?>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <br><br>
    <div class="container-xl px-4 mt-4">
        <!-- Account page navigation-->
        <div class="custom-nav">
            <a class="nav-link ms-0 d-inline" href="#profileSection" onclick="showProfile()">Perfil</a>
            <a class="nav-link d-inline" href="#adicionarProdutoSection" onclick="showAddProduto()">Adicionar Produto</a>
            <a class="nav-link d-inline" href="#todosProdutosSection" onclick="showTodosProdutos()">Produtos Adicionados</a>
            <a class="nav-link d-inline" href="#solicitacoesSection" onclick="showSolicitacoes()">Solicitações de Lojas</a>
            <a class="nav-link d-inline" href="#listarUsuariosSection" onclick="showListarUsuarios()">Lista de Usuários</a>

        </div>

        <hr class="mt-0 mb-4">

        <div id="profileSection" class="">
            <!-- Profile section content -->
            <div class="row">
                <div class="col-xl-4">
                    <!-- Profile picture card-->
                    <div class="card mb-4 mb-xl-0">
                        <div class="card-header">Foto de Perfil</div>
                        <div class="card-body text-center">
                            <!-- Profile picture image-->
                            <img class="img-account-profile rounded-circle mb-2" src="../assets/img/perfil-user.png" alt="">
                            <!-- Profile picture help block-->
                            <div class="small font-italic text-muted mb-4">JPG ou PNG não pode ser maior que 5 MB</div>
                            <!-- Profile picture upload button-->
                            <button class="btn btn-primary" type="button">Trocar de Imagem</button>
                        </div>
                    </div>
                </div>
                <div class="col-xl-8">
                    <!-- Account details card-->
                    <div class="card mb-4">
                        <div class="card-header">Detalhes da Conta</div>
                        <div class="card-body">
                            <form method="post" action="../controller/updatePerfilController.php" onsubmit="return confirmarEnvio()" id="EdituserForm">
                                <!-- Form Group (username)-->
                                <input type="hidden" name="inputId" id = "inputId" value="<?php echo $profileID; ?>">

                                <div class="mb-3">
                                    <label class="small mb-1" for="inputFirstName">Nome</label>
                                    <input class="form-control" id="inputFirstName" name="inputFirstName" type="text" placeholder="Digite seu primeiro nome" value="<?php echo $profileNome; ?>">
                                </div>
                                <!-- Form Row-->
                                <div class="row gx-3 mb-3">
                                    <!-- Form Group (first name)-->
                                    <div class="col-md-6">
                                        <label class="small mb-1" for="inputUsername">Apelido</label>
                                        <input class="form-control" id="inputUsername" name="inputUsername" type="text" placeholder="Digite seu apelido" value="<?php echo $profileApelido; ?>">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="small mb-1" for="inputUsername">Telefone</label>
                                        <input class="form-control" id="inputPhone" name="inputPhone" type="tel" placeholder="Digite seu número de telefone" value="<?php echo $profileTelefone; ?>">
                                    </div>
                                </div>

                                <!-- Form Group (email address)-->
                                <div class="mb-3">
                                    <label class="small mb-1" for="inputEmailAddress">Endereço de E-mail</label>
                                    <input class="form-control" id="inputEmailAddress" name="inputEmailAddress" type="email" placeholder="Digite seu endereço de e-mail" value="<?php echo $profileEmail; ?>">
                                </div>
                                <!-- Form Row-->
                                <div class="row gx-3 mb-3">
                                    <!-- Form Group (phone number)-->
                                    <div class="col-md-6">
                                        <label class="small mb-1" for="inputCPF">CPF</label>
                                        <input class="form-control" id="inputCPF" name="inputCPF" type="text" placeholder="Digite seu CPF/CNPJ" value="<?php echo $profileCPF; ?>">
                                    </div>
                                    <!-- Form Group (birthday)-->
                                    <div class="col-md-6">
                                        <label class="small mb-1" for="inputBirthday">Data de Nascimento</label>
                                        <input class="form-control" id="inputBirthday" name="inputBirthday" type="date" placeholder="Digite sua data de nascimento" value="<?php echo $profileDataNascimento; ?>">
                                    </div>
                                </div>

                                <!-- Save changes button-->
                                <button class="btn btn-primary" type="input">Salvar Alterações</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="adicionarProdutoSection" class="hidden">
            <div class="container mt-5">
                <h2>Formulário de Adição de Produto</h2>

                <form id="productForm" action="../controller/inserirProdutosByIController.php" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="nomeProduto">Nome do Produto:</label>
                        <input type="text" id="nomeProduto" name="nomeProduto" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="categoriaProduto">Categoria do Produto:</label>
                        <input type="text" id="categoriaProduto" name="categoriaProduto" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="descricaoProduto">Descrição:</label>
                        <textarea id="descricaoProduto" name="descricaoProduto" class="form-control" rows="4" required></textarea>
                    </div>

                    <div class="form-group">
                        <label for="precoProduto">Preço:</label>
                        <input type="number" id="precoProduto" name="precoProduto" class="form-control" step="0.01" required>
                    </div>

                    <div class="form-group">
                        <label for="estoqueProduto">Quantidade em Estoque:</label>
                        <input type="number" id="estoqueProduto" name="estoqueProduto" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="tamanhoProduto">Tamanho:</label>
                        <input type="text" id="tamanhoProduto" name="tamanhoProduto" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="imagemProduto">Foto do Produto:</label>
                        <input type="file" id="imagemProduto" name="imagemProduto" class="form-control" accept="image/*">
                    </div>
                    <br>
                    <button type="submit" class="btn btn-success">Adicionar Produto</button>
                </form>
            </div>

            <!-- Popup -->
            <div class="modal" id="popup">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-body">
                            Produto adicionado com sucesso!
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="todosProdutosSection" class="hidden">
            <!-- Seção de Meus Produtos -->
            <h3>Meus Produtos</h3>

            <!-- Exemplo de loop para exibir produtos -->
            <div class="row">

                <!-- Aqui você precisa substituir o arrayProducts pelos dados reais do seu backend -->
                <!-- Cada item em arrayProducts representa um produto -->
                <!-- Certifique-se de ajustar a estrutura de dados conforme necessário -->
                <!-- por exemplo, substitua arrayProducts[i].nome pelo campo real que armazena o nome do produto -->

                <!-- Início do loop -->
                <!-- Este exemplo usa um loop simples para iterar sobre os produtos -->
                <!-- Você pode usar um loop dinâmico baseado nos dados do seu backend -->
                <?php
                    

                    // Adicione mais produtos conforme necessário
                

                foreach ($produtosDoUsuario as $product) {
                ?>
                    <div class="col-md-4 mb-4">
                        <div class="card">
                        <img src="../assets/img/produtos/<?= $product['imagemProduto'] ?>" class="card-img-top" alt="Imagem do Produto">
                           <!-- <img src="../assets/img/product-1.png" class="card-img-top" alt="Imagem do Produto"> -->
                            <div class="card-body">
                                <h5 class="card-title"><?= $product['nomeProduto'] ?></h5>
                                <p class="card-text"><?= $product['descricaoProduto'] ?></p>
                             <!--<p class="card-text"><?= $product['idProduto'] ?></p>-->
                                <p class="card-text">Preço: R$ <?= number_format($product['precoProduto'], 2) ?></p>
                                <p class="card-text">Quantidade em Estoque: <?= $product['estoqueProduto'] ?></p>
                                <p class="card-text">Tamanho: <?= $product['tamanhoProduto'] ?></p>
                                <!-- Adicione mais informações conforme necessário -->

                                <!-- Botões para editar e excluir -->
                                <button class="btn btn-primary">Editar</button>
                                <button class="btn btn-danger">Excluir</button>
                            </div>
                        </div>
                    </div>
                <?php
                }
                ?>
                <!-- Fim do loop -->
            </div>

        </div>

        <div id="solicitacoesSection" class="hidden">
            <div class="container">
                <h2 class="text-center">Solicitações de Afiliação</h2>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>CPF/CNPJ</th>
                            <th>Email</th>
                            <th>Telefone</th>
                            <th>Mensagem</th>
                            <th>Opções</th>
                        </tr>
                    </thead>
                    <tbody id="solicitacoesTableBody">
                        <!-- As linhas da tabela serão adicionadas dinamicamente com JavaScript -->
                    </tbody>
                </table>
            </div>

        </div>

        <div id="listarUsuariosSection" class="hidden">
            <div class="container">
                <h2 class="text-center">Verificar Usuários</h2>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Apelido</th>
                            <th>Telefone</th>
                            <th>Email</th>
                            <th>CPF</th>
                            <th>Data de Nascimento</th>
                            <th>Detalhes</th>
                        </tr>
                    </thead>
                    <tbody id="usuariosTableBody">
                        <!-- As linhas da tabela serão adicionadas dinamicamente com JavaScript -->
                    </tbody>
                </table>
            </div>
            <!-- Modal para Detalhes do Usuário -->
            <div class="modal fade" id="detalhesUsuarioModal" tabindex="-1" role="dialog" aria-labelledby="detalhesUsuarioModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="detalhesUsuarioModalLabel">Detalhes do Usuário</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body" id="detalhesUsuarioModalBody">
                            <!-- As informações do usuário serão exibidas aqui -->
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                            <button type="button" class="btn btn-primary" onclick="editarUsuario()">Editar</button>
                            <button type="button" class="btn btn-danger" onclick="apagarUsuario()">Apagar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br><br><br><br>

    <footer class="ftco-footer ftco-section">
        <div class="container">
            <div class="row mb-5">
                <div class="col-md">
                    <div class="ftco-footer-widget mb-4">
                        <h2 class="ftco-heading-2">Minishop</h2>
                        <p style="color: #fff">Faça parte!</p>
                        <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
                            <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
                            <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
                            <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md">
                    <div class="ftco-footer-widget mb-4 ml-md-5">
                        <h2 class="ftco-heading-2">Menu</h2>
                        <ul class="list-unstyled">
                            <li><a href="#" class="py-2 d-block">Comprar</a></li>
                            <li><a href="#" class="py-2 d-block">Sobre</a></li>
                            <li><a href="#" class="py-2 d-block">Blog</a></li>
                            <li><a href="#" class="py-2 d-block">Entrar em Contato</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="ftco-footer-widget mb-4">
                        <h2 class="ftco-heading-2">Ajuda</h2>
                        <div class="d-flex">
                            <ul class="list-unstyled mr-l-5 pr-l-3 mr-4">
                                <li><a href="#" class="py-2 d-block">Informações de Compras</a></li>
                                <li><a href="#" class="py-2 d-block">Reembolsos</a></li>
                                <li><a href="#" class="py-2 d-block">Termos &amp; Condições</a></li>
                                <li><a href="#" class="py-2 d-block">Privacy Policy</a></li>
                            </ul>
                            <ul class="list-unstyled">
                                <li><a href="#" class="py-2 d-block">&nbsp;&nbsp;FAQs</a></li>
                                <li><a href="#" class="py-2 d-block">Contato</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md">
                    <div class="ftco-footer-widget mb-4">
                        <h2 class="ftco-heading-2">Dúvidas?</h2>
                        <div class="block-23 mb-3">
                            <ul>
                                <li style="color: #fff"><span class="icon icon-map-marker"> </span><span class="text">Rua Carlos De
                                        Carvalho, 200</span>
                                </li>
                                <li><a href="#"><span class="icon icon-phone"> </span><span class="text">+2 392 3929 210</span></a></li>
                                <li><a href="#"><span class="icon icon-envelope"> </span><span class="text">contato@belchior.com</span></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 text-center goto-here" style="color: #fff">
                    <p>
                        Copyright &copy;
                        <script>
                            document.write(new Date().getFullYear());
                        </script> All rights reserved <i class="icon-heart color-danger" aria-hidden="true"></i> by <a href="#" target="_blank">Belchior</a>
                    </p>
                </div>
            </div>
        </div>
    </footer>

    <!-- loader -->
    <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
            <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
            <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00" />
        </svg></div>
</body>


<script>
    // Function to show the Profile section
    function showProfile() {
        document.getElementById("profileSection").classList.remove("hidden");
        document.getElementById("adicionarProdutoSection").classList.add("hidden");
        document.getElementById("todosProdutosSection").classList.add("hidden");
        document.getElementById("solicitacoesSection").classList.add("hidden");
        document.getElementById("listarUsuariosSection").classList.add("hidden");

    }

    // Function to show the Adicionar Produto section
    function showAddProduto() {
        document.getElementById("profileSection").classList.add("hidden");
        document.getElementById("adicionarProdutoSection").classList.remove("hidden");
        document.getElementById("todosProdutosSection").classList.add("hidden");
        document.getElementById("solicitacoesSection").classList.add("hidden");
        document.getElementById("listarUsuariosSection").classList.add("hidden");
    }

    // Function to show the Todos Produtos section
    function showTodosProdutos() {
        document.getElementById("profileSection").classList.add("hidden");
        document.getElementById("adicionarProdutoSection").classList.add("hidden");
        document.getElementById("todosProdutosSection").classList.remove("hidden");
        document.getElementById("solicitacoesSection").classList.add("hidden");
        document.getElementById("listarUsuariosSection").classList.add("hidden");
    }

    // Function to show the Solicitacoes section
    function showSolicitacoes() {
        document.getElementById("listarUsuariosSection").classList.add("hidden");
        document.getElementById("profileSection").classList.add("hidden");
        document.getElementById("adicionarProdutoSection").classList.add("hidden");
        document.getElementById("todosProdutosSection").classList.add("hidden");
        document.getElementById("solicitacoesSection").classList.remove("hidden");
        document.getElementById("listarUsuariosSection").classList.add("hidden");
    }

    function showListarUsuarios() {
        document.getElementById("listarUsuariosSection").classList.add("hidden");
        document.getElementById("profileSection").classList.add("hidden");
        document.getElementById("adicionarProdutoSection").classList.add("hidden");
        document.getElementById("todosProdutosSection").classList.add("hidden");
        document.getElementById("solicitacoesSection").classList.add("hidden");
        document.getElementById("listarUsuariosSection").classList.remove("hidden");
    }
</script>

<!-- Script de gerenciamento de solicitações -->
<script>
    // Simule as solicitações recebidas do banco de dados
    var solicitacoes = <?php require_once "../controller/listarSolicitacoesController.php"; ?>;

    document.addEventListener('DOMContentLoaded', function() {
        var solicitacoesTableBody = document.getElementById('solicitacoesTableBody');

        // Adiciona dinamicamente as linhas da tabela com base nas solicitações
        solicitacoes.forEach(function(solicitacao) {
            var row = solicitacoesTableBody.insertRow();
            row.insertCell(0).innerHTML = solicitacao.nomeUsuarioCliente;
            row.insertCell(1).innerHTML = solicitacao.cpfUsuarioCliente;
            row.insertCell(2).innerHTML = solicitacao.emailUsuarioCliente;
            row.insertCell(3).innerHTML = solicitacao.telefoneUsuarioCliente;
            row.insertCell(4).innerHTML = solicitacao.mensagemUsuarioCliente;

            // Adiciona botões de "Aceitar" e "Recusar"
            var cellOpcoes = row.insertCell(5);
            var btnAceitar = criarBotao('Aceitar', function() {
                aceitarSolicitacao(solicitacao.fkIdUsuario);
            });
            cellOpcoes.appendChild(btnAceitar);

            var btnRecusar = criarBotao('Recusar', function() {
                recusarSolicitacao(solicitacao.fkIdUsuario);
            });
            cellOpcoes.appendChild(btnRecusar);
        });
    });

    function aceitarSolicitacao(id) {
        // Simule a lógica de aceitar a solicitação
        console.log('Solicitação aceita com ID:', id);
        //popup de confirmação
        var confirmacao = confirm("Tem certeza que deseja aceitar a solicitação?");
        if (confirmacao) {
            // Criar um objeto FormData com o parâmetro 'id'
            const formData = new FormData();
            formData.append('idUsuario', id);

            // Fazer a solicitação POST usando fetch
            fetch('../controller/alterarStatusUserController.php', {
                    method: 'POST',
                    body: formData
                })
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Erro na solicitação.');
                    }
                    return response.text();
                })
                .then(data => {
                    alert('Solicitação Aceita!')
                    window.onload(solicitacoesTableBody);
                    console.log('Resposta do servidor:', data);
                })
                .catch(error => {
                    console.error('Erro:', error);
                });
        } else {

        }
    }


    function recusarSolicitacao(id) {
        // Simule a lógica de recusar a solicitação
        console.log('Solicitação recusada com ID:', id);

        // Criar um objeto FormData com o parâmetro 'id'
        var confirmacao = confirm("Tem certeza que deseja recusar a solicitação?");
        if (confirmacao) {

            const formData = new FormData();
            formData.append('idUsuario', id);

            // Fazer a solicitação POST usando fetch
            fetch('../controller/deleteSolicitacaoAfiliarController.php', {
                    method: 'POST',
                    body: formData
                })
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Erro na solicitação.');
                    }
                    return response.text();
                })
                .then(data => {
                    alert('Solicitação recusada!')
                    console.log('Resposta do servidor:', data);
                })
                .catch(error => {
                    console.error('Erro:', error);
                });
        } else {

        }
    }

    // Função auxiliar para criar botões
    function criarBotao(texto, onClick) {
        var btn = document.createElement('button');
        btn.innerHTML = texto;
        btn.classList.add('btn', 'btn-primary', 'me-1');
        btn.addEventListener('click', onClick);
        return btn;
    }
</script>

<!-- Script  usuários -->
<script>
    var usuarios = <?php include_once "../controller/usuarioClienteController.php"; ?>;

    document.addEventListener('DOMContentLoaded', function() {
        var usuariosTableBody = document.getElementById('usuariosTableBody');

        // Adiciona dinamicamente as linhas da tabela com base nos usuários
        usuarios.forEach(function(usuario) {
            var row = usuariosTableBody.insertRow();
            row.insertCell(0).innerHTML = usuario.nomeUsuario;
            row.insertCell(1).innerHTML = usuario.apelidoUsuario;
            row.insertCell(2).innerHTML = usuario.telefoneUsuario;
            row.insertCell(3).innerHTML = usuario.emailUsuario;
            row.insertCell(4).innerHTML = usuario.cpfUsuario;
            row.insertCell(5).innerHTML = usuario.dataNascimentoUsuario;

            // Adiciona botão de "Detalhes" com atributo data-toggle para abrir o modal
            var cellDetalhes = row.insertCell(6);
            var btnDetalhes = document.createElement('button');
            btnDetalhes.innerHTML = 'Detalhes';
            btnDetalhes.setAttribute('data-toggle', 'modal');
            btnDetalhes.setAttribute('data-target', '#detalhesUsuarioModal');
            btnDetalhes.addEventListener('click', function() {
                mostrarDetalhesUsuario(usuario);
            });
            cellDetalhes.appendChild(btnDetalhes);
        });
    });

    function mostrarDetalhesUsuario(usuario) {
        // Exibe as informações do usuário no modal
        var detalhesUsuarioModalBody = document.getElementById('detalhesUsuarioModalBody');
        detalhesUsuarioModalBody.innerHTML = `
            <form method="POST" id="editarUsuarioForm">
                <input type="Hidden" id= "Id" name="inputId"value ="${usuario.idUsuario}">
                <p><strong>Nome:</strong> </p>
                <input type="text" id= "Name" name="inputFirstName"value ="${usuario.nomeUsuario}">
                <p><strong>Apelido:</strong></p>
                <input type="text" id= "Username" name="inputUsername"value =" ${usuario.apelidoUsuario}">
                <p><strong>Telefone:</strong></p>
                <input type="text" id= "Phone" name="inputPhone"value ="${usuario.telefoneUsuario}">
                <p><strong>Email:</strong></p>
                <input type="text" id= "EmailAddress" name="inputEmailAddress"value ="${usuario.emailUsuario}">
                <p><strong>CPF:</strong></p>
                <input type="text" id= "CPF" name="inputCPF"value ="${usuario.cpfUsuario}">
                <p><strong>Data de Nascimento:</strong> </p>
                <input type="Date" id= "Birthday" name="inputBirthday"value ="${usuario.dataNascimentoUsuario}">
            </form>
        `;
    }

    function editarUsuario() {

        var confirmacao = confirm("Tem Certeza Que deseja Editar esses Dados");

        if (confirmacao) {


            // Obtém os valores dos campos do formulário
            var idUsuario = document.getElementById('Id').value;
            var nomeUsuario = document.getElementById('Name').value;
            var apelidoUsuario = document.getElementById('Username').value;
            var telefoneUsuario = document.getElementById('Phone').value;
            var emailUsuario = document.getElementById('EmailAddress').value;
            var cpfUsuario = document.getElementById('CPF').value;
            var dataNascimentoUsuario = document.getElementById('Birthday').value;


            // Cria um objeto FormData com os dados do usuário
            var formData = new FormData();
            formData.append('inputId', idUsuario);
            formData.append('inputFirstName', nomeUsuario);
            formData.append('inputUsername', apelidoUsuario);
            formData.append('inputPhone', telefoneUsuario);
            formData.append('inputEmailAddres', emailUsuario);
            formData.append('inputCPF', cpfUsuario);
            formData.append('inputBirthday', dataNascimentoUsuario);

            // Fazer a solicitação POST usando fetch
            fetch('../controller/updatePerfilAdmController.php', {
                    method: 'POST',
                    body: formData
                })
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Erro na solicitação.');
                    }
                    return response.text();
                })
                .then(data => {
                    // Lógica para lidar com a resposta do servidor, se necessário
                    alert('Usuário editado com sucesso!');
                    location.reload();
                    console.log('Resposta do servidor:', data);
                    // Redireciona para a página de perfilAdministrador.php
                    //     window.location.href = '../view/perfilAdministrador.php';
                })
                .catch(error => {
                    // Lógica para lidar com erros
                    console.error('Erro:', error);
                });
        } else {

        }
    }

    function apagarUsuario() {
        // Lógica para apagar o usuário (pode ser implementada posteriormente)
        alert('Implemente a lógica de exclusão aqui.');
        // Simule a lógica de recusar a solicitação
        console.log('Solicitação recusada com ID:', id);

        // Criar um objeto FormData com o parâmetro 'id'
        var confirmacao = confirm("Tem certeza que deseja recusar a solicitação?");
        if (confirmacao) {

            const formData = new FormData();
            formData.append('idUsuario', idUsuario);

            // Fazer a solicitação POST usando fetch
            fetch('../controller/deleteSolicitacaoAfiliarController.php', {
                    method: 'POST',
                    body: formData
                })
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Erro na solicitação.');
                    }
                    return response.text();
                })
                .then(data => {
                    alert('Solicitação recusada!')
                    console.log('Resposta do servidor:', data);
                })
                .catch(error => {
                    console.error('Erro:', error);
                });
        } else {

        }


    }
</script>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/5.5.0/js/bootstrap.min.js"></script>
<script src="../assets/js/jquery.min.js"></script>
<script src="../assets/js/jquery-migrate-3.0.1.min.js"></script>
<script src="../assets/js/popper.min.js"></script>
<script src="../assets/js/bootstrap.min.js"></script>
<script src="../assets/js/jquery.easing.1.3.js"></script>
<script src="../assets/js/jquery.waypoints.min.js"></script>
<script src="../assets/js/jquery.stellar.min.js"></script>
<script src="../assets/js/owl.carousel.min.js"></script>
<script src="../assets/js/jquery.magnific-popup.min.js"></script>
<script src="../assets/js/aos.js"></script>
<script src="../assets/js/jquery.animateNumber.min.js"></script>
<script src="../assets/js/bootstrap-datepicker.js"></script>
<script src="../assets/js/scrollax.min.js"></script>
<script src="../assets/js/google-map.js"></script>
<script src="../assets/js/main.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

</html>