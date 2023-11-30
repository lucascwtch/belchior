<?php
include_once('navbar.php');
require_once('../controller/config.php');



function getProductDetails($productId, $conexao)
{
    $sql = "SELECT * FROM produtos WHERE idProduto = $productId";
    $result = $conexao->query($sql);

    if ($result->rowCount() > 0) {
        return $result->fetch();
    }

    return null;
}


?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/057ae39a47.js" crossorigin="anonymous"></script>

    <title>Carrinho - Belchior</title>
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
    <link rel="stylesheet" href="../assets/css/produtos_style.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-Ljzmr5Wd6Wh+RSRBRU5tJj9PQ6ry5wi0S0RBi6UBOe2WiDxoUGZrlyYtr0JdPZ5e1u/f0DVx+uPW1vOqoaVm4w==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body>

    <section class="ftco-section ftco-cart">
        <div class="container">
            <div class="row">
                <div class="col-md-12 ftco-animate">
                    <div class="cart-list">
                        <table class="table">
                            <thead class="thead-primary">
                                <tr class="text-center">
                                    <th>&nbsp;</th>
                                    <th>&nbsp;</th>
                                    <th>Produto</th>
                                    <th>Preço</th>
                                    <th>Quantidade</th>
                                    <th>Total</th>
                                </tr>
                            </thead>



                            <tbody>
                                <?php
                                $totalPrice = 0;

                                if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
                                    foreach ($_SESSION['cart'] as $productId) {
                                        $product = getProductDetails($productId, $conexao);

                                        if ($product) {
                                            echo "<tr class='text-center'>";
                                            echo "<td class='product-remove'><a href='../controller/removerDoCarrinhoController.php?id={$productId}'><span class='ion-ios-close'></span></a></td>";
                                            echo "<td class='image-prod'><img class='img-fluid' src='../assets/img/produtos/{$product['imagemProduto']}' alt='Colorlib Template' style='max-width: 100px; max-height: 100px;'></td>";
                                            echo "<td class='product-name'><h3>{$product['nomeProduto']}</h3><p>{$product['descricaoProduto']}</p></td>";
                                            echo "<td class='price'>R$ <span class='unit-price'>{$product['precoProduto']}</span></td>";

                                            echo "<td class='quantity'><div class='input-group mb-3'><input type='text' name='quantity' class='quantity form-control input-number' value='1' min='1' max='100' data-price='" . floatval($product['precoProduto']) . "'></div></td>";


                                            $quantity = 1; // Valor padrão
                                            if (isset($_SESSION['cart_quantity'][$productId])) {
                                                $quantity = $_SESSION['cart_quantity'][$productId];
                                            }

                                            $valorTotalProduto = $product['precoProduto'] * $quantity;
                                            $totalPrice += $valorTotalProduto;

                                            echo "<td class='total'>R$ <span class='product-total'>{$valorTotalProduto}</span></td>";
                                            echo "</tr>";
                                        }
                                    }

                                    echo "<tr class='text-center'>";
                                    echo "<td colspan='5' class='total-price'><span>Total</span></td>";
                                    echo "<td class='total'>R$ <span class='cart-total-price'>{$totalPrice}</span></td>";
                                    echo "</tr>";
                                } else {
                                    echo "<tr class='text-center'>";
                                    echo "<td colspan='6'>Seu carrinho está vazio.</td>";
                                    echo "</tr>";
                                }
                                ?>
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
            <div class="row justify-content-start">
                <div class="col col-lg-5 col-md-6 mt-5 cart-wrap ftco-animate">
                    <div class="cart-total mb-3">
                        <h3>Total do Carrinho</h3>
                        <p class="d-flex">
                            <span>Subtotal</span>
                            <span>R$ <?= $totalPrice ?></span>
                        </p>
                        <p class="d-flex">
                            <span>Entrega</span>
                            <span>R$ 0.00</span>
                        </p>
                        <hr>
                        <p class="d-flex total-price">
                            <span>Total</span>
                            <span class="cart-total-price">R$ <?= $totalPrice ?></span>
                        </p>
                    </div>
                    <p class="text-center"><a href="pagamento.php" class="btn btn-primary py-3 px-4">Finalizar Compra</a></p>
                </div>
            </div>
        </div>
    </section>




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


    <script>
        $(document).ready(function() {
            $('.minus').click(function(e) {
                e.preventDefault();
                var $input = $(this).parent().find('input');
                var count = parseInt($input.val()) - 1;
                count = count < 1 ? 1 : count;
                $input.val(count);
                $input.change();
                return false;
            });
            $('.plus').click(function(e) {
                e.preventDefault();
                var $input = $(this).parent().find('input');
                $input.val(parseInt($input.val()) + 1);
                $input.change();
                return false;
            });

            $('.quantity').on('change', function() {
                var quantidade = parseInt($(this).val());
                var preco = parseFloat($(this).data('price'));
                if (!isNaN(quantidade) && !isNaN(preco)) {
                    var total = quantidade * preco;

                    // Atualiza o preço total do produto
                    $(this).closest('tr').find('.product-total').text(total.toFixed(2));

                    // Atualiza o preço total do carrinho
                    var precoTotal = 0;
                    $('.product-total').each(function() {
                        var productTotal = parseFloat($(this).text());
                        if (!isNaN(productTotal)) {
                            precoTotal += productTotal;
                        }
                    });
                    $('.cart-total-price').text(precoTotal.toFixed(2));
                }
            });
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
    <script src="../assets/js/adicionarProdutos.js"></script>

</body>

</html>