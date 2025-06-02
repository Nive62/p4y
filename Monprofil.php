<?php
include("include/entete.inc.php");
require("commarticle.php");

if (!isset($_SESSION['login'])) {
    header('location:index.php');
    exit();
}

$User = utilisateur();
$Produits = achat();
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Mon Profil</title>
    <link rel="stylesheet" href="css/monprofil.css">
</head>

<body>
    <div class="carte-utilisateur">
        <img src="<?= htmlspecialchars($_SESSION['photoUser']) ?>" alt="Photo de profil" class="photo-profil"
            onerror="this.src='images/default.jpg'">
        <div class="infos-utilisateur">
            <p><strong>Nom :</strong> <?= htmlspecialchars($_SESSION['nomUtilisateur']) ?></p>
            <p><strong>Prénom :</strong> <?= htmlspecialchars($_SESSION['prenomUtilisateur']) ?></p>
            <p><strong>Mail :</strong> <?= htmlspecialchars($_SESSION['emailUtilisateur']) ?></p>
            <p><strong>Grade :</strong> <?= htmlspecialchars($_SESSION['type']) ?></p>
            <p><strong>Crédits :</strong> <?= htmlspecialchars($_SESSION['credit']) ?></p>
        </div>
    </div>

    <h2 class="titre-section">Les Photos que vous possédez</h2>

    <div class="grille-photos">
        <?php foreach ($Produits as $produit): ?>
        <div class="carte-photo">
            <img src="images/article/<?= htmlspecialchars($produit->photoArticle) ?>"
                alt="<?= htmlspecialchars($produit->nom_article) ?>" onerror="this.src='images/default.jpg'">
            <p>Nom Article : <?= htmlspecialchars($produit->nom_article) ?></p>
        </div>
        <?php endforeach; ?>
    </div>
</body>

</html>