<?php

namespace Model\Manager;

use Model\Db;
use PDO;

/**
 * Contient toutes les méthodes faisant des requêtes à la base de données
 */
class MovieManager
{

    public function findAll() {
      $sql = "SELECT *
              FROM movies
              ORDER BY votes DESC

              ;";
              //LIMIT 0,8
      $dbh = Db::getDbh();

      $stmt = $dbh->prepare($sql);
      $stmt->execute();
      $results = $stmt->fetchAll(PDO::FETCH_CLASS, '\Model\Entity\Movie');

      return $results;

    }

    public function findOne($id) {
      $sql = "SELECT *
              FROM movies
              WHERE id = :id;";

      $dbh = Db::getDbh();
      $stmt = $dbh->prepare($sql);

      $stmt->bindValue(":id", $id);

      $stmt->execute();
      $result = $stmt->fetchObject('\Model\Entity\Movie');
      return $result;

    }

    public function findAllByGenre($genre) {
      $sql = "SELECT *
              FROM movies
              INNER JOIN movies_genres ON movies.id = movies_genres.movieId
              INNER JOIN genres ON genres.id = movies_genres.genreId
              WHERE genres.name = :genre;";

      $dbh = Db::getDbh();
      $stmt = $dbh->prepare($sql);

      $stmt->bindValue(":genre", $genre);

      $stmt->execute();
      $results = $stmt->fetchAll(PDO::FETCH_CLASS, '\Model\Entity\Movie');
      return $results;

    }

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

    public function delOne($id) {
      $sql = "DELETE
              FROM posts
              WHERE id = :id;";

      $dbh = Db::getDbh();
      $stmt = $dbh->prepare($sql);

      $stmt->bindValue(":id", $id);

      $stmt->execute();

    }

    public function addOne(\Model\Entity\Post $post) {
      // on prépare notre requête SQL
      $sql = "INSERT INTO posts(title,
                                content,
                                image,
                                dateCreated)
                     VALUES (:title,:content, :image,NOW());";

      $dbh = Db::getDbh();
      $stmt = $dbh->prepare($sql);

      $stmt->bindValue(":title", $post->getTitle());
      $stmt->bindValue(":content", $post->getContent());
      $stmt->bindValue(":image", $post->getImage());

      $stmt->execute();
    }

    public function editOne(\Model\Entity\Post $post) {
      // on prépare notre requête SQL
      $sql = "UPDATE posts SET title= :title,
                              content= :content,
                              dateCreated= :dateCreated
                              WHERE id = :id;";

      $dbh = Db::getDbh();
      $stmt = $dbh->prepare($sql);

      $stmt->bindValue(":title", $post->getTitle());
      $stmt->bindValue(":content", $post->getContent());
      $stmt->bindValue(":dateCreated", $post->getDateCreated());
      $stmt->bindValue(":id", $post->getId());

      $stmt->execute();
    }

}
