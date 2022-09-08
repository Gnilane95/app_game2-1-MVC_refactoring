<?php
/**
 * This file show the home page
*/

/**
 * get all games from models and stock it in array $games
 */
session_start();
require_once("models/Game.php");
$model = new Game();
$games = $model->getAll("name");
/**
 * Show view
 */
require("view/homePage.php");
?>