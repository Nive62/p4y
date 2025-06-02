<?php
include ("include/entete.inc.php");
include ("accesbase.php");
include ("include/panier.class.php");
require("commarticle.php");

// On verifie la connexion
if($_SESSION['login']!=TRUE)
{
	header("Location:connexion.php");
}

if($_SESSION['type'] == 'photographe'){
	header('location:indexco.php');
	exit();
}
$panier= new panier($zxy);

$Produits=afficher();
?>

<!DOCTYPE html>
<html>

<head>
    <title>Boutique</title>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="css/supparticle.css" rel="stylesheet" />
</head>

<body>
    <h3>Catégories</h3>
    <div id="myBtnContainer">
        <button class="btn2" onclick="filterSelection('tous')">Tout afficher</button>
        <?php
                $query = "SELECT DISTINCT(categorie) FROM evinp4y.article";
                $statement = $zxy->prepare($query);
                $statement->execute();
                $result = $statement->fetchAll();
                foreach($result as $row)
                {
            ?>
        <button class="btn2"
            onclick="filterSelection('<?php echo $row['categorie']; ?>')"><?php echo $row['categorie']; ?></button>
        <?php
                }
            ?>
    </div>
    <br>
    <?php foreach($Produits as $produit):?>
    <div class="filterDiv <?= $produit->categorie ?> card">
        <img src="images/article/<?= $produit->photoArticle ?>">
        <div class="container">
            <p><?= $produit->nom_article ?></p>
            <p>Quantité : <?= $produit->quantite ?></p>
            <p>Catégorie : <?= $produit->categorie ?></p>
            <h5><?= $produit->prix_article ?> €</h5>
        </div>
        <a href="addpanier.php?id=<?= $produit->id_article ?>">
            <p><button class="btn3" type="submit" name="<?= $produit->id_article ?>">Acheter</button></p>
        </a>
    </div>
    <?php endforeach; ?>

    <script>
    filterSelection("tous")

    function filterSelection(c) {
        var x, i;
        x = document.getElementsByClassName("filterDiv");
        if (c == "tous") c = "";
        for (i = 0; i < x.length; i++) {
            w3RemoveClass(x[i], "show");
            if (x[i].className.indexOf(c) > -1) w3AddClass(x[i], "show");
        }
    }

    function w3AddClass(element, name) {
        var i, arr1, arr2;
        arr1 = element.className.split(" ");
        arr2 = name.split(" ");
        for (i = 0; i < arr2.length; i++) {
            if (arr1.indexOf(arr2[i]) == -1) {
                element.className += " " + arr2[i];
            }
        }
    }

    function w3RemoveClass(element, name) {
        var i, arr1, arr2;
        arr1 = element.className.split(" ");
        arr2 = name.split(" ");
        for (i = 0; i < arr2.length; i++) {
            while (arr1.indexOf(arr2[i]) > -1) {
                arr1.splice(arr1.indexOf(arr2[i]), 1);
            }
        }
        element.className = arr1.join(" ");
    }
    </script>
</body>

</html>