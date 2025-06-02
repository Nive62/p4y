<?php
include "include/entete.inc.php";
if ($_SESSION['type'] != 'admin') {
	header('location:index.php');
	exit();
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Gestion Utilisateur</title>
    <link href="css/gestionUtilisateur.css" rel="stylesheet" />
</head>

<body>
    <h1 class="Gestion">Gestion Utilisateur</h1>
    <div>
        <table>
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Mail</th>
                    <th>Type</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
				$req = $zxy->query("SELECT * FROM evinp4y.utilisateur");
				$data = $req->fetchAll();
				foreach ($data as $li) {
					echo '<tr>
                  <td>' . $li['id_user'] . '</td>
                  <td>' . $li['Nom'] . '</td>
                  <td>' . $li['Prenom'] . '</td>
                  <td>' . $li['Mail'] . '</td>
                  <td>' . $li['Type'] . '</td>
                  <td>
                    <a class="button-role" href="gestion_pdo.php?id_user=' . $li['id_user'] . '&Type=' . $li['Type'] . '">
                      Modifier
                    </a>
                  </td>
                </tr>';
				}
				?>
            </tbody>
        </table>
    </div>
</body>

</html>