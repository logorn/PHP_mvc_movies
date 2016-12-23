
<div class="row">
    <div class="col-lg-12">
      <br>
        <h1 class="page-header">Register a new account</h1>
    </div>
</div>
<div class="col-sm-5">


    <form method="POST">
			<div>
				<label for="username">Username</label>
				<input class="form-control" type="text" name="username" id="username" value="">
			</div>
			<div>
				<label for="email">Email</label>
				<input class="form-control" type="email" name="email" id="email" value="">
			</div>
			<div>
				<label for="password">Password</label>
				<input class="form-control" type="password" name="password" id="password" value="">
			</div>
			<div>
				<label for="password_bis">Password (again)</label>
				<input class="form-control" type="password" name="password_bis" id="password_bis" value="">
			</div>
			<div>
			<?php
      if(!empty($errors)) {
        foreach($errors as $error) {
          echo "<p>" . $error . "</p>";
        }
      }?>
			</div>
			<div>
				<button type="submit">Register !</button>
			</div>
		</form>

	</div>
