<?php 

// Supprimer la session en cours ain de déconnecter le user
session_start();

session_destroy();
header('Location: ../index.php');

?>