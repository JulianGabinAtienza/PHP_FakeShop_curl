<?php

session_start();

// Adresse de base qu'on transforme en tableau et on sépare avec les /
// $array = explode('/', $url);

// On vient chercher le dernier item du tableau qui doit etre le nom de la page
// $uri = $array[count($array)-1];

// On fait notre opérateur ternaire et on adapte la valeur de $path
// $uri === 'index.php' ? $path = 'views/' : $path = '';

// $_SERVER['REQUEST_URI'] === '/index.php' ? $path = '' : $path = '..';

// if ($_SERVER['REQUEST_URI'] === '/index.php') {
//     $path = '';
//     $path_css = 'views/';
// } else {
//     $path = '..';
//     $path_css = '';
// }

?> 

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Mon eshop en PHP</title>
        <link rel="stylesheet" href="/views/style/style.css">
        <link rel="stylesheet" href="/views/style/button.css">
        <script src="/views/scripts/app.js" defer></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    </head>
    <body>
        <nav>
            <img class="burger-btn" src="/assets/icons/burger.png">
            <ul class="menu">
                <li><a href="/">Home</a></li>
                <li><a href="contact">Contact</a></li>

                <?php if (isset($_SESSION['user']) && $_SESSION['user']['logged']) :  ?> 

                    <li><a href="products">Products</a></li>
                    <li><a href="profile">Profile</a></li>
                    <li><a href="logout">Logout</a></li>
                
                <?php else : ?>
                    <li><a href="signup">Signup</a></li>
                    <li><a href="login">Login</a></li>
                <?php endif ?>
            </ul>
            <?php if (isset($_SESSION['user']) && $_SESSION['user']['logged']) :  ?> 
                <li><a href="cart"><img class="cart-btn" src="/assets/icons/shopping-cart.png"></a>
            <?php endif ?>
        </nav>
    <div class="wrapper">

