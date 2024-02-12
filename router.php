<?php

$uri = parse_url($_SERVER['REQUEST_URI']) ['path'];


// echo $_SERVER['REQUEST_URI'];
// echo "<br>";
// dd(parse_url($_SERVER['REQUEST_URI']));

// On associe dans ce tableau des uri à  des pages de notre app
$routes = [
    '/' => 'views/index.view.php',
    '/login' => 'views/login.view.php',
    '/signup' => 'views/signup.view.php',
    '/products' => 'views/products.view.php',
    '/product' => 'views/product.view.php',
    '/profile' => 'views/profile.view.php',
    '/signup-sucess' => 'views/signup-sucess.view.php',
    '/logout' => 'views/logout.php',
    '/contact' => 'views/contact.view.php',
    '/delete' => 'views/delete-product.php',
    '/cart' => 'views/cart.view.php',
];

// On vient vérifier dans le tableau $routes si une des clé coorspond à l'URL
array_key_exists($uri, $routes) ? require $routes[$uri] : require 'views/404.view.php';