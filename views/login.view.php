<?php 

include "../partials/header.php"; 
include "../config/db_config.php";
include "../utils/functions.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $email = $_POST['email'];
    $password = $_POST['password'];

    if (!empty($_POST['email']) && !empty($_POST['password'])) {

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

            echo "L'email n'est pas au bon format.";
            exit;
    
        }

        $sql = "SELECT * FROM users WHERE email = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$email]);
        $user = $stmt->fetch();

        if (!$user) {
            echo "Cet email n'existe pas";
            exit;
        }

        if (password_verify($password, $user['password'])) {

            header("Location: index.view.php");
            exit;

        } else {

            echo "Ce mot de passe n'existe pas";
            exit;

        }

    }

}

?>

<h1>Login</h1>
<form method="post">
    <input type="email" name="email" placeholder="Votre email ici ..." id="">
    <input type="password" name="password" placeholder="Votre mot de passe ici ..." id="">
    <input type="submit" value="Login">
</form>
<a href="signup.view.php">SignUp</a>

<?php include "../partials/footer.php"; ?>