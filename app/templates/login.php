<div class="row">
    <div class="col-lg-12">
      <br>
        <h1 class="page-header">Log in with an existing account</h1>
    </div>
</div>
	<div class="container">
		<form method="POST">
			<div>
				<label for="usernameOrEmail">Username or Email :</label>
				<input type="text" name="usernameOrEmail" id="usernameOrEmail" value="">
			</div>
			<div>
				<label for="password">Password :</label>
				<input type="password" name="password" id="password" value="">
			</div>
			<div>
				<p><?php if ($error != '') echo '<div class="alert alert-danger"><strong>Error !</strong> ' . $error . '</div>'; ?></p>
			</div>
			<div>
				<button type="submit">Ok !</button>
			</div>
		</form>
    </div>
    <div>
      <h1 class="page-header">New here ?
        <small><a href="register">Register an account</a></small></h1>
    </div>
