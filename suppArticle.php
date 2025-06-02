<?php
  include ("include/entete.inc.php");
  require("commarticle.php");

  if(!isset($_SESSION['login'])){
    header('location:index.php');
    exit();
  }
  if($_SESSION['type'] != 'admin'){
	header('location:index.php');
	exit();
  }

  $Produits=afficher();
?>

<!DOCTYPE html>
<html lang="fr">

  <head>
    <link href="css/supparticle.css" rel="stylesheet" />
	  <title></title>
  </head>

  <body>
<br>
    <!-- Fonction qui affiche pour tous les produits la photo, l'id, le nom, la quantité, la catégorie et un bouton Supprimer-->
    <?php foreach($Produits as $produit):?> 
      <div class="card">
        <img src="images/article/<?= $produit->photoArticle ?>">
          <div class="container">
            <p>Id : <?= $produit->id_article ?></p>
            <p>Nom Article : <?= $produit->nom_article ?></p>
            <p>Quantité : <?= $produit->quantite ?></p>
            <p>Catégorie : <?= $produit->categorie ?></p>
          </div>
          <a href="supprimer.php?numArticle=<?= $produit->id_article ?>">
            <p><button class="btn3" type="submit" name="<?= $produit->id_article ?>">Supprimer</button></p>
          </a>
      </div>
    <?php endforeach; ?>

  </body>
</html>