<?php include "partials/header.php"; ?>

<style>

    body{
        overflow: hidden;

    }

    .wrapper {
        padding:0;
    }

</style>

<div class="container" style="margin-top:130px">
    <h1>Bienvenue sur mon app en PHP !</h1>
    <img class="home-img" src="./assets/images/croco-2.webp">

    <?php if (isset($_SESSION['user']) && $_SESSION['user']['logged']) :  ?> 

        <a href="products"><button class="button2">Let's go !</button></a>

    <?php endif ?>
</div>

<?php include "partials/footer.php"; ?>