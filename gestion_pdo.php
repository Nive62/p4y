<?php
include 'include/entete.inc.php';

if(empty($_SESSION['login'])){
    header('location:index.php');
    exit();
}
if($_SESSION['type'] != 'admin'){
    header('location:index.php');
    exit();
}else{
        /* Fonction qui verifie l'etat et le modifie dans la base de données via l'id_user */
        if (isset($_GET["id_user"])) {
            if (isset($_GET["Type"])) {
    
                $id = $_GET["id_user"];
                $Type = $_GET["Type"];
                if($Type == 'admin'){
                    /* admin devient client */
                    $req = $zxy->prepare("UPDATE evinp4y.utilisateur SET Type='client' WHERE id_user = '$id'");
                    $req->execute();
                }

                if($Type == 'client'){
                    /* client devient photographe */
                    $req = $zxy->prepare("UPDATE evinp4y.utilisateur SET Type='photographe' WHERE id_user = '$id'");
                    $req->execute();
                }

                if($Type == 'photographe'){
                    /* Photographe devient admin */
                    $req = $zxy->prepare("UPDATE evinp4y.utilisateur SET Type='admin' WHERE id_user = '$id'");
                    $req->execute();
                }
                header("location:gestionUtilisateur.php");
            }
        }
    }
?>