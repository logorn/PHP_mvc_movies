<?php

namespace Controller;

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

		if (!empty($_POST['genre'])) {
			$movies = $movieManager->findAllByGenre($_POST['genre'], $currentPage);
			$count = $movieManager->countAllByGenre($_POST['genre']);
		}
		elseif (!empty($_GET['genre'])) {
			$movies = $movieManager->findAllByGenre($_GET['genre'], $currentPage);
			$count = $movieManager->countAllByGenre($_GET['genre']);
		}
		elseif (!empty($_POST['keyword'])) {
			$movies = $movieManager->findAllByKeyword($_POST['keyword']);
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
	public function adminHome()
	{
		View::show("adminHome.php", "Website | Admin Home");
	}
	public function userHome()
	{
		View::show("userHome.php", "Website | User Home");
	}

	/**
	 * Affiche la page d'erreur 404
	 */
	public function error404()
	{
		//envoie une entête 404 (pour notifier les clients que ça a foiré)
		header("HTTP/1.0 404 Not Found");
		View::show("errors/404.php", "Oups ! Perdu ?");
	}

	public function register()
	{
		//traitement du formulaire d'inscription
		//appelle le usermanager pour les requetes SQL
		//affichage du formulaire

	}

	public function login()
	{
		//traitement du formulaire de connexion
		//appelle le usermanager pour les requetes sql
		//affichage du formulaire

	}

	public function logout()
	{
		//deconnexion
		//redirection

	}
}
