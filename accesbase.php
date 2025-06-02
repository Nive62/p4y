<?php
$host = "localhost";
$db = "evinp4y";
$user = "root";
$pw = "";
// Connection à la base de données avec test si il y a une erreur
try
{
    $zxy = new PDO("mysql:host = $host ; port=3306 ,dbname = $db;charset=utf8",$user,$pw);
    // Pour afficher les erreurs
    $zxy->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} 
catch (Exception $e)
{
     die('Erreur : ' . $e->getMessage());
}
?>