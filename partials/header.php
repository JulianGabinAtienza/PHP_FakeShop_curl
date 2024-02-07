<?php

session_start();

// Adresse de base qu'on transforme en tableau et on sépare avec les /
// $array = explode('/', $url);

// On vient chercher le dernier item du tableau qui doit etre le nom de la page
// $uri = $array[count($array)-1];

// On fait notre opérateur ternaire et on adapte la valeur de $path
// $uri === 'index.php' ? $path = 'views/' : $path = '';

$_SERVER['REQUEST_URI'] === '/index.php' ? $path = '' : $path = '..';

if ($_SERVER['REQUEST_URI'] === '/index.php') {
    $path = '';
    $path_css = 'views/';
} else {
    $path = '..';
    $path_css = '';
}

?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon eshop en PHP</title>
    <link rel="stylesheet" href="<?= $path ?>/views/style/style.css">
    <script src="<?= $path ?>/views/scripts/app.js" defer></script>
</head>
<body>
    <nav>
        <img class="burger-btn" src="<?= $path ?>/assets/icons/burger.png">
        <ul class="menu">
            <li><a href="/index.php">Home</a></li>
            <li><a href="<?= $path ?>/views/contact.view.php">Contact</a></li>

            <?php if (isset($_SESSION['user']) && $_SESSION['user']['logged']) :  ?> 

                <li><a href="<?= $path ?>/views/products.view.php">Products</a></li>
                <li><a href="<?= $path ?>/views/cart.view.php">Cart</a></li>
                <li><a href="<?= $path ?>/views/profile.view.php">Profile</a></li>
                <li><a href="<?= $path ?>/views/logout.php">Logout</a></li>
            
            <?php else : ?>
                <li><a href="<?= $path ?>/views/signup.view.php">Signup</a></li>
                <li><a href="<?= $path ?>/views/login.view.php">Login</a></li>
            <?php endif ?>
        </ul>
    </nav>
<div class="wrapper">

