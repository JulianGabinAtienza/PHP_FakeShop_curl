<?php 

ob_start();

include "../partials/header.php";
include "../config/db_config.php";

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "Le format de l'email n'est pas bon";
        die();
    }

    // Pour vérifier si un mail correspond en BDD
    $sql = "SELECT * FROM users WHERE email = ?";
    $stmt = $pdo->prepare($sql);

    $stmt->execute([$email]);
    $result = $stmt->fetch();

    if (!$result) {
        $error = "L'email n''existe pas, veuillez vous enregistrer via notre Signup";
    } else {
        $hash = $result['password'];

        if (password_verify($password, $hash)) {
            // On peut démarrer une session
            session_start();
            $_SESSION['user'] = $result;
            $_SESSION['user']['logged'] = true;
            
            // On redirige vers une page home ou profile
            header('Location: profile.view.php');
            ob_end_flush();
        } else {
            $error = "Le mot de passe n'est pas le bon";
        }
    }
}
?>

<h1>LOGIN</h1>

<form class="login-form" method="POST">
    <input type="email" name="email" placeholder="Votre email ici ...">
    <input type="password" name="password" placeholder="Votre mot de passe ici ...">
    <input type="submit" name="submit" value="Login">
</form>

<?php if (isset($error)) : ?> 
    <p class="error"><?= $error ?></p>
<?php endif ?>

<?php 

include "../partials/footer.php";

?>