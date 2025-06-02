
  <?php
	include ("include/entete.inc.php")
  ?>

<!DOCTYPE html>
<html>
  <body>
    <h1>Achat effectué avec succès !</h1>
    <?php
    echo '<p><strong>Crédits : </strong>'.htmlentities($_SESSION['credit']).'</p>';
    ?>
  </body>
</html>