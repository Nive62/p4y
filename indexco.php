<!-- Permet d'inclure l'entête dans le fichier sans le réécrire-->
<?php
include("include/entete.inc.php");
if (!isset($_SESSION['login'])) {
    header('location:index.php');
    exit();
}
if ((!isset($_SESSION['login'])) or ($_SESSION['type']) == 'visiteur') {
    header('location:index.php');
}
?>

<head>
    <meta charset="UTF-8">
    <title>PhotoForYou - Banque d’images pro</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/index.css">
</head>

<body>

    <!-- Hero -->
    <section class="hero">
        <div class="hero-content">
            <h1>Des photos uniques pour sublimer vos projets</h1>
            <p>Explorez des milliers d’images professionnelles, libres de droits et prêtes à l’emploi.</p>
            <a href="#" class="btn">Commencer maintenant</a>
        </div>
    </section>

    <!-- Présentation -->
    <section class="presentation">
        <div class="container">
            <h2>Pourquoi PhotoForYou ?</h2>
            <p>Notre plateforme vous offre des visuels professionnels pour vos réseaux, sites web, flyers ou
                publications. Nos formules flexibles s’adaptent à tous les besoins, du créateur indépendant à l’agence
                marketing.</p>
        </div>
    </section>

    <!-- Tarifs -->
    <section class="pricing">
        <h2>Nos formules</h2>
        <div class="cards">
            <div class="card">
                <h3>Essai</h3>
                <p class="price">0 € / mois</p>
                <ul>
                    <li>5 photos offertes</li>
                    <li>Usage personnel</li>
                </ul>
                <a href="#" class="btn">Souscrire</a>
            </div>
            <div class="card highlight">
                <h3>Découverte</h3>
                <p class="price">9 € / mois</p>
                <ul>
                    <li>20 crédits/mois</li>
                    <li>20% de réduction</li>
                </ul>
                <a href="#" class="btn">Souscrire</a>
            </div>
            <div class="card">
                <h3>Pro</h3>
                <p class="price">19 € / mois</p>
                <ul>
                    <li>60 crédits/mois</li>
                    <li>30% de réduction</li>
                </ul>
                <a href="#" class="btn">Souscrire</a>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <p>&copy; 2025 PhotoForYou. Tous droits réservés.</p>
    </footer>

</body>