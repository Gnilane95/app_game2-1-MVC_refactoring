<?php
session_start();
$title = "modifier";
require_once("models/database.php");
// debug_array($_GET)

$error = [];
$errorMessage = "<span class=text-red-500>*Ce champs est obligatoire</span>";
if (!empty($_POST["submited"])) {
    require_once ('utils/secure-form/include.php');
    if (count($error) == 0){
        update($name, $price, $note, $description, $genre_clear, $plateforms_clear, $PEGI, $url_img);
    }
}
$game= getGame();
$title = $game['name'];
require("view/updatePage.php");
?>