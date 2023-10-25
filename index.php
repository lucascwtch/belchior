<?php

include_once "model/logica_perfil_index.php";

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://kit.fontawesome.com/057ae39a47.js" crossorigin="anonymous"></script>

  <title>Belchior</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="icon" href="assets/img/favicon.png" type="image/x-icon">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">

  <link rel="stylesheet" href="assets/css/ionicons.min.css">
  <link rel="stylesheet" href="assets/css/flaticon.css">
  <link rel="stylesheet" href="assets/css/icomoon.css">
  <link rel="stylesheet" href="assets/css/animate.css">

  <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
  <link rel="stylesheet" href="assets/css/owl.theme.default.min.css">
  <link rel="stylesheet" href="assets/css/magnific-popup.css">
  <link rel="stylesheet" href="assets/css/aos.css">


  <link rel="stylesheet" href="assets/css/open-iconic-bootstrap.min.css">
  <link rel="stylesheet" href="assets/css/animate.css">

</head>

<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
        <div class="container">
            <a class="navbar-brand mx-auto" href="#">Belchior</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive"
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Início</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Produtos</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="./view/contato.html">Contato</a>
                    </li>
                    <li class='nav-item'>
                        <a class='nav-link' href='<?php echo $profileLink; ?>'><?php echo $profileName; ?></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

  <main>
    <section class="py-5">
      <div class="head">
        <div class="title">
          <h1 class="fw-light"></h1>
        </div>
        <div class="logo">
          <img src="./assets/img/belchior.png" alt="logo">
        </div>
      </div>
    </section>

    <p class="subtitle">Comece o seu negócio da melhor maneira!</p>
    <section>
      <div class="container">
        <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
          <div class="carousel-inner">
            <!-- Slide 1 -->
            <div class="carousel-item active">
              <div class="row">

                <!-- Card 1 -->

                <div class="col-md-3">
                  <div class="card">
                    <img src="assets/img/loja01.jpg" class="card-img-top" alt="Produto 1">
                    <div class="card-body">
                      <h5 class="card-title">Pamela</h5>
                      <p class="card-text">Moda e Acessórios</p>
                      <div class="d-flex justify-content-between align-items-center">
                        <button type="button" class="btn btn-black botao-conhecer">Conhecer</button>
                      </div>
                    </div>
                  </div>
                </div>

                <!-- Card 2 -->

                <div class="col-md-3">
                  <div class="card">
                    <img src="assets/img/loja02.jpg" class="card-img-top" alt="Produto 1">
                    <div class="card-body">
                      <h5 class="card-title">Exclusiva</h5>
                      <p class="card-text">Renata Dário</p>
                      <div class="d-flex justify-content-between align-items-center">
                        <button type="button" class="btn btn-primary botao-conhecer">Conhecer</button>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- Card 3 -->

                <div class="col-md-3">
                  <div class="card">
                    <img src="assets/img/loja03.jpg" class="card-img-top" alt="Produto 1">
                    <div class="card-body">
                      <h5 class="card-title">Tacca</h5>
                      <p class="card-text">Chantrieri</p>
                      <div class="d-flex justify-content-between align-items-center">
                        <button type="button" class="btn btn-primary botao-conhecer">Conhecer</button>
                      </div>
                    </div>
                  </div>
                </div>

                <!-- Card 4 -->

                <div class="col-md-3">
                  <div class="card">
                    <img src="assets/img/loja04.jpg" class="card-img-top" alt="Produto 1">
                    <div class="card-body">
                      <h5 class="card-title">The Little Number</h5>
                      <p class="card-text">Boutique</p>
                      <div class="d-flex justify-content-between align-items-center">
                        <button type="button" class="btn btn-primary botao-conhecer">Conhecer</button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Slide 2 -->
            <div class="carousel-item">
              <div class="row">

                <div class="col-md-3">
                  <div class="card">
                    <img src="assets/img/loja04.jpg" class="card-img-top" alt="Produto 1">
                    <div class="card-body">
                      <h5 class="card-title">The Little Number</h5>
                      <p class="card-text">Boutique</p>
                      <div class="d-flex justify-content-between align-items-center">
                        <button type="button" class="btn btn-primary botao-conhecer">Conhecer</button>
                      </div>
                    </div>
                  </div>
                </div>

                <!-- Adicione mais colunas de cartões aqui -->

                <div class="col-md-3">
                  <div class="card">
                    <img src="assets/img/loja03.jpg" class="card-img-top" alt="Produto 1">
                    <div class="card-body">
                      <h5 class="card-title">Tacca</h5>
                      <p class="card-text">Chantrieri</p>
                      <div class="d-flex justify-content-between align-items-center">
                        <button type="button" class="btn btn-primary botao-conhecer">Conhecer</button>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-md-3">
                  <div class="card">
                    <img src="assets/img/loja02.jpg" class="card-img-top" alt="Produto 1">
                    <div class="card-body">
                      <h5 class="card-title">Exclusiva</h5>
                      <p class="card-text">Renata Dário</p>
                      <div class="d-flex justify-content-between align-items-center">
                        <button type="button" class="btn btn-primary botao-conhecer">Conhecer</button>
                      </div>
                    </div>
                  </div>
                </div>

              </div>
            </div>
          </div>
          <a class="carousel-control-prev" href="#myCarousel" role="button" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Anterior</span>
          </a>
          <a class="carousel-control-next" href="#myCarousel" role="button" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Próximo</span>
          </a>
        </div>
      </div>
    </section>
  </main>


  <section class="bg-light">
    <div class="container">
      <div class="row no-gutters ftco-services">
        <div class="col-lg-4 text-center d-flex align-self-stretch ftco-animate">
          <div class="media block-6 services p-4 py-md-5">
            <div class="icon d-flex justify-content-center align-items-center mb-4">
              <span class="flaticon-bag"></span>
            </div>
            <div class="media-body">
              <h3 class="heading">Loja Online</h3>
              <p>Faça a sua loja online em poucos minutos!</p>
            </div>
          </div>
        </div>
        <div class="col-lg-4 text-center d-flex align-self-stretch ftco-animate">
          <div class="media block-6 services p-4 py-md-5">
            <div class="icon d-flex justify-content-center align-items-center mb-4">
              <span class="flaticon-customer-service"></span>
            </div>
            <div class="media-body">
              <h3 class="heading">Suporte</h3>
              <p>Se desejar ajuda com a loja, estamos a disposição!</p>
            </div>
          </div>
        </div>
        <div class="col-lg-4 text-center d-flex align-self-stretch ftco-animate">
          <div class="media block-6 services p-4 py-md-5">
            <div class="icon d-flex justify-content-center align-items-center mb-4">
              <span class="flaticon-payment-security"></span>
            </div>
            <div class="media-body">
              <h3 class="heading">Pagamentos Seguros</h3>
              <p>Utilizamos o Mercado Pago, 100% seguro!</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>



  <section class="ftco-section bg-light">
    <div class="container">
      <div class="row justify-content-center mb-3 pb-3">
        <div class="col-md-12 heading-section text-center ftco-animate">
          <h2 class="mb-4">Produtos em Destaque</h2>
          <p>Não perca a chance de adquirir qualidade e preços imbatíveis!</p>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-sm-12 col-md-6 col-lg-3 ftco-animate d-flex">
          <div class="product d-flex flex-column">
            <a href="#" class="img-prod"><img class="img-fluid" src="assets/img/produto-01.png" alt="Colorlib Template">
              <div class="overlay"></div>
            </a>
            <div class="text py-3 pb-4 px-3">
              <div class="d-flex">
                <div class="cat">
                  <span>VestindoFC</span>
                </div>
                <div class="rating">
                  <p class="text-right mb-0">
                    <a href="#"><span class="ion-ios-star-outline"></span></a>
                    <a href="#"><span class="ion-ios-star-outline"></span></a>
                    <a href="#"><span class="ion-ios-star-outline"></span></a>
                    <a href="#"><span class="ion-ios-star-outline"></span></a>
                    <a href="#"><span class="ion-ios-star-outline"></span></a>
                  </p>
                </div>
              </div>
              <h3><a href="#">Nike Air Force 1</a></h3>
              <div class="pricing">
                <p class="price"><span>R$300.00</span></p>
              </div>
              <p class="bottom-area d-flex px-3">
                <a href="#" class="add-to-cart text-center py-2 mr-1"><span>Carrinho <i
                      class="ion-ios-add ml-1"></i></span></a>
                <a href="#" class="buy-now text-center py-2">COMPRAR AGORA<span><i class="ion-ios-cart ml-1"></i></span></a>
              </p>
            </div>
          </div>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-3 ftco-animate d-flex">
          <div class="product d-flex flex-column">
            <a href="#" class="img-prod"><img class="img-fluid" src="assets/img/produto-02.png" alt="Colorlib Template">
              <span class="status">50% Off</span>
              <div class="overlay"></div>
            </a>
            <div class="text py-3 pb-4 px-3">
              <div class="d-flex">
                <div class="cat">
                  <span>Lifestyle</span>
                </div>
                <div class="rating">
                  <p class="text-right mb-0">
                    <a href="#"><span class="ion-ios-star-outline"></span></a>
                    <a href="#"><span class="ion-ios-star-outline"></span></a>
                    <a href="#"><span class="ion-ios-star-outline"></span></a>
                    <a href="#"><span class="ion-ios-star-outline"></span></a>
                    <a href="#"><span class="ion-ios-star-outline"></span></a>
                  </p>
                </div>
              </div>
              <h3><a href="#">Nike Air Max TN Plus</a></h3>
              <div class="pricing">
                <p class="price"><span class="mr-2 price-dc">R$550.00</span><span class="price-sale">$225.00</span></p>
              </div>
              <p class="bottom-area d-flex px-3">
                <a href="#" class="add-to-cart text-center py-2 mr-1"><span>Carrinho <i
                      class="ion-ios-add ml-1"></i></span></a>
                <a href="#" class="buy-now text-center py-2">COMPRAR AGORA<span><i class="ion-ios-cart ml-1"></i></span></a>
              </p>
            </div>
          </div>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-3 ftco-animate d-flex">
          <div class="product">
            <a href="#" class="img-prod"><img class="img-fluid" src="assets/img/produto-03.png" alt="Colorlib Template">
              <div class="overlay"></div>
            </a>
            <div class="text py-3 pb-4 px-3">
              <div class="d-flex">
                <div class="cat">
                  <span>Tacca</span>
                </div>
                <div class="rating">
                  <p class="text-right mb-0">
                    <a href="#"><span class="ion-ios-star-outline"></span></a>
                    <a href="#"><span class="ion-ios-star-outline"></span></a>
                    <a href="#"><span class="ion-ios-star-outline"></span></a>
                    <a href="#"><span class="ion-ios-star-outline"></span></a>
                    <a href="#"><span class="ion-ios-star-outline"></span></a>
                  </p>
                </div>
              </div>
              <h3><a href="#">Bolsa Com Detalhes Metálicos</a></h3>
              <div class="pricing">
                <p class="price"><span>R$43.00</span></p>
              </div>
              <p class="bottom-area d-flex px-3">
                <a href="#" class="add-to-cart text-center py-2 mr-1"><span>Carrinho <i
                      class="ion-ios-add ml-1"></i></span></a>
                <a href="#" class="buy-now text-center py-2">COMPRAR AGORA<span><i class="ion-ios-cart ml-1"></i></span></a>
              </p>
            </div>
          </div>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-3 ftco-animate d-flex">
          <div class="product">
            <a href="#" class="img-prod"><img class="img-fluid" src="assets/img/produto-04.png" alt="Colorlib Template">
              <div class="overlay"></div>
            </a>
            <div class="text py-3 pb-4 px-3">
              <div class="d-flex">
                <div class="cat">
                  <span>Lifestyle</span>
                </div>
                <div class="rating">
                  <p class="text-right mb-0">
                    <a href="#"><span class="ion-ios-star-outline"></span></a>
                    <a href="#"><span class="ion-ios-star-outline"></span></a>
                    <a href="#"><span class="ion-ios-star-outline"></span></a>
                    <a href="#"><span class="ion-ios-star-outline"></span></a>
                    <a href="#"><span class="ion-ios-star-outline"></span></a>
                  </p>
                </div>
              </div>
              <h3><a href="#">Letter Graphic Boné de beisebol</a></h3>
              <div class="pricing">
                <p class="price"><span>R$70.00</span></p>
              </div>
              <p class="bottom-area d-flex px-3">
                <a href="#" class="add-to-cart text-center py-2 mr-1"><span>Carrinho <i
                      class="ion-ios-add ml-1"></i></span></a>
                <a href="#" class="buy-now text-center py-2">COMPRAR AGORA<span><i class="ion-ios-cart ml-1"></i></span></a>
              </p>
            </div>
          </div>
        </div>

        <div class="col-sm-12 col-md-6 col-lg-3 ftco-animate d-flex">
          <div class="product d-flex flex-column">
            <a href="#" class="img-prod"><img class="img-fluid" src="assets/img/produto-05.png" alt="Colorlib Template">
              <div class="overlay"></div>
            </a>
            <div class="text py-3 pb-4 px-3">
              <div class="d-flex">
                <div class="cat">
                  <span>Sandy</span>
                </div>
                <div class="rating">
                  <p class="text-right mb-0">
                    <a href="#"><span class="ion-ios-star-outline"></span></a>
                    <a href="#"><span class="ion-ios-star-outline"></span></a>
                    <a href="#"><span class="ion-ios-star-outline"></span></a>
                    <a href="#"><span class="ion-ios-star-outline"></span></a>
                    <a href="#"><span class="ion-ios-star-outline"></span></a>
                  </p>
                </div>
              </div>
              <h3><a href="#">Camiseta impressão da lua</a></h3>
              <div class="pricing">
                <p class="price"><span>R$35.00</span></p>
              </div>
              <p class="bottom-area d-flex px-3">
                <a href="#" class="add-to-cart text-center py-2 mr-1"><span>Carrinho <i
                      class="ion-ios-add ml-1"></i></span></a>
                <a href="#" class="buy-now text-center py-2">COMPRAR AGORA<span><i class="ion-ios-cart ml-1"></i></span></a>
              </p>
            </div>
          </div>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-3 ftco-animate d-flex">
          <div class="product d-flex flex-column">
            <a href="#" class="img-prod"><img class="img-fluid" src="assets/img/produto-06.png" alt="Colorlib Template">
              <span class="status">50% Off</span>
              <div class="overlay"></div>
            </a>
            <div class="text py-3 pb-4 px-3">
              <div class="d-flex">
                <div class="cat">
                  <span>Kid's Lamp</span>
                </div>
                <div class="rating">
                  <p class="text-right mb-0">
                    <a href="#"><span class="ion-ios-star-outline"></span></a>
                    <a href="#"><span class="ion-ios-star-outline"></span></a>
                    <a href="#"><span class="ion-ios-star-outline"></span></a>
                    <a href="#"><span class="ion-ios-star-outline"></span></a>
                    <a href="#"><span class="ion-ios-star-outline"></span></a>
                  </p>
                </div>
              </div>
              <h3><a href="#">Vestido Impressão de Bolinhas Renda</a></h3>
              <div class="pricing">
                <p class="price"><span class="mr-2 price-dc">R$80.00</span><span class="price-sale">R$40.00</span></p>
              </div>
              <p class="bottom-area d-flex px-3">
                <a href="#" class="add-to-cart text-center py-2 mr-1"><span>Carrinho <i
                      class="ion-ios-add ml-1"></i></span></a>
                <a href="#" class="buy-now text-center py-2">COMPRAR AGORA<span><i class="ion-ios-cart ml-1"></i></span></a>
              </p>
            </div>
          </div>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-3 ftco-animate d-flex">
          <div class="product">
            <a href="#" class="img-prod"><img class="img-fluid" src="assets/img/produto-07.png" alt="Colorlib Template">
              <div class="overlay"></div>
            </a>
            <div class="text py-3 pb-4 px-3">
              <div class="d-flex">
                <div class="cat">
                  <span>SKULL'S GIRL</span>
                </div>
                <div class="rating">
                  <p class="text-right mb-0">
                    <a href="#"><span class="ion-ios-star-outline"></span></a>
                    <a href="#"><span class="ion-ios-star-outline"></span></a>
                    <a href="#"><span class="ion-ios-star-outline"></span></a>
                    <a href="#"><span class="ion-ios-star-outline"></span></a>
                    <a href="#"><span class="ion-ios-star-outline"></span></a>
                  </p>
                </div>
              </div>
              <h3><a href="#">Cropped estampa de caveira</a></h3>
              <div class="pricing">
                <p class="price"><span>R$15.00</span></p>
              </div>
              <p class="bottom-area d-flex px-3">
                <a href="#" class="add-to-cart text-center py-2 mr-1"><span>Carrinho <i
                      class="ion-ios-add ml-1"></i></span></a>
                <a href="#" class="buy-now text-center py-2">COMPRAR AGORA<span><i class="ion-ios-cart ml-1"></i></span></a>
              </p>
            </div>
          </div>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-3 ftco-animate d-flex">
          <div class="product">
            <a href="#" class="img-prod"><img class="img-fluid" src="assets/img/produto-08.png" alt="Colorlib Template">
              <div class="overlay"></div>
            </a>
            <div class="text py-3 pb-4 px-3">
              <div class="d-flex">
                <div class="cat">
                  <span>Exclusiva</span>
                </div>
                <div class="rating">
                  <p class="text-right mb-0">
                    <a href="#"><span class="ion-ios-star-outline"></span></a>
                    <a href="#"><span class="ion-ios-star-outline"></span></a>
                    <a href="#"><span class="ion-ios-star-outline"></span></a>
                    <a href="#"><span class="ion-ios-star-outline"></span></a>
                    <a href="#"><span class="ion-ios-star-outline"></span></a>
                  </p>
                </div>
              </div>
              <h3><a href="#">Gargantilha Triângulo de 6 peças</a></h3>
              <div class="pricing">
                <p class="price"><span>R$7.00</span></p>
              </div>
              <p class="bottom-area d-flex px-3">
                <a href="#" class="add-to-cart text-center py-2 mr-1"><span>Carrinho <i
                      class="ion-ios-add ml-1"></i></span></a>
                <a href="#" class="buy-now text-center py-2">COMPRAR AGORA<span><i class="ion-ios-cart ml-1"></i></span></a>
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <footer class="ftco-footer ftco-section">
    <div class="container">
      <div class="row">
        <div class="mouse">
          <a href="#" class="mouse-icon">
            <div class="mouse-wheel"><span class="ion-ios-arrow-up"></span></div>
          </a>
        </div>
      </div>
      <div class="row mb-5">
        <div class="col-md">
          <div class="ftco-footer-widget mb-4">
            <h2 class="ftco-heading-2">Minishop</h2>
            <p>Faça parte!</p>
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
                <li><span class="icon icon-map-marker"> </span><span class="text">Rua Carlos De Carvalho, 200</span></li>
                <li><a href="#"><span class="icon icon-phone"> </span><span class="text">+2 392 3929 210</span></a></li>
                <li><a href="#"><span class="icon icon-envelope"> </span><span
                      class="text">contato@belchior.com</span></a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12 text-center">

          <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            Copyright &copy;
            <script>document.write(new Date().getFullYear());</script> All rights reserved <i
              class="icon-heart color-danger" aria-hidden="true"></i> by <a href="#" target="_blank">Belchior</a>
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
          </p>
        </div>
      </div>
    </div>
  </footer>



  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
      <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
      <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10"
        stroke="#F96D00" />
    </svg></div>


  <script src="assets/js/jquery.min.js"></script>
  <script src="assets/js/jquery-migrate-3.0.1.min.js"></script>
  <script src="assets/js/popper.min.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>
  <script src="assets/js/jquery.easing.1.3.js"></script>
  <script src="assets/js/jquery.waypoints.min.js"></script>
  <script src="assets/js/jquery.stellar.min.js"></script>
  <script src="assets/js/owl.carousel.min.js"></script>
  <script src="assets/js/jquery.magnific-popup.min.js"></script>
  <script src="assets/js/aos.js"></script>
  <script src="assets/js/jquery.animateNumber.min.js"></script>
  <script src="assets/js/bootstrap-datepicker.js"></script>
  <script src="assets/js/scrollax.min.js"></script>
  <script
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="assets/js/google-map.js"></script>
  <script src="assets/js/main.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>