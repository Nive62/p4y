<!-- Lance une session et requiert l'accès au fichier accesbase -->
<?php
  session_start();
  require_once'accesbase.php';
  $zxy->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>
<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/nav.css" rel="stylesheet" />
    <link href="css/entete.css" rel="stylesheet" />
    <title>Nive & Co</title>
  </head>
  <body>
      <!-- Les 4 blocs en php équivaut à votre niveau de connexion-->
      <!-- Le premier bloc est pour un visiteur -->
      <!-- Le deuxième pour un admin-->
      <!-- Le troisième pour un Photographe-->
      <!-- La quatrième pour un client-->
    <?php
    /*Le premier bloc est pour un visiteur*/
    if ((!isset($_SESSION['login'])) OR ($_SESSION['type'])=='visiteur') {
      echo '
      <header>
        <ul class="enteteul">
          <li class="enteteli" ><a class="entetea active" href="index.php">PhotoForYou</a></li>
          <li class="enteteli" ><a class="entetea" href="boutique.php">Boutique</a></li>
          <li class="enteteli"  style="float:right"><a class="entetea" href="inscription.php">Inscription</a></li>
          <li class="enteteli"  style="float:right"><a class="entetea" href="connexion.php">Connexion</a></li>
          <li class="enteteli"><a class="entetea" onclick="myFunction()" onclick="TextSwitch()">Switch Mode</a></li>
        </ul>
      </header>'; 
    }
    elseif ($_SESSION['type']=='admin') {
      echo '
      <header>
        <ul class="enteteul">
          <li class="enteteli"><a class="entetea active" href="indexco.php">PhotoForYou</a></li>
          <li class="enteteli"><a class="entetea" href="boutique.php">Boutique</a></li>
          <li class="enteteli"><a href="AjoutArticle.php" class="entetea">Ajout</a></li>
          <li class="enteteli"><a href="suppArticle.php" class="entetea">Supprimer</a></li>
          <li class="enteteli"><a href="gestionUtilisateur.php" class="entetea">Gestion</a></li>
          <li class="enteteli" style="float:right"><a class="entetea" href="deconnexion.php">Deconnexion</a></li>
          <li class="enteteli" style="float:right"><a class="entetea" href="panier.php">Mon Panier</a></li>
          <li class="enteteli" style="float:right"><a class="entetea" href="monprofil.php">Mon Profil</a></li>
          <li class="enteteli"><a class="entetea" onclick="myFunction()" onclick="TextSwitch()">Switch Mode</a></li>
        </ul>
      </header>';
    }
    elseif ($_SESSION['type']=='photographe') {
      echo '
      <header>
        <ul class="enteteul">
          <li class="enteteli"><a class="entetea active" href="indexco.php">PhotoForYou</a></li>
          <li class="enteteli"><a href="AjoutArticle.php" class="entetea">Ajout</a></li>
          <li class="enteteli" style="float:right"><a class="entetea" href="deconnexion.php">Deconnexion</a></li>
          <li class="enteteli" style="float:right"><a class="entetea" href="monprofil.php">Mon Profil</a></li>
          <li class="enteteli"><a class="entetea" onclick="myFunction()" onclick="TextSwitch()">Switch Mode</a></li>
        </ul>
      </header>';
    }
    else {
      echo '
      <header>
        <ul class="enteteul">
          <li class="enteteli"><a class="entetea active" href="indexco.php">PhotoForYou</a></li>
          <li class="enteteli"><a class="entetea" href="boutique.php">Boutique</a></li>
          <li class="enteteli" style="float:right"><a class="entetea" href="deconnexion.php">Deconnexion</a></li>
          <li class="enteteli" style="float:right"><a class="entetea" href="panier.php">Mon Panier</a></li>
          <li class="enteteli" style="float:right"><a class="entetea" href="monprofil.php">Mon Profil</a></li>
          <li class="enteteli"><a class="entetea" onclick="myFunction()" onclick="TextSwitch()">Switch Mode</a></li>
        </ul>
      </header>';
    }
    ?>
  </body>
  <script>
    function myFunction() {
     var element = document.body;
     element.classList.toggle("dark-mode");
    }
  </script>
</html>