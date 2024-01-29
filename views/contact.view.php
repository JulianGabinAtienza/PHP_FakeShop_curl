<?php include "../partials/header.php"; ?>

<h1>Page de contact</h1>

<form action="#" class="contact-form" method="POST">
    <label for="email">Email :</label>
    <input name="email" type="email">

    <label for="subject">Subject : </label>
    <input name="subject" type="text">

    <label for="body">Message :</label>
    <textarea name="body" cols="30" rows="10"></textarea>

    <input id="contact-sub" name="submit" type="submit">
</form>

<?php include "../partials/footer.php"; ?>