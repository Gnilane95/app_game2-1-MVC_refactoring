<?php
session_start();
require_once("models/User.php");
$model = new User();
$user= $model->get();
$title = $user['name'];
require("view/showUserPage.php");
?>
