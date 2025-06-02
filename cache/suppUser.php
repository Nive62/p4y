<?php

include ('include/entete.inc.php');


if (!empty($_POST['mail']) && !empty($_POST['motdepasse'])) {
  $email = htmlspecialchars($_POST['mail']);
  $password = htmlspecialchars($_POST['motdepasse']);

  $q = $dbh->prepare('SELECT * FROM evinp4y.utilisateur WHERE Mail = :Mail');
  $q->bindValue('Mail', $email);
  $q->execute();
  $res = $q->fetch(PDO::FETCH_ASSOC);

  
  if ($res) {
      $passwordHash = $res['mdp'];
      $_SESSION['id_user'] = $res['id_user'];
      if (password_verify($password, $passwordHash)) {
          $deleteUser = $dbh->prepare('DELETE From evinp4y.utilisateur where id_user = ?');
          $deleteUser -> execute(array($_SESSION['id_user']));
          unset($_SESSION['login']);
          session_destroy();
          header("Location:index.php");
          }else{
            echo '<script>
            alert("!! Mot de passe invalide !!");
            location.href="index.php";
            </script>';
          }
      } else{
        echo '<script>
        alert("!! Mail  invalide !!");
        location.href="index.php";
        </script>';
      }
  } else {
    echo '<script>
    alert("!! Identifiant invalide !!");
    location.href="index.php";
    </script>';
  }

?>