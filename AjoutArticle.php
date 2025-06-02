<?php
include("include/entete.inc.php");
?>

<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Ajouter une photo</title>
  <link rel="stylesheet" href="css/AjoutArticle.css"> <!-- Fichier CSS que j'ai créé juste en dessous -->
</head>

<body>

  <div class="form-container">
    <h2>Ajouter une nouvelle photo</h2>

    <!-- Formulaire pour ajouter un article (photo) -->
    <form method="post" action="ajoutphoto2.php" enctype="multipart/form-data" id="form">

      <!-- Input pour choisir une image -->
      <label for="photoUser">Choisir une image :</label>
      <input type="file" id="photoUser" name="photoArticle" accept="image/*" required>

      <!-- Nom du produit -->
      <input type="text" name="nom_article" placeholder="Nom du produit" required>

      <!-- Référence -->
      <input type="text" name="reference" placeholder="Référence" required>

      <!-- Prix -->
      <input type="number" name="prix_article" placeholder="Prix" required>

      <!-- Quantité -->
      <input type="number" name="quantite" placeholder="Quantité" required>

      <!-- Liste des catégories récupérées dans la base -->
      <div class="categories">
        <p>Catégories :</p>
        <?php
        $query = "SELECT DISTINCT(Categorie) FROM evinp4y.categorie";
        $statement = $zxy->prepare($query);
        $statement->execute();
        $result = $statement->fetchAll();
        foreach ($result as $row) {
        ?>
          <label>
            <input type="checkbox" name="categorie" value="<?= $row['Categorie'] ?>" required>
            <?= $row['Categorie'] ?>
          </label>
        <?php } ?>
      </div>

      <!-- Bouton de validation -->
      <button type="submit" name="valider">Ajouter</button>
    </form>
  </div>

  <!-- Script pour vérifier le formulaire -->
  <script>
    (function() {
      "use strict";
      window.addEventListener("load", function() {
        const form = document.getElementById("form");
        form.addEventListener("submit", function(event) {
          if (!form.checkValidity()) {
            event.preventDefault();
            event.stopPropagation();
          }
          form.classList.add("was-validated");
        }, false);
      }, false);
    })();
  </script>

</body>

</html>