<?php
  include ("include/entete.inc.php");

  if (isset($_POST['valider'])){
    if(!empty($_POST['categorie'])){

        $nom = htmlspecialchars($_POST['nom_article']);
        $quantite = htmlspecialchars($_POST['quantite']);
        $prix = htmlspecialchars($_POST['prix_article']);
        $reference = htmlspecialchars($_POST['reference']);
        $categorie = htmlspecialchars($_POST['categorie']);


        // Traitement de la photo
      if (isset($_FILES) && count($_FILES)>0)
      {
        $urlPhoto = $_FILES['photoArticle'];
        $nom_fichier = $urlPhoto['name'];
        if (strlen($nom_fichier)==0)
        {
            $nom_fichier=$nomPhoto.".png";
        }
      }
      $insterUser = $zxy->prepare('INSERT INTO evinp4y.article(nom_article, quantite, prix_article, photoArticle, reference, categorie)Values(?, ?, ?, ?, ?, ?)');
      $insterUser->execute(array($nom, $quantite, $prix, $nom_fichier, $reference, $categorie));

      try
    {
      //Ajoute la photo dans un dossier
      move_uploaded_file($urlPhoto['tmp_name'],'images/article/'.$nom_fichier);
      header('Location: AjoutPhotoOk.php');
    }
    catch(PDOException $e)
    {
      echo "<br/><h1> Erreur : </h1>" . $e->getMessage();
    }

      }
      }
?>