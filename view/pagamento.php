<?php
require_once '../vendor/autoload.php';
require_once 'navbar.php';
require_once '../controller/config.php'; // Inclui o arquivo de configuração

// SDK do MercadoPago
use MercadoPago\Client\Preference\PreferenceClient;
use MercadoPago\MercadoPagoConfig;

//Adicione as credenciais
MercadoPagoConfig::setAccessToken("APP_USR-3908918862209501-112119-5f1b8b567d783951a50e316dd34a088e-1284764382");

$client = new PreferenceClient();
$items = array();

// Loop pelos produtos no carrinho
foreach ($_SESSION['cart'] as $productId) {
    // Consulta SQL para obter os detalhes do produto
    $sql = "SELECT nomeProduto, precoProduto FROM produtos WHERE idProduto = ?";
    $stmt = $conexao->prepare($sql);
    $stmt->bindParam(1, $productId);

    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    // Obtém a quantidade do produto no carrinho
    $quantity = 1; // Valor padrão
    if (isset($_SESSION['cart_quantity'][$productId])) {
        $quantity = $_SESSION['cart_quantity'][$productId];
    }

    $item = array(
        "title" => $row["nomeProduto"],
        "quantity" => $quantity,
        "currency_id" => "BRL",
        "unit_price" => $row["precoProduto"]
    );
    array_push($items, $item);
}

$preference = $client->create([
    "items" => $items
]);

// Obtendo o ID da preferência
$preference_id = $preference->id;

// Gera o HTML dinamicamente


?>



<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/057ae39a47.js" crossorigin="anonymous"></script>

    <title>Pagamento - Belchior</title>
    <link rel="icon" href="../assets/img/favicon.png" type="image/x-icon">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
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
    <link rel="stylesheet" href="../assets/css/style.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-Ljzmr5Wd6Wh+RSRBRU5tJj9PQ6ry5wi0S0RBi6UBOe2WiDxoUGZrlyYtr0JdPZ5e1u/f0DVx+uPW1vOqoaVm4w==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<style>
    .pagar {
        background-color: #009ee3;
    }

    .pagar:hover {
        background-color: #009ee3;
    }
</style>

<body>

    <!-- Conteúdo da Página -->

    <div class="hero-wrap hero-bread" style="background-image: url('../assets/img/bg_6.jpg');">
        <div class="container">
            <div class="row no-gutters slider-text align-items-center justify-content-center">
                <div class="col-md-9 ftco-animate text-center">
                    <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Ínicio</a></span> <span>Pagamento</span>
                    </p>
                    <h1 class="mb-0 bread">Pagamento</h1>
                </div>
            </div>
        </div>
    </div>

    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-10 ftco-animate">
                    <form action="#" class="billing-form">
                        <h3 class="mb-4 billing-heading">Detalhes de Cobrança</h3>
                        <div class="row align-items-end">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="firstname">Nome Completo</label>
                                    <input type="text" class="form-control" placeholder="">
                                </div>
                            </div>
                            <div class="w-100"></div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="country">Estado / País</label>
                                    <div class="select-wrap">
                                        <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                                        <select name="" id="" class="form-control">
                                            <option value="">França</option>
                                            <option value="">Itália</option>
                                            <option value="">Filipinas</option>
                                            <option value="">Coreia do Sul</option>
                                            <option value="">Hong Kong</option>
                                            <option value="">Japão</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="w-100"></div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="streetaddress">Endereço</label>
                                    <input type="text" class="form-control" placeholder="Número da casa e nome da rua">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Apartamento, suite, unidade, etc. (opcional)">
                                </div>
                            </div>
                            <div class="w-100"></div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="towncity">Cidade</label>
                                    <input type="text" class="form-control" placeholder="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="postcodecep">Código Postal / CEP *</label>
                                    <input type="text" class="form-control" placeholder="">
                                </div>
                            </div>
                            <div class="w-100"></div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="phone">Telefone</label>
                                    <input type="text" class="form-control" placeholder="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="emailaddress">Endereço de E-mail</label>
                                    <input type="text" class="form-control" placeholder="">
                                </div>
                            </div>
                            <div class="w-100"></div>
                            <div class="col-md-12">
                                <div class="form-group mt-4">
                                    <div class="radio">
                                        <label class="mr-3"><input type="radio" name="optradio"> Criar uma Conta?
                                        </label>
                                        <!-- <label><input type="radio" name="optradio"> Enviar para um endereço diferente</label> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form><!-- FIM -->

                    <div class="row mt-5 pt-3 d-flex">
                        <div class="col-md-6 d-flex">
                            <div class="cart-detail cart-total bg-light p-3 p-md-4">
                                <h2>Junte-se a Nós!</h2>
                                <p>Crie uma conta e solicite afiliação para vender seus produtos conosco!</p>

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="cart-detail bg-light p-3 p-md-4">
                                <h3 class="billing-heading mb-4">Método de Pagamento</h3>
                                <p>Pode ser escolhido na plataforma MERCADO PAGO.</p>
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <div class="checkbox">
                                            <label><input type="checkbox" value="" class="mr-2"> Li e aceito os termos e
                                                condições</label>
                                        </div>
                                    </div>
                                </div><?php
                                        echo "<h2>Pagar com Mercado Pago</h2>";
                                        echo "<button id='payButton' class='btn btn-primary pagar py-3 px-4'></button>";
                                        ?>
                            </div>
                        </div>
                    </div>
                </div> <!-- .col-md-8 -->
            </div>
        </div>
    </section> <!-- .section -->



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
                                <li><a href="#"><span class="icon icon-phone"> </span><span class="text">+2 392 3929
                                            210</span></a></li>
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

    <script src="https://sdk.mercadopago.com/js/v2"></script>

    <script>
        // Configura o Mercado Pago
        const mp = new MercadoPago('APP_USR-183ee0c3-6ae2-476f-8fc5-bbd2526dc8cf', {
            locale: 'pt-BR'
        });

        // Adiciona o botão de pagamento
        mp.checkout({
            preference: {
                id: '<?php echo $preference_id; ?>'
            },
            render: {
                container: '#payButton', // Indica onde o botão de pagamento será exibido
                label: 'Pagar',
            },
            on: {
                close: function() {
                    // Trata o evento de fechamento do modal
                    alert('Você fechou o modal de pagamento!');
                }
            }
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

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

    <script src="https://sdk.mercadopago.com/js/v2"></script>


</body>

</html>