<?php
#$title = "Add_Game";
ob_start();
require("partials/_update.php");

$content = ob_get_clean();
require("layout.php");