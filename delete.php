<?php
session_start();
include("models/Game.php");
$model = new Game ;
$model->delete();


