<?php
  include ("include/entete.inc.php");

  if (isset($_POST['valider']))
  {
    if(!empty($_POST['mail']))
    {

      $nom = htmlspecialchars($_POST['nom']);
      $prenom = htmlspecialchars($_POST['prenom']);
      $mail = htmlspecialchars($_POST['mail']);

      //Hashage du mot de passe via la fonction password_hash
      $motDePasse = password_hash($_POST['motdepasse1'], PASSWORD_DEFAULT);

        // Traitement de la photo
      if (isset($_FILES) && count($_FILES)>0)
      {
        $urlPhoto = $_FILES['photoUser'];
        $nom_fichier = $urlPhoto['name'];
        if (strlen($nom_fichier)==0) 
        {
          $nom_fichier="user.png";
        }
      }
      $insterUser = $zxy->prepare('INSERT INTO evinp4y.utilisateur(Nom,Prenom,Mail,mdp,photoUser)Values(?, ?, ?, ?, ?)');
      $insterUser->execute(array($nom,$prenom,$mail,$motDePasse,$nom_fichier));

      try
        {
          //ajout dans le répertoire la photo via son nom
          move_uploaded_file($urlPhoto['tmp_name'],'images/'.$nom_fichier);
          header('Location: inscriptionOK.php');
        }
      catch(PDOException $e)
        {
          echo "<br/><h1> Erreur : </h1>" . $e->getMessage();
        }
    }
  }
    header('location: inscriptionOK.php');
?>