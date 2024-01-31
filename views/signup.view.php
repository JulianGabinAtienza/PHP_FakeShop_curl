<?php 

    ob_start();

    include "../partials/header.php";
    include "../config/db_config.php";
    include "../utils/functions.php";

    if (($_SERVER['REQUEST_METHOD'] === 'POST')) {

        $name = htmlspecialchars($_POST['name']);
        $email = $_POST['email'];
        $password = $_POST['password'];
        $confirm = $_POST['confirm'];

        if (!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['confirm'])) {

            if (filter_var($email, FILTER_VALIDATE_EMAIL)) {

                $error = "L'email n'est pas au bon format";

            }

            if ($password != $confirm) {

                $error = "Les mots de passe ne correspondent pas";

            }

            if (!preg_match('/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$ %^&*-]).{12,}$/', $password)) {

                $error = "Le mot de passe doit contenir au moins 12 caractères, une majuscule, une minuscule et un chiffre ( ex : #?!@$ %^&*- )";

            }

            $hash = password_hash($password, PASSWORD_DEFAULT);

            if (checkExists('name', $name, $pdo)) {
                $error = "Ce nom d'utilisateur existe déjà";
            } else if (checkExists('email', $email, $pdo)) {
                $error = "Cet email existe déjà";
            } else {
                $sql = "INSERT INTO users (name, email, password) VALUES (?, ?, ?)";
                $stmt = $pdo->prepare($sql);
                $result = $stmt->execute([$name, $email, $hash]);

                if ($result) {
                    header("Location: signup-success.view.php");
                    ob_end_flush();

                } else {

                    $error = "Une erreur est survenue" . $stmt->errorInfo();

                }
            }

        } else {

            $error = "Veuillez remplir tous les champs";

        }

    } else if (isset($_POST['password']) && isset($_POST['confirm']) && $_POST['password'] != $_POST['confirm']) {
        $error = "Les mots de passe ne correspondent pas";

    }

?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <body>
        <h1>Signup</h1>
        <form method="post">
            <input type="text" name="name" placeholder="Votre pseudo ici ..." id="">
            <input type="email" name="email" placeholder="Votre email ici ..." id="">
            <input type="password" name="password" placeholder="Votre mot de passe ici ..." id="">
            <input type="password" name="confirm" placeholder="Votre mot de passe ici ..." id="">
            <input type="submit" value="Sign up">
        </form>
        <a href="login.view.php">LogIn</a>
    </body>
</html>
