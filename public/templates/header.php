<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start([
        'cookie_lifetime' => 86400, // 1 day
        'cookie_secure' => false, // Secure cookie, set to false if not using HTTPS
        'cookie_httponly' => true // Makes it inaccessible to JavaScript
    ]);
}

if (isset($_SESSION['dashboard_error'])) {
    echo "<div class='alert alert-danger text-center'>" . $_SESSION['dashboard_error'] . "</div>";
    unset($_SESSION['dashboard_error']);  // Clear the message after displaying it
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mobile Store</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.typekit.net/owm8tzw.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<!-- Top Dark Bar -->
<div class="container-fluid bg-dark text-light py-2">
    <div class="row">
        <div class="col-12">
            <div class="d-flex flex-column flex-md-row justify-content-between align-items-center">
                <div class="email-shipping d-flex flex-column flex-md-row align-items-center text-center text-md-start">
                    <span class="email-text"><span class="email-label">Email:</span> support@phoneshop.com</span>
                    <div class="separator"></div>
                    <span class="shipping-text">Free Shipping for all Order of €99</span>
                </div>
                <div class="my-account-container">
                    <!-- My Account dropdown -->
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                            My Account
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <?php if (isset($_SESSION['logged_in']) && $_SESSION['logged_in']): ?>
                                <li><a class="dropdown-item" href="profile.php">My Profile</a></li>
                                <li><a class="dropdown-item" href="cart.php">My Cart</a></li>
                                <li><a class="dropdown-item" href="../wishlist.php">My Wishlist</a></li>
                                <?php if (isset($_SESSION['user_type']) && $_SESSION['user_type'] === 'Administrator'): ?>
                                    <li><a class="dropdown-item" href="admin_dashboard.php">Dashboard</a></li> <!-- Link visible only to Administrators -->
                                <?php endif; ?>
                                <li><a class="dropdown-item" href="logout.php">Logout</a></li> <!-- Logout link -->
                            <?php else: ?>
                                <li><a class="dropdown-item" href="login.php">Login</a></li>
                                <li><a class="dropdown-item" href="register.php">Register</a></li>
                            <?php endif; ?>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<header class="bg-light py-3 custom-header-bg">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-2 col-md-3 col-6">
                <!-- Logo -->
                <a href="index.php">
                    <img src="images/phone-shop-logo.jpg" alt="Logo" class="img-fluid logo">
                </a>
            </div>
            <div class="col-lg-7 col-md-6 col-12">
                <!-- Search bar -->
                <form action="search_results.php" method="get">
                    <div class="input-group search-bar">
                        <input type="text" name="query" class="form-control" placeholder="Search entire store here" required>
                        <button class="btn btn-outline-secondary" type="submit">Search</button>
                    </div>
                </form>
            </div>
            <div class="col-lg-3 col-md-3 col-6 text-end icons">
                <!-- Wishlist -->
                <a href="wishlist.php" class="icon-link wishlist-link me-3">
                    <i class="fas fa-heart"></i>
                    <?php if (isset($_SESSION['wishlist']) && count($_SESSION['wishlist']) > 0): ?>
                        <span class="badge-number"><?= count($_SESSION['wishlist']) ?></span>
                    <?php endif; ?> Wishlist
                </a>
                <!-- Cart -->
                <a href="cart.php" class="icon-link cart-link">
                    <i class="fas fa-shopping-cart"></i>
                    <?php if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0): ?>
                        <span class="badge-number"><?= count($_SESSION['cart']) ?></span>
                    <?php endif; ?> My Cart
                </a>
            </div>

        </div>
    </div>
</header>

<!-- Sticky Yellow Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-warning sticky-top custom-navbar">
    <div class="container">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">HOME</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="products.php?category[]=1">SMARTPHONES</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="products.php?category[]=2">TABLETS</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="services.php">SERVICES</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contact-us.php">CONTACT US</a>
                </li>
            </ul>
            <span class="navbar-text ms-auto">
                <i class="fas fa-phone-alt"></i>Hotline: 1-001-234-5678
            </span>
        </div>
    </div>
</nav>