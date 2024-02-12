<?php 

session_start();

?>
<link rel="stylesheet" href="./views/style/style.css">
<script src="./views/scripts/app.js" defer></script>
    <nav>
        <img class="burger-btn" src="./assets/icons/burger.png">
        <ul class="menu">
            <li><a href="#">Home</a></li>
            <li><a href="./views/contact.view.php">Contact</a></li>

            <?php if (isset($_SESSION['user']) && $_SESSION['user']['logged']) :  ?> 

                <li><a href="views/products.view.php">Products</a></li>
                <li><a href="views/profile.view.php">Profile</a></li>
                <li><a href="views/logout.php">Logout</a></li>
            
            <?php else : ?>
                <li><a href="/views/signup.view.php">Signup</a></li>
                <li><a href="views/login.view.php">Login</a></li>
            <?php endif ?>
        </ul>
        <?php if (isset($_SESSION['user']) && $_SESSION['user']['logged']) :  ?> 
            <li><a href="/views/cart.view.php"><img class="cart-btn" src="./assets/icons/shopping-cart.png"></a>
        <?php endif ?>
    </nav>
    <div class="container" style="margin-top:130px">
        <h1>Bienvenue sur mon app en PHP !</h1>
        <img class="home-img" class="home-cocktail" src="./assets/images/cocktail.png" alt="Cocktail PHP">
    </div>

<?php include "partials/footer.php"; ?>