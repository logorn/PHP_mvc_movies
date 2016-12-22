<?php

	//si le form est soumis...
	if (!empty($_POST)){

		$usernameOrEmail = $_POST['usernameOrEmail'];

		//on va chercher le user en fonction du pseudo ou de l'email
		$sql = "SELECT * FROM users
				WHERE username = :usernameOrEmail
				OR email = :usernameOrEmail";

		$stmt = $dbh->prepare($sql);
		$stmt->bindValue(":usernameOrEmail", $usernameOrEmail);
		$stmt->execute();
		$user = $stmt->fetch();

		//hache le mot de passe et le compare à celui de la bdd
		if (password_verify($_POST['password'], $user['password'])){
			//connectez l'user en stockant une ou des infos dans la session. On vérifiera ces infos sur les pages à sécuriser.
			$_SESSION['user'] = $user;

			//$_COOKIE pour la lecture
			//on stocke le token dans un cookie
			//on ne devrait placer ce cookie que si une case est cochée
			//pour l'instant, ce cookie ne sert à rien !!!
			setcookie("remember_me", $user['token'], strtotime("+ 6 months"), "/");
		}
		else {
			//on garde ça vague pour ne pas donner d'infos aux méchants
			$error = "Mauvais identifiants ou mot de passe";
		}

	}

?>
<div class="row">
    <div class="col-lg-12">
      <br>
        <h1 class="page-header">Log in with an existing account</h1>
    </div>
</div>
	<div class="container">
		<form method="POST">
			<div>
				<label for="usernameOrEmail">Username or Email</label>
				<input type="text" name="usernameOrEmail" id="usernameOrEmail" value="">
			</div>
			<div>
				<label for="password">Password</label>
				<input type="password" name="password" id="password" value="">
			</div>
			<div>
				<p><?php if (isset($error)) echo $error; ?></p>
			</div>
			<div>
				<button type="submit">Ok !</button>
			</div>
		</form>
    <form method="POST">

			<div>
				<p><?php if (isset($error)) echo $error; ?></p>
			</div>

			<div>
        <h1>New here ?
          <small><a href="inscription.php">Register an account</a></small></h1>
			</div>
		</form>

	</div>
