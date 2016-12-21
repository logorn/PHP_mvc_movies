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
		$movieManager = new \Model\Manager\MovieManager();
		$genreManager = new \Model\Manager\GenreManager();
		$genres = $genreManager->findAllGenre();
		$genres = explode(",", $genres->getListeGenres());
		if (!empty($_POST['genre'])) {
			$movies = $movieManager->findAllByGenre($_POST['genre']);
		}
		elseif (!empty($_POST['keyword'])) {
			$movies = $movieManager->findAllByKeyword($_POST['keyword']);
		}
		else {
			$movies = $movieManager->findAll();
		}
		View::show("home.php", "Website | Home", ["movies" => $movies], ["genres" => $genres]);
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
}
