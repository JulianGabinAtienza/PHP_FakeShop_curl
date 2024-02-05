<?php 

ob_start();

include "../partials/header.php"; 

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

ob_end_flush();

?>

<style>
    .container {
    display: flex;
    width: 50%;
    justify-content: space-between;
    align-items: center;
    background-color: #f2f2f2;
    padding: 20px;
    border-radius: 5px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

.container .left {
    flex: 1;
    text-align: center;
}

.container .left .avatar {
    width: 150px;
    height: 150px;
    border-radius: 50%;
    object-fit: cover;
}

.container .right {
    flex: 2;
    
}

.container h3 {
    font-size: 18px;
    margin-bottom: 10px;
}

.container hr.solid {
    border-top: 1px solid #999;
}

.container p {
    margin: 5px 0;
}
</style>

<h1>Profil de <?= $_SESSION['user']['name'] ?></h1>

<div class="container">
    <div class="left" style="width:100vw;">
        <img class="avatar" src="../assets/avatar/avatar.jpg" alt="">
        <p>Nom : <?= $_SESSION['user']['name'] ?></p>
    </div>
    <div class="right" style="width:100vw;">
        <h3>Informations personnelles</h3>
        <hr class="solid">
        <p>Email : <?= $_SESSION['user']['email'] ?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Téléphone : 06 06 06 06 06</p>
    </div>
</div>

<?php 

include "../partials/footer.php"; 

?>