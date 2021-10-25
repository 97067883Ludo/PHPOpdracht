<?php
session_start();
$artikelen = $_SESSION['artikelen'];
$toevoegen = $_POST['artikelNummer'];
$artikelen[$toevoegen]["aantal"] -= 1;
$_SESSION["artikelen"] = $artikelen;
header('Location: winkelwagen.php');
?>