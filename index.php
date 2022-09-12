<?php
session_start();
/**
 * This file show the home page
*/

/**
 * get all games from models and stock it in array $games
 */
require_once("controllers/Game.php");
$controller = new \Controllers\Game();
$controller->index()

?>