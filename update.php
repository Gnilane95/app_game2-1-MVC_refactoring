
<?php
session_start();
$title = "modifier";
require_once("models/database.php");
// debug_array($_GET)

$error = [];
$errorMessage = "<span class=text-red-500>*Ce champs est obligatoire</span>";
if (!empty($_POST["submited"])) {
    update($error);
}
$game= getGame();
$title = $game['name'];
require("view/updatePage.php");
?>