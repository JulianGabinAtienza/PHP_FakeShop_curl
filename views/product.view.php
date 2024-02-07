<?php 

// J'inclus la page sur laquelle je fais l'appel API pour récupérer les produits
include "../config/curl_products.php";
include "../partials/header.php";

// Si dans l'URL on a un paramètre product qui vaut un id alors on crée une variable
// product_id contenant le fameux id
if (isset($_GET['product'])) {
    $product_id = $_GET['product'];
} 

?> 

    <h1>Page produit</h1>

   <?php foreach($products as $product) : ?>
    
        <?php if ($product['id'] == $product_id) : ?>

            <img src="<?= $product['image'] ?>">
            <h3><?= $product['title'] ?></h3>
            <p>Prix : <?= $product['price'] ?> $</p>
            <p class="description"><?= substr($product['description'], 1, 50) ?> ...</p>
            <button><a href="cart.view.php?product=<?= $product['id'] ?>">Ajouter au panier</a></button>

        <?php endif ?>

    <?php endforeach ?>

<?php include "../partials/footer.php"; ?>