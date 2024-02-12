<?php 

ob_start();

include "./partials/header.php";

ob_end_flush();

?>
<!-- 
Il faudrait afficher le nom, l'avatar, la date de création du compte, l'email -->

<h1>Profil</h1>

<!-- Ici afficher un avatar par défaut -->

<div class="profile-card">
    <div class="left">
        <img class="avatar" src="../<?= $_SESSION['user']['avatar'] ?>">
        <h2><?= $_SESSION['user']['name'] ?></h2>
    </div>
    <div class="right">
        
        <h2>Informations</h2>
        <hr>
        <section class="infos">
            <div class="email">
                <h3>Email</h3>
                <p><?= $_SESSION['user']['email'] ?></p>
            </div>
            <div class="phone">
                <h3>Phone</h3>
                <p>0789675323</p>
            </div>
        </section>


        <h2>Projects</h2>
        <hr>
        <section class="projects">
            <div class="recent">
                <h3>Recent</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
            </div>
            <div class="viewed">
                <h3>Most viewed</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. </p>
            </div>
        </section>
    </div>
</div>


<?php 

include "./partials/footer.php"; 

?>