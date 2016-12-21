<?php

namespace Model\Manager;

use Model\Db;
use PDO;

/**
 * Contient toutes les méthodes faisant des requêtes à la base de données
 */
class GenreManager
{
    public function findOneGenre($id) {
      $sql = "SELECT GROUP_CONCAT(`name`) AS genre
              FROM movies_genres
              INNER JOIN genres ON genres.id = movies_genres.genreid
              INNER JOIN movies ON movies.id = movies_genres.movieid
              WHERE movies.id = :id;";

      $dbh = Db::getDbh();
      $stmt = $dbh->prepare($sql);

      $stmt->bindValue(":id", $id);

      $stmt->execute();
      $result = $stmt->fetchObject('\Model\Entity\Genre');

      return $result;

    }

    public function findAllGenre() {
      $sql = "SELECT GROUP_CONCAT(`name`) AS listeGenres FROM genres";

      $dbh = Db::getDbh();
      $stmt = $dbh->prepare($sql);

      $stmt->execute();
      $result = $stmt->fetchObject('\Model\Entity\Genre');

      return $result;

    }
    
}
