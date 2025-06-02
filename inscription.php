<?php
include ("include/entete.inc.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Le design et les deux fichiers css viennent d'internet il servenr à avoir un beau formulaire-->
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>


<!-- Formulaire d'inscription -->
  	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
  				<form  method="post" action="ajoutUser.php"  id="form" class="login100-form validate-form" enctype="multipart/form-data">
				  	<span class="login100-form-title p-b-26">
						Bienvenue !
					</span>
				 
				 	<div class="wrap-input100 validate-input">
  				    	<div class="wrap-login100-form-btn">
  				      		<input type="text" class="input100"  pattern="[a-zA-ZàâæçéèêëîïôœùûüÿÀÂÆÇnÉÈÊËÎÏÔŒÙÛÜŸ-]+" minlength="3" maxlength="30" autocomplete="off" name="prenom" id="prenom" placeholder="Votre prénom" required>
  						</div>
  					</div>

  					<div class="wrap-input100 validate-input">
  					  	<div class="wrap-login100-form-btn">
  					    	<input type="text" class="input100" pattern="[a-zA-ZàâæçéèêëîïôœùûüÿÀÂÆÇnÉÈÊËÎÏÔŒÙÛÜŸ-]+" autocomplete="off"  spellcheck="false" name="nom"  minlength="3" maxlength="30" id="nom" placeholder="Votre nom" required>
  				    	</div>
  				  	</div>

  				  	<div class="input100 validate-input">
  				    	<div class="col-md-4 mb-3">
  				      		<!------ Fonction qui demande la photo ---------->
  				      		<input type="file" onchange="actuPhoto(this)" id="photoUser" name="photoUser" accept="image/jpeg, image/png, image/gif">
  				    	</div>
  				 	</div>

  				  	<div class="wrap-input100 validate-input">
  				    	<div class="wrap-login100-form-btn">
  				      		<input type="email" class="input100" name="mail" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" id="email" autocomplete="off" placeholder="E-mail" required>
							<span class="focus-input100"></span>
  				    	</div>
  				  	</div>

  				 	<div class="wrap-input100 validate-input">
  				    	<div class="wrap-login100-form-btn">
  				     		<!------ Verification de confirmation de mot de passe ---------->
  				      		<input type="password" oninput='motdepasse1.setCustomValidity(motdepasse1.value != motdepasse1.value ?  "Mot de passe non identique" : "")' class="input100" id="motdepasse1" name="motdepasse1" minlength="5" maxlength="30" placeholder="Mot de passe" required>
  				      		<span class="focus-input100"></span>
  				      		<div  class="invalid-feedback">
  				        		<p id="erreurMotDePasse"></p>
  				      		</div>
  				    	</div>
  				  	</div>

  				  	<div class="wrap-input100 validate-input">
  				    	<div class="wrap-login100-form-btn">
  				      		<!------ Verification de confirmation de mot de passe ---------->
  				      		<input type="password" oninput='motdepasse2.setCustomValidity(motdepasse2.value != motdepasse1.value ?  "Mot de passe non identique" : "")' class="input100" id="motdepasse2" name="motdepasse2" minlength="5" maxlength="30" placeholder="Mot de passe" required>
  				    	</div>
  				  	</div>
				
					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<input type="submit" value="Valider"  class="login100-form-btn buttoncolor" name="valider" /> 
						</div>
					</div>
  				</form>
			</div>
		</div>
	</div>

<!------ Fonction verification  ---------->
<script>

function validationMotDePasse() 
{
  $motDePasse1=document.getElementById("motdepasse1").value;
  console.log($motDePasse1);
  $motDePasse2=document.getElementById("motdepasse2").value;
  if ($motDePasse1 != $motDePasse2)
  {
    document.getElementById("erreurMotDePasse").value="Erreur";
  }
}

var mail=document.getElementById("email");
mail.addEventListener("blur", function (evt) {
  console.log("Perte de focus pour le mail");
});

var motDePasse=document.getElementById("motdepasse2");
motDePasse.addEventListener("blur", function (evt) {
  validationMotDePasse();
});

(function() {
  "use strict"
  window.addEventListener("load", function() {
    var form = document.getElementById("form")
    form.addEventListener("submit", function(event) {
      if (form.checkValidity() == false) {
        event.preventDefault()
        event.stopPropagation()
      }
      form.classList.add("was-validated")
    }, false)
  }, false)

}())
</script>
