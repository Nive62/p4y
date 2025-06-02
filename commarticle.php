<?php
/*Fonction de verification admin*/
if(!isset($_SESSION['login'])){
    header('location:connexion.php');
    exit();
}


//Fonction d'affichage d'information des articles
function afficher()
{
    if(require("accesbase.php"))
    {
        $abc = $zxy->prepare("SELECT * FROM evinp4y.article ORDER BY id_article DESC");

        $abc->execute();

        $data = $abc->fetchAll(PDO::FETCH_OBJ);

        return $data;

        $abc->closeCursor();
    }
}

//Fonction qui permet de supprimer un article via l'id de celui ci
function supprimer($id)
{
    if(require("accesbase.php"))
    {
        $abc = $zxy->prepare("DELETE FROM evinp4y.article WHERE id_article=?");

        $abc->execute(array($id));

        $abc->closeCursor();
    }
}

// Fonction d'affichage d'information des utilisateurs
function utilisateur()
{
    if(require("accesbase.php"))
    {
        $abc = $zxy->prepare("SELECT * FROM evinp4y.utilisateur ORDER BY id_user DESC");

        $abc->execute();

        $data = $abc->fetchAll(PDO::FETCH_OBJ);

        return $data;

        $abc->closeCursor();
    }
}

// Fonction d'affichage d'information des utilisateurs
function achat()
{
    if(require("accesbase.php"))
    {
        $abc = $zxy->prepare('SELECT * FROM evinp4y.achat WHERE acheteur = '.htmlentities($_SESSION['id_user']).'');

        $abc->execute();

        $data = $abc->fetchAll(PDO::FETCH_OBJ);

        return $data;

        $abc->closeCursor();
    }
}
?>