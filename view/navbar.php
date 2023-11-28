<?php
session_start();

$isLoggedIn = isset($_SESSION['user_logged_in']) && $_SESSION['user_logged_in'];

$profileName = $isLoggedIn ? $_SESSION['user_profile_name'] : 'Login';
$profileLink = $isLoggedIn ? 'view/perfil.php' : 'view/login_page.php';
?>

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
                                <a href="perfil.php" class="dropdown-item"><i class="fa-solid fa-user"></i> Ver perfil</a>
                                <a href="controller/logoutController.php" class="dropdown-item"><i class="fa-solid fa-power-off"></i> Logout</a>
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