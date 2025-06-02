<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Page de recherche</title>
    <link rel="stylesheet" href="css/recherche.css">
</head>

<body>

    <div class="container">
        <h2>Recherche en direct</h2>

        <!-- Barre de recherche -->
        <input type="text" id="searchBar" placeholder="Rechercher..." onkeyup="filtrer()">

        <!-- Liste des éléments à filtrer -->
        <ul id="liste">
            <li>PhotoForYou</li>
            <li>Château Planères</li>
            <li>Vin Rouge</li>
            <li>Vin Blanc</li>
            <li>Client : Baptiste</li>
            <li>Photographe : Jean</li>
            <li>Commande #1023</li>
        </ul>
    </div>

    <!-- Script JS pour filtrer en temps réel -->
    <script>
        function filtrer() {
            const input = document.getElementById("searchBar");
            const filtre = input.value.toLowerCase();
            const ul = document.getElementById("liste");
            const items = ul.getElementsByTagName("li");

            for (let i = 0; i < items.length; i++) {
                const txt = items[i].textContent || items[i].innerText;
                items[i].style.display = txt.toLowerCase().includes(filtre) ? "" : "none";
            }
        }
    </script>

</body>

</html>