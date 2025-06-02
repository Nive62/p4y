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
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form class="login100-form validate-form" action="login_pdo2.php" id="form" method="post">
					<span class="login100-form-title p-b-26">
						Ravi de vous revoir !
					</span>
					<span class="login100-form-title p-b-48">
						<i class="zmdi zmdi-font"></i>
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Valid email is: a@b.c">
						<input type="email" id="mail" name="mail" placeholder="Email" class="input100" aria-describedby="emailHelp"  pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" minlength="3" required>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<span class="btn-show-pass">
							<i class="zmdi zmdi-eye"></i>
						</span>
						<input type="password" id="Mdp" name="motdepasse" class="input100" minlength="4"  placeholder="Mot de Passe" required>
					</div>

					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button type="identifier" name="identifier" class="login100-form-btn buttoncolor">
								Connexion
							</button>
						</div>
					</div>

					<div class="text-center p-t-115">
						<span class="txt1">
							Vous n'avez pas de compte ?
						</span>

						<a class="txt2" href="inscription.php">
							Inscrivez vous
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	
	<script>
      var mail=document.getElementById("email");
    mail.addEventListener("blur", function (evt) {
      console.log("Perte de focus pour le mail");
    });

    var motDePasse=document.getElementById("motdepasse");
    motDePasse.addEventListener("blur", function (evt) {
      console.log("Perte de focus pour le mdp");
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
	

</body>
</html>