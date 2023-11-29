<?php

require_once "../controller/perfilController.php";


$isLoggedIn = isset($_SESSION['user_logged_in']) && $_SESSION['user_logged_in'];

$profileLink = 'login_page.php'; // Página padrão para usuários não logados ou casos não especificados



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
            <a class="nav-link d-inline" href="#billingSection" onclick="showBilling()">Pagamento</a>
            <a class="nav-link d-inline" href="#securitySection" onclick="showSecurity()">Segurança</a>
            <a class="nav-link d-inline" href="#notificationSection" onclick="showNotifications()">Notificações</a>
            <a class="nav-link d-inline" href="#adicionarProdutoSection" onclick="showAddProduto()">Adicionar Produto</a>
            <a class="nav-link d-inline" href="#meusProdutosSection" onclick="showMeusProdutos()">Produtos Adicionados</a>
        </div>

        <hr class="mt-0 mb-4">

        <div id="profileSection" class="">
            <!-- Profile section content -->
            <div class="row">
                <div class="col-xl-4">
                    <!-- Profile picture card-->
                    <div class="card mb-4 mb-xl-0">
                        <div class="card-header">Foto da Loja</div>
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
                        <div class="card-header">Detalhes da Loja</div>
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

        <div id="billingSection" class="hidden">
            <!-- Conteúdo da seção de faturamento -->
            <div class="row">
                <div class="col-lg-4 mb-4">
                    <!-- Cartão de faturamento 1 -->
                    <div class="card h-100 border-start-lg border-start-primary">
                        <div class="card-body">
                            <div class="small text-muted">Fatura mensal atual</div>
                            <div class="h3">$20,00</div>
                            <a class="text-arrow-icon small" href="#!">
                                Mudar para faturamento anual
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right">
                                    <line x1="5" y1="12" x2="19" y2="12"></line>
                                    <polyline points="12 5 19 12 12 19"></polyline>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mb-4">
                    <!-- Cartão de faturamento 2 -->
                    <div class="card h-100 border-start-lg border-start-secondary">
                        <div class="card-body">
                            <div class="small text-muted">Próximo pagamento devido em</div>
                            <div class="h3">15 de julho</div>
                            <a class="text-arrow-icon small text-secondary" href="#!">
                                Ver histórico de pagamentos
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right">
                                    <line x1="5" y1="12" x2="19" y2="12"></line>
                                    <polyline points="12 5 19 12 12 19"></polyline>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mb-4">
                    <!-- Cartão de faturamento 3 -->
                    <div class="card h-100 border-start-lg border-start-success">
                        <div class="card-body">
                            <div class="small text-muted">Plano atual</div>
                            <div class="h3 d-flex align-items-center">Freelancer</div>
                            <a class="text-arrow-icon small text-success" href="#!">
                                Atualizar plano
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right">
                                    <line x1="5" y1="12" x2="19" y2="12"></line>
                                    <polyline points="12 5 19 12 12 19"></polyline>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- Adicione o restante do conteúdo da seção de faturamento conforme fornecido -->
            </div>

            <!-- Cartão de métodos de pagamento -->
            <div class="card card-header-actions mb-4">
                <div class="card-header">
                    Métodos de Pagamento
                    <button class="btn btn-sm btn-primary" type="button">Adicionar Método de Pagamento</button>
                </div>
                <div class="card-body px-0">
                    <!-- Método de pagamento 1 -->
                    <div class="d-flex align-items-center justify-content-between px-4">
                        <div class="d-flex align-items-center">
                            <i class="fab fa-cc-visa fa-2x cc-color-visa"></i>
                            <div class="ms-4">
                                <div class="small">Visa terminando em 1234</div>
                                <div class="text-xs text-muted">Expira em 04/2024</div>
                            </div>
                        </div>
                        <div class="ms-4 small">
                            <div class="badge bg-light text-dark me-3">Padrão</div>
                            <a href="#!">Editar</a>
                        </div>
                    </div>
                    <hr>
                    <!-- Método de pagamento 2 -->
                    <div class="d-flex align-items-center justify-content-between px-4">
                        <div class="d-flex align-items-center">
                            <i class="fab fa-cc-mastercard fa-2x cc-color-mastercard"></i>
                            <div class="ms-4">
                                <div class="small">Mastercard terminando em 5678</div>
                                <div class="text-xs text-muted">Expira em 05/2022</div>
                            </div>
                        </div>
                        <div class="ms-4 small">
                            <a class="text-muted me-3" href="#!">Tornar Padrão</a>
                            <a href="#!">Editar</a>
                        </div>
                    </div>
                    <hr>
                    <!-- Método de pagamento 3 -->
                    <div class="d-flex align-items-center justify-content-between px-4">
                        <div class="d-flex align-items-center">
                            <i class="fab fa-cc-amex fa-2x cc-color-amex"></i>
                            <div class="ms-4">
                                <div class="small">American Express terminando em 9012</div>
                                <div class="text-xs text-muted">Expira em 01/2026</div>
                            </div>
                        </div>
                        <div class="ms-4 small">
                            <a class="text-muted me-3" href="#!">Tornar Padrão</a>
                            <a href="#!">Editar</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Cartão de histórico de faturamento -->
            <div class="card mb-4">
                <div class="card-header">Histórico de Faturamento</div>
                <div class="card-body p-0">
                    <!-- Tabela de histórico de faturamento -->
                    <div class="table-responsive table-billing-history">
                        <table class="table mb-0">
                            <thead>
                                <tr>
                                    <th class="border-gray-200" scope="col">ID da Transação</th>
                                    <th class="border-gray-200" scope="col">Data</th>
                                    <th class="border-gray-200" scope="col">Valor</th>
                                    <th class="border-gray-200" scope="col">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>#39201</td>
                                    <td>15/06/2021</td>
                                    <td>$29,99</td>
                                    <td><span class="badge bg-light text-dark">Pendente</span></td>
                                </tr>
                                <tr>
                                    <td>#38594</td>
                                    <td>15/05/2021</td>
                                    <td>$29,99</td>
                                    <td><span class="badge bg-success">Pago</span></td>
                                </tr>
                                <tr>
                                    <td>#38223</td>
                                    <td>15/04/2021</td>
                                    <td>$29,99</td>
                                    <td><span class="badge bg-success">Pago</span></td>
                                </tr>
                                <tr>
                                    <td>#38125</td>
                                    <td>15/03/2021</td>
                                    <td>$29,99</td>
                                    <td><span class="badge bg-success">Pago</span></td>
                                </tr>
                                <!-- Adicione mais linhas de histórico de faturamento conforme necessário -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div id="securitySection" class="hidden">
            <div class="row">
                <div class="col-lg-8">
                    <!-- Cartão de Alteração de Senha -->
                    <div class="card mb-4">
                        <div class="card-header">Alterar Senha</div>
                        <div class="card-body">
                            <form>
                                <!-- Grupo de Formulário (senha atual) -->
                                <div class="mb-3">
                                    <label class="small mb-1" for="currentPassword">Senha Atual</label>
                                    <input class="form-control" id="currentPassword" type="password" placeholder="Digite a senha atual">
                                </div>
                                <!-- Grupo de Formulário (nova senha) -->
                                <div class="mb-3">
                                    <label class="small mb-1" for="newPassword">Nova Senha</label>
                                    <input class="form-control" id="newPassword" type="password" placeholder="Digite a nova senha">
                                </div>
                                <!-- Grupo de Formulário (confirmar senha) -->
                                <div class="mb-3">
                                    <label class="small mb-1" for="confirmPassword">Confirmar Nova Senha</label>
                                    <input class="form-control" id="confirmPassword" type="password" placeholder="Confirmar a nova senha">
                                </div>
                                <button class="btn btn-primary" type="button">Salvar</button>
                            </form>
                        </div>
                    </div>
                    <!-- Cartão de Preferências de Segurança -->
                    <div class="card mb-4">
                        <div class="card-header">Preferências de Segurança</div>
                        <div class="card-body">
                            <!-- Opções de Privacidade da Conta -->
                            <h5 class="mb-1">Privacidade da Conta</h5>
                            <p class="small text-muted">Ao definir sua conta como privada, suas informações de perfil e
                                postagens não serão visíveis para usuários fora de seus grupos de usuários.</p>
                            <form>
                                <div class="form-check">
                                    <input class="form-check-input" id="radioPrivacy1" type="radio" name="radioPrivacy" checked="">
                                    <label class="form-check-label" for="radioPrivacy1">Público (postagens disponíveis
                                        para todos os usuários)</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" id="radioPrivacy2" type="radio" name="radioPrivacy">
                                    <label class="form-check-label" for="radioPrivacy2">Privado (postagens disponíveis
                                        apenas para usuários de seus grupos)</label>
                                </div>
                            </form>
                            <hr class="my-4">
                            <!-- Opções de Compartilhamento de Dados -->
                            <h5 class="mb-1">Compartilhamento de Dados</h5>
                            <p class="small text-muted">Compartilhar dados de uso pode nos ajudar a melhorar nossos
                                produtos e atender melhor nossos usuários enquanto navegam em nossa aplicação. Quando
                                você concorda em compartilhar dados de uso conosco, relatórios de falhas e análises de
                                uso serão automaticamente enviados para nossa equipe de desenvolvimento para
                                investigação.</p>
                            <form>
                                <div class="form-check">
                                    <input class="form-check-input" id="radioUsage1" type="radio" name="radioUsage" checked="">
                                    <label class="form-check-label" for="radioUsage1">Sim, compartilhar dados e
                                        relatórios de falhas com os desenvolvedores de aplicativos</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" id="radioUsage2" type="radio" name="radioUsage">
                                    <label class="form-check-label" for="radioUsage2">Não, limitar meu compartilhamento
                                        de dados com os desenvolvedores de aplicativos</label>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <!-- Cartão de Autenticação de Dois Fatores -->
                    <div class="card mb-4">
                        <div class="card-header">Autenticação de Dois Fatores</div>
                        <div class="card-body">
                            <p>Adicione um nível adicional de segurança à sua conta ativando a autenticação de dois
                                fatores. Enviaremos uma mensagem de texto para verificar suas tentativas de login em
                                dispositivos e navegadores não reconhecidos.</p>
                            <form>
                                <div class="form-check">
                                    <input class="form-check-input" id="twoFactorOn" type="radio" name="twoFactor" checked="">
                                    <label class="form-check-label" for="twoFactorOn">Ligado</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" id="twoFactorOff" type="radio" name="twoFactor">
                                    <label class="form-check-label" for="twoFactorOff">Desligado</label>
                                </div>
                                <div class="mt-3">
                                    <label class="small mb-1" for="twoFactorSMS">Número de SMS</label>
                                    <input class="form-control" id="twoFactorSMS" type="tel" placeholder="Digite um número de telefone" value="555-123-4567">
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- Cartão de Exclusão de Conta -->
                    <div class="card mb-4">
                        <div class="card-header">Excluir Conta</div>
                        <div class="card-body">
                            <p>Excluir sua conta é uma ação permanente e não pode ser desfeita. Se você tem certeza de
                                que deseja excluir sua conta, selecione o botão abaixo.</p>
                            <button class="btn btn-danger-soft text-danger" type="button">Entendi, excluir minha
                                conta</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div id="notificationSection" class="hidden">
            <div class="row">
                <div class="col-lg-8">
                    <!-- Cartão de Preferências de Notificações por Email -->
                    <div class="card card-header-actions mb-4">
                        <div class="card-header">
                            Notificações por Email
                            <div class="form-check form-switch">
                                <input class="form-check-input" id="flexSwitchCheckChecked" type="checkbox" checked="">
                                <label class="form-check-label" for="flexSwitchCheckChecked"></label>
                            </div>
                        </div>
                        <div class="card-body">
                            <form>
                                <!-- Grupo de Formulário (email de notificação padrão) -->
                                <div class="mb-3">
                                    <label class="small mb-1" for="inputNotificationEmail">Email de notificação
                                        padrão</label>
                                    <input class="form-control" id="inputNotificationEmail" type="email" value="nome@exemplo.com" disabled="">
                                </div>
                                <!-- Grupo de Formulário (caixas de seleção de atualizações de email) -->
                                <div class="mb-0">
                                    <label class="small mb-2">Escolha quais tipos de atualizações por email você deseja
                                        receber</label>
                                    <div class="form-check mb-2">
                                        <input class="form-check-input" id="checkAccountChanges" type="checkbox" checked="">
                                        <label class="form-check-label" for="checkAccountChanges">Alterações feitas na
                                            sua
                                            conta</label>
                                    </div>
                                    <div class="form-check mb-2">
                                        <input class="form-check-input" id="checkAccountGroups" type="checkbox" checked="">
                                        <label class="form-check-label" for="checkAccountGroups">Alterações feitas em
                                            grupos dos quais você faz parte</label>
                                    </div>
                                    <div class="form-check mb-2">
                                        <input class="form-check-input" id="checkProductUpdates" type="checkbox" checked="">
                                        <label class="form-check-label" for="checkProductUpdates">Atualizações de
                                            produtos para
                                            produtos que você comprou ou marcou como favorito</label>
                                    </div>
                                    <div class="form-check mb-2">
                                        <input class="form-check-input" id="checkProductNew" type="checkbox" checked="">
                                        <label class="form-check-label" for="checkProductNew">Informações sobre novos
                                            produtos e serviços</label>
                                    </div>
                                    <div class="form-check mb-2">
                                        <input class="form-check-input" id="checkPromotional" type="checkbox">
                                        <label class="form-check-label" for="checkPromotional">Ofertas de marketing e
                                            promoções</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" id="checkSecurity" type="checkbox" checked="" disabled="">
                                        <label class="form-check-label" for="checkSecurity">Alertas de segurança</label>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- Cartão de Preferências de Notificações Push por SMS -->
                    <div class="card card-header-actions mb-4">
                        <div class="card-header">
                            Notificações Push por SMS
                            <div class="form-check form-switch">
                                <input class="form-check-input" id="smsToggleSwitch" type="checkbox" checked="">
                                <label class="form-check-label" for="smsToggleSwitch"></label>
                            </div>
                        </div>
                        <div class="card-body">
                            <form>
                                <!-- Grupo de Formulário (número SMS padrão) -->
                                <div class="mb-3">
                                    <label class="small mb-1" for="inputNotificationSms">Número SMS padrão</label>
                                    <input class="form-control" id="inputNotificationSms" type="tel" value="123-456-7890" disabled="">
                                </div>
                                <!-- Grupo de Formulário (caixas de seleção de atualizações por SMS) -->
                                <div class="mb-0">
                                    <label class="small mb-2">Escolha quais tipos de notificações push por SMS você
                                        deseja receber</label>
                                    <div class="form-check mb-2">
                                        <input class="form-check-input" id="checkSmsComment" type="checkbox" checked="">
                                        <label class="form-check-label" for="checkSmsComment">Alguém comenta em sua
                                            postagem</label>
                                    </div>
                                    <div class="form-check mb-2">
                                        <input class="form-check-input" id="checkSmsShare" type="checkbox">
                                        <label class="form-check-label" for="checkSmsShare">Alguém compartilha sua
                                            postagem</label>
                                    </div>
                                    <div class="form-check mb-2">
                                        <input class="form-check-input" id="checkSmsFollow" type="checkbox" checked="">
                                        <label class="form-check-label" for="checkSmsFollow">Um usuário segue sua
                                            conta</label>
                                    </div>
                                    <div class="form-check mb-2">
                                        <input class="form-check-input" id="checkSmsGroup" type="checkbox">
                                        <label class="form-check-label" for="checkSmsGroup">Novas postagens em grupos
                                            dos quais
                                            você faz parte</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" id="checkSmsPrivateMessage" type="checkbox" checked="">
                                        <label class="form-check-label" for="checkSmsPrivateMessage">Você recebe uma
                                            mensagem privada</label>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <!-- Cartão de Preferências de Notificações -->
                    <div class="card">
                        <div class="card-header">Preferências de Notificação</div>
                        <div class="card-body">
                            <form>
                                <!-- Grupo de Formulário (caixas de seleção de preferências de notificação) -->
                                <div class="form-check mb-2">
                                    <input class="form-check-input" id="checkAutoGroup" type="checkbox" checked="">
                                    <label class="form-check-label" for="checkAutoGroup">Inscrever-se automaticamente
                                        nas
                                        notificações de grupo</label>
                                </div>
                                <div class="form-check mb-3">
                                    <input class="form-check-input" id="checkAutoProduct" type="checkbox">
                                    <label class="form-check-label" for="checkAutoProduct">Inscrever-se automaticamente
                                        nas
                                        notificações de novos produtos</label>
                                </div>
                                <!-- Botão de envio -->
                                <button class="btn btn-danger-soft text-danger">Cancelar inscrição de todas as
                                    notificações</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="adicionarProdutoSection" class="hidden">
            <div class="container mt-5">
                <h2>Formulário de Adição de Produto</h2>

                <form id="productForm" action="../controller/inserirProdutoController.php" method="post" enctype="multipart/form-data">
                <input type="hidden" id="inputId" name="inputId" value="<?php echo $profileID; ?>">
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

        <div id="meusProdutosSection" class="hidden">
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
                $arrayProducts = [
                    ['nome' => 'Produto 1', 'descricao' => 'Descrição do Produto 1', 'preco' => 19.99, 'quantidade' => 10, 'tamanho' => 'XL'],
                    ['nome' => 'Produto 2', 'descricao' => 'Descrição do Produto 2', 'preco' => 29.99, 'quantidade' => 5, 'tamanho' => 'L'],
                    // Adicione mais produtos conforme necessário
                ];

                foreach ($arrayProducts as $product) {
                ?>
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <!-- <img src="<?= $product['imagem'] ?>" class="card-img-top" alt="Imagem do Produto"> -->
                            <img src="../assets/img/product-1.png" class="card-img-top" alt="Imagem do Produto">
                            <div class="card-body">
                                <h5 class="card-title"><?= $product['nome'] ?></h5>
                                <p class="card-text"><?= $product['descricao'] ?></p>
                                <p class="card-text">Preço: R$ <?= number_format($product['preco'], 2) ?></p>
                                <p class="card-text">Quantidade em Estoque: <?= $product['quantidade'] ?></p>
                                <p class="card-text">Tamanho: <?= $product['tamanho'] ?></p>
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
    </div>
    <br><br>

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
    // Função para mostrar a seção de Perfil
    function showProfile() {
        document.getElementById("profileSection").classList.remove("hidden");
        document.getElementById("billingSection").classList.add("hidden");
        document.getElementById("securitySection").classList.add("hidden");
        document.getElementById("notificationSection").classList.add("hidden");
        document.getElementById("adicionarProdutoSection").classList.add("hidden");
        document.getElementById("meusProdutosSection").classList.add("hidden");
    }

    // Função para mostrar a seção de Cobrança
    function showBilling() {
        document.getElementById("profileSection").classList.add("hidden");
        document.getElementById("billingSection").classList.remove("hidden");
        document.getElementById("securitySection").classList.add("hidden");
        document.getElementById("notificationSection").classList.add("hidden");
        document.getElementById("adicionarProdutoSection").classList.add("hidden");
        document.getElementById("meusProdutosSection").classList.add("hidden");
    }

    // Função para mostrar a seção de Segurança
    function showSecurity() {
        document.getElementById("profileSection").classList.add("hidden");
        document.getElementById("billingSection").classList.add("hidden");
        document.getElementById("securitySection").classList.remove("hidden");
        document.getElementById("notificationSection").classList.add("hidden");
        document.getElementById("adicionarProdutoSection").classList.add("hidden");
        document.getElementById("meusProdutosSection").classList.add("hidden");
    }

    // Função para mostrar a seção de Notificações
    function showNotifications() {
        document.getElementById("profileSection").classList.add("hidden");
        document.getElementById("billingSection").classList.add("hidden");
        document.getElementById("securitySection").classList.add("hidden");
        document.getElementById("notificationSection").classList.remove("hidden");
        document.getElementById("adicionarProdutoSection").classList.add("hidden");
        document.getElementById("meusProdutosSection").classList.add("hidden");
    }

    // Função para mostrar a seção de Adicionar Produto
    function showAddProduto() {
        document.getElementById("profileSection").classList.add("hidden");
        document.getElementById("billingSection").classList.add("hidden");
        document.getElementById("securitySection").classList.add("hidden");
        document.getElementById("notificationSection").classList.add("hidden");
        document.getElementById("adicionarProdutoSection").classList.remove("hidden");
        document.getElementById("meusProdutosSection").classList.add("hidden");
    }

    // Função para mostrar a seção de Meus Produtos
    function showMeusProdutos() {
        document.getElementById("profileSection").classList.add("hidden");
        document.getElementById("billingSection").classList.add("hidden");
        document.getElementById("securitySection").classList.add("hidden");
        document.getElementById("notificationSection").classList.add("hidden");
        document.getElementById("adicionarProdutoSection").classList.add("hidden");
        document.getElementById("meusProdutosSection").classList.remove("hidden");
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