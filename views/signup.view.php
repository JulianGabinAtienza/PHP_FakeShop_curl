<?php include "../partials/header.php"; ?>

<h1>Signup</h1>

<form method="post">
    <input type="text" name="name" placeholder="Votre pseudo ici ..." id="">
    <input type="email" name="email" placeholder="Votre email ici ..." id="">
    <input type="password" name="password" placeholder="Votre mot de passe ici ..." id="">
    <input type="password" name="confirm" placeholder="Votre mot de passe ici ..." id="">
    <input type="submit" value="Sign up">
</form>

<?php

    require_once '../views/signup.view.php';

    if (($_SERVER['REQUEST_METHOD'] === 'POST' && $password === $confirm)) {

        if (!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['confirm'])) {
            
            $name = htmlspecialchars($_POST['name']);
            $email = $_POST['email'];
            $password = $_POST['password'];
            $confirm = $_POST['confirm'];

            if (filter_var($email, FILTER_VALIDATE_EMAIL)) {

                $error = "L'email n'est pas au bon format";
                die();

            } 

            

        } else {

            $error = "Veuillez remplir tous les champs";

        }

    }

        
?>

<?php include "../partials/footer.php"; ?>