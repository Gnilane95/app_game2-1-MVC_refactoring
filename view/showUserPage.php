<?php
#$title = "Show_Game";
ob_start();
require("partials/_showUser.php");

$content = ob_get_clean();
require("layout.php");