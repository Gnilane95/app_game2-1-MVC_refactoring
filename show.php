<?php
session_start();
// include PDO pour la connexion BDD
require_once("models/database.php");
// debug_array($_GET)
$game= getGame();
$title = $game['name'];
require("view/showPage.php");
?>
