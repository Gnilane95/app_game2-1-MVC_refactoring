<?php
$title = "Accueil";
ob_start();
require("partials/_users.php");

$content = ob_get_clean();
require("layout.php");

