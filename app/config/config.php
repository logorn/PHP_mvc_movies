<?php

	//url racine du site. Sert à générer des URLs absolues
	const BASE_URL 		= "http://test/mvc-movies/"; 	//adresse complète menant à index.php. Modifier CHEMIN ! Utile pour tous les liens dans le HTML.
	const UPLOAD_DIR 	= __DIR__ . "/../../public/uploads/";	//chemin menant au dossier d'upload

	//infos de connexion à la db
	const DB_HOST = "localhost";
	const DB_NAME = "movies";
	const DB_USER = "tele";
	const DB_PASS = "tele";
