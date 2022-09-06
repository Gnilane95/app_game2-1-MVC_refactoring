<?php
session_start();

/**
 * This file show form for create a new game
 */
$title = "Add Game";
include("models/database.php");

$error = [];
$errorMessage = "<span class=text-red-500>*Ce champs est obligatoire</span>";


if (!empty($_POST["submited"]) && isset($_FILES["url_img"]) && $_FILES["url_img"]["error"] == 0) {
    create($error);
    debug_array($error);
}
require("view/createPage.php");
?>
