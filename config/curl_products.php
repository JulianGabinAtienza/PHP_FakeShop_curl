<?php

$url = 'https://fakestoreapi.com/products';

$ch = curl_init($url);

curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$resp = curl_exec($ch);

if ($e = curl_error($ch)) {
    var_dump($e);
} else {
    $products = json_decode($resp, true);
}

curl_close($ch);