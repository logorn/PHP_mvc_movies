<div class="row">
    <div class="col-lg-12">
      <br>
        <h1 class="page-header">Register a new account</h1>
    </div>
</div>

    <form method="POST">
			<div>
				<label for="username">Pseudo</label>
				<input type="text" name="username" id="username" value="">
			</div>
			<div>
				<label for="email">Email</label>
				<input type="email" name="email" id="email" value="">
			</div>
			<div>
				<label for="password">Mot de passe</label>
				<input type="password" name="password" id="password" value="">
			</div>
			<div>
				<label for="password_bis">Mot de passe encore</label>
				<input type="password" name="password_bis" id="password_bis" value="">
			</div>
			<div>
			<?php foreach($errors as $error): ?>
				<p><?= $error ?></p>
			<?php endforeach; ?>
			</div>
			<div>
				<button type="submit">M'inscrire !</button>
			</div>
		</form>

	</div>
