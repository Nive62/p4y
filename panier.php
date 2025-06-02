<?php
include("include/entete.inc.php");
include("accesbase.php");
include("include/panier.class.php");

if ($_SESSION['login'] != TRUE) {
    header("Location:connexion.php");
}

if ($_SESSION['type'] == 'photographe') {
    header('location:indexco.php');
    exit();
}

$panier = new panier($zxy);

if (isset($_GET['del'])) {
    $panier->del($_GET['del']);
}
?>

<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/cart.css" rel="stylesheet">
    <title>Mon Panier</title>
</head>

<body>
    <main class="cart-container">
        <section class="cart-table-wrapper">
            <table class="cart-table">
                <thead>
                    <tr>
                        <th>Produit</th>
                        <th>Nom</th>
                        <th>Prix</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $poi = array_keys($_SESSION['panier']);
                    if (empty($poi)) {
                        $ab = array();
                    } else {
                        $Req = $zxy->prepare('SELECT * FROM evinp4y.article WHERE id_article IN (' . implode(',', $poi) . ')');
                        $Req->execute();
                        $ab = $Req->fetchAll(PDO::FETCH_OBJ);
                    }
                    foreach ($ab as $product):
                    ?>
                        <tr class="cart-item">
                            <td class="cart-img">
                                <img src="images/article/<?= $product->photoArticle ?>" alt="<?= $product->nom_article ?>">
                            </td>
                            <td class="cart-name">
                                <?= htmlspecialchars($product->nom_article) ?>
                            </td>
                            <td class="cart-price">
                                <?= $product->prix_article * $_SESSION['panier'][$product->id_article] ?> €
                            </td>
                            <td class="cart-action">
                                <a href="panier.php?del=<?= $product->id_article ?>" class="btn btn-danger">Supprimer</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </section>

        <section class="cart-summary">
            <div class="summary-box">
                <h2>Total :</h2>
                <p><strong><?= $panier->total(); ?> Crédits</strong></p>
                <div class="summary-buttons">
                    <a href="paiement.php?id=<?= $_SESSION['id_user'] ?>" class="btn btn-success">Procéder à la
                        commande</a>
                    <a href="boutique.php" class="btn btn-warning">Revenir à la boutique</a>
                    <a href="panier.php" class="btn btn-light">Actualiser les stocks</a>
                </div>
            </div>
        </section>
    </main>
</body>

</html>