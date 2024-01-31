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

    ob_start();

    include "../config/db_config.php";

    if (($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['password'] === $_POST['confirm'])) {

        if (!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['confirm'])) {
            
            $name = htmlspecialchars($_POST['name']);
            $email = $_POST['email'];
            $password = $_POST['password'];
            $confirm = $_POST['confirm'];

            if (filter_var($email, FILTER_VALIDATE_EMAIL)) {

                $error = "L'email n'est pas au bon format";
                die();

            } 

            $hash = password_hash($password, PASSWORD_DEFAULT);

            $sql = "INSERT INTO users (name, email, password) VALUES (?, ?, ?)";

            $stmt = $pdo->prepare($sql);
            $result = $stmt->execute([$name, $email, $hash]);

            if ($result) {
                header("Location: signup-success.view.php");
                ob_end_flush();

            } else {

                $error = "Une erreur est survenue" . $stmt->errorInfo();

            }

        } else {

            $error = "Veuillez remplir tous les champs";

        }

    }

        
?>

<?php include "../partials/footer.php"; ?>