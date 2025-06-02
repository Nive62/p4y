<?php

$host = "localhost";
$db = "evinp4y";
$user = "root";
$pw = "";
// Connection à la base de données avec test si il y a une erreur
// Ce Try permet de supprimer un article de la bdd via son id et la commande delete puis on reload la page sinon c'est un echec
try
{
    $objetPdo = new PDO('mysql:host=localhost; dbname=evinp4y','root','');
    
    $pdoStat = $objetPdo->prepare('DELETE FROM article WHERE id_article=:id');

    $pdoStat->bindValue(':id', $_GET['numArticle'], PDO::PARAM_INT);

    $executeIsOk = $pdoStat->execute();

    if($executeIsOk){
        header('Location:suppArticle.php');
    }
    else{
        $message = 'Echec';
    }
} 
catch (Exception $e)
{
     die('Erreur : ' . $e->getMessage());
}
?>

<!DOCTYPE html>
<html>
    <body>
        <p><?= $message ?></p>
    </body>
</html>