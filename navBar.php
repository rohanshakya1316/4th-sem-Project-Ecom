<?php
session_start();
if (isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] == true) {
     $loggedIn = true;
     if (isset($_SESSION['user_name'])) {
        $username = $_SESSION['user_name'];
     }
} else {
    $loggedIn = false;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link
        href="https://fonts.googleapis.com/css2?family=Jost:wght@300;400;500;700&family=Poppins:wght@200;300;400;600&family=Quicksand:wght@300;400;500;600;700&family=Urbanist:wght@300;400;600;700;800;900&display=swap"
        rel="stylesheet" />
    <link rel="stylesheet" href="style.css">
    <title>NavBar</title>
</head>

<body>
    <!-- NavBar Starts -->
    <header class="section-navbar">
        <section class="top_txt">
            <div class="head container">
                <div class="head_txt">
                    <p>Free shipping, 7-day return or refund guarantee.</p>
                    <?php
                    if ($loggedIn) {
                        echo '<p>Welcome to our Site, ' . $username.'</p>';
                    }
                    ?>
                </div>
                <div id="login-container" class="sign_in_up">
                    <?php
                    if (!$loggedIn) {
                        echo '<a href="./Login/login.php">LOG IN</a>
                        <a href="./Login/login.php">SIGN UP</a>';
                    }
                    if ($loggedIn) {
                        echo '<a href="./Login/logout.php" id="btn-out">LOG OUT</a>';
                    }
                    ?>
                </div>
            </div>
        </section>
        <div class="container">
            <div class="navbar-brand">
                <a href="index.php">
                    <img src="./images/FINAL_LOGO.png" alt="ShopVerse Logo" class="logo" height="auto">
                </a>
            </div>

            <nav class="navbar">
                <ul>
                    <li class="nav-item">
                        <a href="index.php" class="nav-link">Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="#productInfo" class="nav-link">Products</a>
                    </li>
                    <li class="nav-item">
                        <a href="#aboutInfo" class="nav-link">About</a>
                    </li>
                    <li class="nav-item">
                        <a href="contact.php" class="nav-link">Contact</a>
                    </li>
                    <?php
                    if($loggedIn){
                        echo '<li class="nav-item">
                                <a href="cartProducts.php" class="nav-link add-to-cart-button" id="cartValue">
                                <i class="fa-solid fa-cart-shopping"> &nbsp;0 </i>
                                </a>
                                </li>';
                            } else {
                        echo '<li class="nav-item">
                                <i class="fa-solid fa-cart-shopping"></i>
                                <a href="./Login/login.php" class="nav-link">LOGIN</a>
                              </li>';
                    }
                    ?>
                </ul>
            </nav>
        </div>
    </header>
    <!-- NavBar Ends -->
    <script type="module" src="./main.js"></script>
    <script>
    document.getElementById('btn-out').addEventListener('click', function(event) {
        const confirmLogout = confirm('Are you sure you want to logout?');
        if (!confirmLogout) {
            event.preventDefault(); // Prevents the logout if the user cancels
        }
    });
    </script>
</body>

</html>