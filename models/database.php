<?php
require("utils/helpers/functions.php");

/**
 * Get connexion with database
 * 
 * @return PDO 
 */
function getPDO(): PDO
{
    $serveur = "localhost";
    $dbname = "app_game";
    $login = "root";
    $password = "";
    
    try {
        $pdo = new PDO("mysql:host=$serveur;dbname=$dbname", $login, $password, array(
            PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING
        ));
        return $pdo ;
    } catch (PDOException $e) {
        echo "Erreur de connexion : " . $e->getMessage();
    }
}
