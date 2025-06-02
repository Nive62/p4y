<?php
include ('include/entete.inc.php');


if (!empty($_POST['mail']) && !empty($_POST['motdepasse'])) {
  $email = htmlspecialchars($_POST['mail']);
  $password = htmlspecialchars($_POST['motdepasse']);

  $q = $zxy->prepare('SELECT * FROM evinp4y.utilisateur WHERE Mail = :Mail');
  $q->bindValue('Mail', $email);
  $q->execute();
  $res = $q->fetch(PDO::FETCH_ASSOC);

  
  if ($res) {
      $passwordHash = $res['mdp'];
      $_SESSION['id_user'] = $res['id_user'];
      if (password_verify($password, $passwordHash)) {
        $_SESSION['login'] = true;
        $query = "SELECT * from evinp4y.utilisateur where Mail = '$email';";
        $requete = $zxy->query($query);
        $result = $requete->fetch();
        $_SESSION['id_user'] = htmlentities($result['id_user']);
        $_SESSION['prenomUtilisateur'] = htmlentities($result['Prenom']);
        $_SESSION['nomUtilisateur'] = htmlentities($result['Nom']);
        $_SESSION['emailUtilisateur'] = htmlentities($result['Mail']);
        $_SESSION['type'] = htmlentities($result['Type']);
        $_SESSION['photoUser'] = "images/".htmlentities($result['photoUser']);
        $_SESSION['etat'] = htmlentities($result['etat']);
        $_SESSION['credit'] = htmlentities($result['Credit']);
        unset($result);
        header('Location: indexco?id='.$_SESSION['id_user']);
      }else{
        echo '<script>
        alert("!! Mail ou Mot de passe invalide !!");
        location.href="index.php";
        </script>';
        }
      } 
  }

?>