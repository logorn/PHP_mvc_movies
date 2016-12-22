

<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<title><?= $title ?></title>
	<!-- Bootstrap Core CSS -->
	<link rel="stylesheet" type="text/css"  href="<?= BASE_URL ?>public/css/bootstrap.min.css">
	<!-- Custom CSS -->
	<link rel="stylesheet" type="text/css"  href="<?= BASE_URL ?>public/css/styles.css">
</head>
<body>

	<!-- Navigation -->
	<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
			<div class="container">
					<!-- Brand and toggle get grouped for better mobile display -->
					<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
									<span class="sr-only">Toggle navigation</span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
							</button>
							<a class="navbar-brand" href="<?= BASE_URL ?>">Website Name</a>
					</div>
					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
							<ul class="nav navbar-nav">
												<?php
												if (!empty($_SESSION['user'])) {
													echo '<li><a href="';
													echo BASE_URL . 'user">';
													echo "Hello, " . $_SESSION['user']['username'] . ". Click here to access to your home page";
													echo "</a></li>";
													echo '<li><a href="';
													echo BASE_URL . 'logout">';
													echo "Log out</a></li>";
												}
												else {
													echo '<li><a href="';
													echo BASE_URL . 'login">';
													echo "Log in";
													echo "</a></li>";
												}
											?>
							</ul>
					</div>
					<!-- /.navbar-collapse -->
			</div>
			<!-- /.container -->
	</nav>

	<!-- Page Content -->

	<div class="container">

		<?php //include le fichier spécifié à la fin des méthodes de contrôleurs ?>
		<?php include("app/templates/$page.php") ?>

	<!-- Footer -->
	<footer>
			<div class="row">
					<div class="col-lg-12">
							<p>Copyright &copy; Movie Website 2016</p>
					</div>
			</div>
			<!-- /.row -->
	</footer>

	</div>
	<!-- /.container -->
</body>
</html>
