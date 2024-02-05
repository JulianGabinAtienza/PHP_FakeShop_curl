<?php 

include "../partials/header.php"; 

// On requiert notre fichier php_mailer.php qui contient les constantes pour la configuration du serveur SMTP
// ainsi que autoload.php qui permet de charger les classes PHPMailer
require_once '../config/php_mailer.php';
require_once '../vendor/autoload.php';

?>

<h1>Page de contact</h1>

    <!-- Notre formulaire de contact avec méthode POST -->
    <form class="contact-form" method="POST">
        <label for="email">Email :</label>
        <input name="email" type="email">

        <label for="subject">Subject : </label>
        <input name="subject" type="text">

        <label for="body">Message :</label>
        <textarea name="body" cols="30" rows="10"></textarea>

        <input id="contact-sub" name="submit" type="submit">
    </form>

    <!-- Si $error existe, on l'affiche dans un <p> -->
    <?php if (isset($error)) : ?>
        <p class="error"><?= $error ?></p>
    <?php endif ?>

<?php

require_once '../controllers/contact.php';
include "../partials/footer.php";

?>