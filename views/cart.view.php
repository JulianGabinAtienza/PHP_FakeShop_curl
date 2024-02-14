<?php 

// J'inclus la page sur laquelle je fais l'appel API pour récupérer les produits
include "config/curl_products.php";
include "partials/header.php";
include 'utils/functions.php';

// Si dans l'URL on a un paramètre product qui vaut un id alors on crée une variable
// product_id contenant le fameux id

if (isset($_GET['product'])) { $product_id = $_GET['product']; }

?> 

<h1>Cart</h1>

<?php

    $totalCost = 0;
    $totalArticles = 0;

    foreach ($_SESSION['user']['cart'] as $item) {
        $totalCost += ($item['price'] * $item['quantity']);
        $totalArticles += $item['quantity'];
    }

?>

<?php if ($totalArticles > 0) : ?>
    <h4 class="center">Il y a <?= $totalArticles ?> article<?= ($totalArticles > 1) ? "s" : "" ?> dans votre Cart et le prix total est de <?= $totalCost ?> $</h4>
    <a class="center" href="checkout"><button class="button2">Allez au checkout</button></a>
<?php endif; ?>

<!-- Lien vers la page de checkout / paiement -->


<!-- On vient récupérer l'id du produit que l'on veut ajouter au panier
On l'ajoute ensuite à la session au niveau de la clé cart  -->

<?php foreach($products as $product) : ?>

    <!-- Ici on vérifie qu'il y ait bien un id dans l'URL, qu ecette id correspondeà l'id d'un produit
    Et en dernier on check si ce produit a déjà été ajouté au panier -->

     <?php if ((isset($product_id) && ($product['id'] == $product_id) && (!isset($_SESSION['user']['cart'][$product_id])))) {

        // Si c'est la première fois on l'ajoute à notre panier dans les sessions
        // Et on crée la clé quantity avec pour valeur 1

        $_SESSION['user']['cart'][$product_id]  = $product; 
        $_SESSION['user']['cart'][$product_id]['quantity']  = 1; 

        // sinon on incrément quantity de 1

        header('Location: cart');

     } elseif ((isset($product_id) && ($product['id'] == $product_id)) && (isset($_SESSION['user']['cart'][$product_id]))) {

        $_SESSION['user']['cart'][$product_id]['quantity']  += 1; 
        header('Location: cart');

     } ?>

 <?php endforeach ?>

 <!-- Si jamais on a bien des éléments dans notre cart alors on les affiche -->

 <?php if (!empty($_SESSION['user']['cart'])) : ?> 

    <?php foreach ($_SESSION['user']['cart'] as $item) : ?>

    <div class="item">
        <h3><?= $item['title'] ?></h3>
        <p>Prix unitaire : <?= $item['price'] ?> $</p>
        <p>Prix Total d'article : <?php $item['total'] = ($item['price'] * $item['quantity']) ?> </p>
        <p class="description"><?= substr($item['description'], 1, 50) ?> ...</p>
        <p>Quantité : <?= $item['quantity'] ?></p>

        <!-- Ici on veut avec unset supprimer l'élément du panier via son id -->
        <a class="delete-btn" href="delete?delete=<?= $item['id'] ?>">Supprimer du panier</a>
    </div>

    <?php endforeach ?>

<?php else : ?>

    <h2>Votre panier est vide ...</h2>

<?php endif  ?>

<?php include "partials/footer.php"; ?>