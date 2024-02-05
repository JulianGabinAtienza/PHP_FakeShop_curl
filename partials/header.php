<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
    <link rel="stylesheet" href="../views/style/style.css">
</head>
<body>

    <nav>
        <ul>
            <li><a href="index.view.php">Home</a></li>
            <li><a href="contact.view.php">Contact</a></li>

            <?php if ($_SESSION['user']['logged']) :  ?> 

                <li><a href="products.view.php">Products</a></li>
                <li><a href="cart.view.php">Cart</a></li>
                <li><a href="profile.view.php">Profile</a></li>
                
                <li><a href="logout.view.php">Logout</a></li>
            
            <?php else : ?>

                <li><a href="signup.view.php">Signup</a></li>
                <li><a href="login.view.php">Login</a></li>
            
            <?php endif ?>

        </ul>
    </nav>