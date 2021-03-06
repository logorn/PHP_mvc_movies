<?php

	//notre table de correspondance entre les urls et les fonctions
	//de contrôleur à appeler

	//la clef (à gauche) est l'URL qui sera comparée avec l'URL de la requête.
	//si l'URL correspond, la méthode de contrôleur (la valeur, à droite), sera appelée par le Dispatcher

	//les routes peuvent ressembler à ce que vous voulez, mais commencent toutes par / :
	/*
		"/articles/" 		=> "showPost",
		"/articles/detail/" => "showPostDetail",
		"/admin/"			=> "adminHome",
		"/admin/users/add/" => "addUser",
	*/

	$routes = [
		"/" => "home", 								// accueil du site
		"/home" => "home", 						// accueil du site
		"/movie/detail" => "detail", 	// détails sur un film selectionné
		"/user" => "userHome", 				// panneau user (affiche la watchlist)
		"/admin" => "adminHome", 				// panneau admin (CRUD movies)
		"/login" => "login", 					// user login page
		"/logout" => "logout", 				// user logout page
		"/register" => "register" 		// user register page
	];
