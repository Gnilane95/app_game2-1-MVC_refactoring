<?php
session_start();

/**
 * This file show form for create a new game
 */
$title = "Add Game";
include("models/database.php");

$error = [];
$errorMessage = "<span class=text-red-500>*Ce champs est obligatoire</span>";


if (!empty($_POST["submited"])) {
    require_once("utils/secure-form/include.php");
    if (count($error) == 0){
        create($name, $price, $note, $description, $genre_clear, $plateforms_clear, $PEGI, $url_img);
    }
}
require("view/createPage.php");
?>
