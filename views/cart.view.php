<?php 

session_start();

// J'inclus la page sur laquelle je fais l'appel API pour récupérer les produits
include "../config/curl_products.php";
include "../partials/header.php";

// Si dans l'URL on a un paramètre product qui vaut un id alors on crée une variable
// product_id contenant le fameux id
$product_id = isset($_GET['product']) ? $_GET['product'] : null;

?>

<h1>Cart</h1>

<!-- On vient récupérer l'id du produit que l'on veut ajouter au panier
On l'ajoute ensuite à la session au niveau de la clé cart  -->
<?php foreach($products as $product) : ?>
 
     <?php if ($product['id'] == $product_id) : ?>

        <?php $_SESSION['user']['cart'][$product_id]  = $product ?>
        <h2>Vous avez ajouté <?= $_SESSION['user']['cart'][$product_id]['title']  ?> au panier</h2>

     <?php endif ?>

 <?php endforeach ?>

 <!-- Si jamais on a bien des éléments dans notre cart alors on les affiche -->
 <?php if (!empty($_SESSION['user']['cart'])) : ?> 

    <?php foreach ($_SESSION['user']['cart'] as $item) : ?>

        <?php if (isset($item['title'])) : ?>

            <h3><?= $item['title'] ?></h3>
            <p>Prix : <?= $item['price'] ?> $</p>
            <p class="description"><?= isset($item['description']) ? substr($item['description'], 1, 50) . ' ...' : '' ?></p>
            <a class="deleteBtn" href="">Supprimer du Panier</a> <br>

            
        <?php endif ?>

    <?php endforeach ?>

 <?php endif  ?>

 <!-- Lien vers la page de checkout / paiement -->
 <a href="checkout.view.php">Allez au checkout</a>


<?php include "../partials/footer.php"; ?>