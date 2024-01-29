<?php 

// J'inclus la page sur laquelle je fais l'appel API pour récupérer les produits
include "../config/curl_products.php";
include "../partials/header.php";

?> 

    <h1>Ma page de produits</h1>

    <div class="product-list">

        <?php foreach($products as $product) : ?>
            <div class="product">
                <a href="product.view.php?product=<?= $product['id'] ?>"><img src="<?= $product['image'] ?>"></a>
                <h3><?= $product['title'] ?></h3>
                <p>Prix : <?= $product['price'] ?> $</p>
                <p class="description"><?= substr($product['description'], 1, 50) ?> ...</p>
                <button><a>Ajouter au panier</a></button>
            </div>
        <?php endforeach ?>

    </div>

<?php include "../partials/footer.php"; ?>