<?php
/**
 * This file show the user page
*/

/**
 * get all users from models and stock it in array $users
 */
session_start();
require_once("models/User.php");
$model = new User();
$users = $model->getAll("name");
/**
 * Show view
 */
require("view/usersPage.php");
?>