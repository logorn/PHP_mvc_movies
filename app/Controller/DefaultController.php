<?php

namespace Controller;

session_start();

use View\View; //on peut donc utiliser cette classe comme View au lieu de \View\View

class DefaultController
{
	/**
	 * Affiche la page d'accueil
	 */
	public function home()
	{
		if(empty($_GET['page'])) {
			$currentPage = 1;
			$_GET['page'] = 1;
		}
		else {
			$currentPage = $_GET['page'];
		}

		$movieManager = new \Model\Manager\MovieManager();

		$genreManager = new \Model\Manager\GenreManager();

		$genres = $genreManager->findAllGenre();
		$genres = explode(",", $genres->getListeGenres());

		if (!empty($_GET['genre'])) {
			$movies = $movieManager->findAllByGenre($_GET['genre'], $currentPage);
			$count = $movieManager->countAllByGenre($_GET['genre']);
		}
		elseif (!empty($_GET['keyword'])) {
			$movies = $movieManager->findAllByKeyword($_GET['keyword'], $currentPage);
			$count = $movieManager->countAllByKeyword($_GET['keyword']);
		}
		else {
			$movies = $movieManager->findAll($_GET['page']);
			$count = $movieManager->countAll();
		}

		$data = [
			"movies" => $movies,
			"moviesCount" => $count,
			"genres" => $genres,
			"currentPage" => $currentPage
		];
		View::show("home.php", "Website | Home", $data);
	}
	public function detail()
	{
		$movieManager = new \Model\Manager\MovieManager();
		$genreManager = new \Model\Manager\GenreManager();
		if (empty($_GET['id'])) {
			return $this->error404();
		}
		$movie = $movieManager->findOne($_GET['id']);
		$genre = $genreManager->findOneGenre($_GET['id']);
		$movie->setGenre($genre->getGenre());
		View::show("detail.php", "Website | Movie details", ["movie" => $movie]);
	}

	public function userHome()
	{
		$watchlist = $_SESSION['user']['watchlist'];
		$watchlistName[] = '';

		$userManager = new \Model\Manager\UserManager();
		$movieManager = new \Model\Manager\MovieManager();

		// ajout d'un film à la watchlist
		if(!empty($_GET['addWl'])) {
			$idWl = $_GET['addWl'];

			$isInList = explode("-", $watchlist);
			//ajouter l'id du get à la watchlist + titre du film
			//si cet id n'est pas deja présent
			if (!in_array($idWl, $isInList)) {
					$_SESSION['user']['watchlist'] .= $idWl . "-";
					$userManager->setUserWatchlist($_SESSION['user']['watchlist'],$_SESSION['user']['id']);
			}

			;
			// setWatchlist($watchlist)
			//redirige sur l'userHome
			header("Location: user");
		}

		//suppression d'un film de la watchlist
		if(!empty($_GET['delWl'])) {
			$delWl = $_GET['delWl'];
			$newList = '';
			$isInList = explode("-", $watchlist);

			//on vérifie si l'id fait bien partie de la watchlist
			if (in_array($delWl, $isInList)) {

				$isInList = array_diff($isInList, array($delWl));
				array_pop($isInList);
					foreach ($isInList as $id) {
						$newList .= $id . "-";
					}

					$_SESSION['user']['watchlist'] = $newList;

					$userManager->setUserWatchlist($_SESSION['user']['watchlist'],$_SESSION['user']['id']);
			}

			;
			// setWatchlist($watchlist)
			//redirige sur l'userHome
			header("Location: user");
		}

		// si la watchlist n'est pas vide, on prépare l'affichage des films
		if (!empty($_SESSION['user']['watchlist'])) {
			$watchlist = explode("-", $watchlist);
			//on détruit la dernière entrée du tableau, vide, causée par explode
			array_pop($watchlist);
			foreach ($watchlist as $movieId) {
				$watchlistName[$movieId] = $movieManager->findOneTitle($movieId);
			}
		}

		$datas = [
			"watchlist" => $watchlist,
			"watchlistName" => $watchlistName
		];
		View::show("userHome.php", "Website | User Home", $datas);
	}

	public function adminHome()
	{
		$error = '';
		
		if(empty($_GET['page'])) {
			$currentPage = 1;
			$_GET['page'] = 1;
		}
		else {
			$currentPage = $_GET['page'];
		}

		$movieManager = new \Model\Manager\MovieManager();
		$genreManager = new \Model\Manager\GenreManager();

		$genres = $genreManager->findAllGenre();
		$genres = explode(",", $genres->getListeGenres());

		$movies = $movieManager->findAll($_GET['page']);
		$count = $movieManager->countAll();

		$factory = new \RandomLib\Factory;
		$generator = $factory->getGenerator(new \SecurityLib\Strength(\SecurityLib\Strength::MEDIUM));
		$token = $generator->generateString(50, '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ');
		$_SESSION['user']['token'] = $token;

		//ajout d'un film
		if (!empty($_POST['addMovie'])){

		}

		//suppression d'un film
		if (!empty($_POST['delMovie'])){

		}

		//modification d'un film
		if (!empty($_POST['updateMovie'])){

		}


		$datas = [
			"movies" => $movies,
			"moviesCount" => $count,
			"genres" => $genres,
			"currentPage" => $currentPage,
			"token" => $token,
			"error" => $error
		];
		View::show("adminHome.php", "Website | Admin Home", $datas);
	}
	public function login()
	{
		//traitement du formulaire de connexion
		//appelle le usermanager pour les requetes sql
		//affichage du formulaire

		$error = '';
		//si le form est soumis...

		if (!empty($_POST)){

			$usernameOrEmail = $_POST['usernameOrEmail'];

			$userManager = new \Model\Manager\UserManager();
			//on va chercher le user en fonction du pseudo ou de l'email
			$user = $userManager->searchUser($usernameOrEmail);

			//hache le mot de passe et le compare à celui de la bdd
			if (password_verify($_POST['password'], $user['password'])){
				//connectez l'user en stockant une ou des infos dans la session.
				//On vérifiera ces infos sur les pages à sécuriser.
				$_SESSION['user'] = $user;

				//$_COOKIE pour la lecture
				//on stocke le token dans un cookie
				//on ne devrait placer ce cookie que si une case est cochée
				//pour l'instant, ce cookie ne sert à rien !!!
				setcookie("remember_me", $user['token'], strtotime("+ 6 months"), "/");
				header("Location: user");
			}
			else {
				//on garde ça vague pour ne pas donner d'infos aux méchants
				$error = "Wrong username or email !";
			}

		}

		$data = [
			"error" => $error
		];
		View::show("login.php", "Website | User Home", $data);
	}

	public function register()
	{
		//traitement du formulaire d'inscription
		//appelle le usermanager pour les requetes SQL

		$errors = [];

		if (!empty($_POST)){
			//attention aux XSS ici
			$userManager = new \Model\Manager\UserManager();

			$username = strip_tags($_POST['username']);
			$email = strip_tags($_POST['email']);
			$plainPassword = $_POST['password'];
			$passwordBis = $_POST['password_bis'];

			//tous les champs sont requis
			if (empty($username) || empty($email) || empty($plainPassword) || empty($passwordBis)){
				$errors[] = "Veuillez remplir tous les champs.";
			}

			//s'assurer que les 2 mdp concordent
			if ($plainPassword != $passwordBis){
				$errors[] = "les mdps ne concordent pas";
			}

			//email avec filter_var($email, FILTER_VALIDATE_EMAIL);
			if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
				$errors[] = "Votre email n'est pas valide";
			}

			//vérifie que l'email n'existe pas déjà
			$checkEmail = $userManager->checkEmail($email);

			if ($checkEmail){
				$errors[] = "Cet email est déjà enregistré ici !";
			}

			//vérifie que le username n'existe pas déjà
			$checkUsername = $userManager->checkUsername($username);

			if ($checkUsername){
				$errors[] = "Ce pseudo est déjà enregistré ici !";
			}

			// si il n'y a pas d'erreurs, on continue
			if (empty($errors)){

				//hache le mdp
				$passwordHash = password_hash($plainPassword, PASSWORD_DEFAULT);

				//rôle par défaut
				$role = "user";

				//génère une chaîne réellement aléatoire
				//voir https://github.com/ircmaxell/RandomLib
				//utiliser random_bytes() en PHP7
				$factory = new \RandomLib\Factory;
				$generator = $factory->getGenerator(new \SecurityLib\Strength(\SecurityLib\Strength::MEDIUM));
				$token = $generator->generateString(50, '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ');

				//requête d'insertion en bdd
				$addUser = $userManager->addUser($username,$email,$passwordHash,$token,$role);
				//si la requête passe bien...
				if ($addUser){

					//on pourrait aussi directement connecter l'utilisateur ici
					//redirige sur l'accueil
					header("Location: login");
				}
				else {
					$errors[] = "Oups ! Une erreur est survenue !";
				}
			}
		} //ENDIF $_POST
		$datas = [
			"errors" => $errors
		];
		View::show("register.php", "Website | Register", $datas);
	}

	public function logout()
	{
		//efface la donnée qui permet d'identifier l'utilisateur
		unset($_SESSION['user']);
		//redirige ailleurs
		header("Location: home");
	}

	/**
	 * Affiche la page d'erreur 404
	 */
	public function error404()
	{
		//envoie une entête 404 (pour notifier les clients que ça a foiré)
		header("HTTP/1.0 404 Not Found");
		View::show("errors/404.php", "Website | 404");
	}

}
