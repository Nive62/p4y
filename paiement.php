<?php
include ("include/entete.inc.php");
include("accesbase.php");
include ("include/panier.class.php");

if($_SESSION['login']!=TRUE)
{
	header("Location:connexion.php");
}

$panier= new panier($zxy);

if(isset($_GET['del'])){
    $panier->del($_GET['del']);
}
// On prend les credits de l'user on fait une soustraction avec son panier
    $a = htmlentities($_SESSION['credit']);
    $b = $panier->total();
    $Credit = $a - $b;
// Si c'est au dessus de 0 ou égal, on UPDATE dans la bdd la colonne crédit de l'user via son id, on remplace par le total de la soustraction
    if($Credit >= 0){
        $pay = $zxy->prepare('UPDATE evinp4y.utilisateur SET Credit=:credit WHERE id_user = '.htmlentities($_SESSION['id_user']).'');
        $pay->bindValue(':credit',$Credit,PDO::PARAM_INT);
        $executeIsOk = $pay->execute();

        $ref = ('SELECT * FROM evinp4y.utilisateur WHERE id_user = '.htmlentities($_SESSION['id_user']).'');
        $refok = $zxy->query($ref);
        $result = $refok->fetch();
        $_SESSION['credit'] = htmlentities($result['Credit']); //on met à jour les crédits dans la session

        //Si la requete fonctionne on envoie sur la page AchatOk sinon on écrit Echec
        if($executeIsOk){
            header('Location:AchatOk.php');
        }
        else{
            $message = 'Echec';
        }
    }
    //Sinon Ca marque que c'est insuffisant et on voit le prix du panier puis nos credits restants
    else{
        echo '<h1>Fond insuffisant ! Vérifiez votre solde.</h1>';
        echo '<h6>Le prix de votre panier est de '.$b.' crédits</h6>';
        echo '<h6><strong>Crédits restants : </strong>'.htmlentities($_SESSION['credit']).'</h6>';
    }

?>
<!DOCTYPE html>
<html lang="fr">
  <head>
  <link href="css/paiement.css" rel="stylesheet" />
  </head>
  <body>
  </body>
</html>