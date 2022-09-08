<?php
session_start();
require_once("models/Game.php");
$model = new Game();
$game= $model->get();
$title = $game['name'];
require("view/showPage.php");
?>
