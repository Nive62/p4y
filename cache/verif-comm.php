<?php
  include ("include/entete.inc.php");


  if (isset($_POST['valider'])){
      $request = $dbh->prepare('SELECT * FROM evinp4y.utilisateur where id_user = ?');
      $request -> execute(array($_SESSION['id_user']));
      $res = $request->fetch(PDO::FETCH_ASSOC);

      if($_SESSION['id_user'] == $res['id_user']){
        $adresse = htmlspecialchars($_POST['adresse1']);
        $ville = htmlspecialchars($_POST['ville']);
        $region = htmlspecialchars($_POST['region']);
        $codep = htmlspecialchars($_POST['codep']);
        $pays = htmlspecialchars($_POST['pays']);
        $infoc = htmlspecialchars($_POST['infoc']); 
        if(!empty($_POST['adresse1'])){
            if(!empty($_POST['ville'])){
                if(!empty($_POST['region'])){
                    if(!empty($_POST['codep'])){
                        if(!empty($_POST['pays'])){     
                            if($res['adresse1']== null && $res['ville']== null && $res['region']== null && $res['codep']== null && $res['pays']== null && $res['infoc']== null){
                                $update=$dbh->prepare('UPDATE evinp4y.utilisateur SET adresse1 = ?, ville = ?, region = ?, codep = ?, pays = ?, infoc = ? where id_user = ?');
                                $update -> execute(array($adresse,$ville,$region,$codep,$pays,$infoc,$_SESSION['id_user']));
                                header('location: paiment.php');
                            }else{
                                $update=$dbh->prepare('UPDATE evinp4y.utilisateur SET adresse1 = ?, ville = ?, region = ?, codep = ?, pays = ?, infoc = ? where id_user = ?');
                                $update -> execute(array($adresse,$ville,$region,$codep,$pays,$infoc,$_SESSION['id_user']));
                                header('location: paiment.php');
                            }
                        }
                    }
                }
            }
        }
      }
}
?>