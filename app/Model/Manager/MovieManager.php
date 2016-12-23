<?php

namespace Model\Manager;

use Model\Db;
use PDO;

/**
 * Contient toutes les méthodes faisant des requêtes à la base de données
 */
class MovieManager
{

  public function addOne($movie) {
    // on prépare notre requête SQL
    $dbh = Db::getDbh();

    $sql = "INSERT INTO `movies` (`imdbId`, `title`, `year`, `cast`,
                                  `directors`, `writers`, `plot`, `runtime`,
                                  `trailerUrl`, `dateCreated`, `dateModified`)
                   VALUES ( :imdbId, :title, :year, :cast, :directors, :writers,
                                 :plot, :runtime, :trailerUrl, NOW(), NOW())";

    $stmt = $dbh->prepare($sql);

    $stmt->bindValue(":imdbId", $movie->getImdbId());
    $stmt->bindValue(":title", $movie->getTitle());
    $stmt->bindValue(":year", $movie->getYear());
    $stmt->bindValue(":cast", $movie->getCast());
    $stmt->bindValue(":directors", $movie->getDirectors());
    $stmt->bindValue(":writers", $movie->getWriters());
    $stmt->bindValue(":plot", $movie->getPlot());
    $stmt->bindValue(":runtime", $movie->getRuntime());
    $stmt->bindValue(":trailerUrl", $movie->getTrailerUrl());

    $stmt->execute();
    }

    public function addOneGenre($movieId,$genreId) {
      $dbh = Db::getDbh();

      $sql = "INSERT INTO `movies_genres` (`movieId`, `genreId`)
                     VALUES (:movieId, :genreId);";

      $stmt = $dbh->prepare($sql);

      $stmt->bindValue(":movieId", $movieId);
      $stmt->bindValue(":genreId", $genreId);

      $stmt->execute();

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

    public function findAll($page) {
      $numPerPage = 8;
      $offset = ($page-1) * $numPerPage;

      $sql = "SELECT *
              FROM movies
              ORDER BY rating DESC
              LIMIT $numPerPage
              OFFSET $offset;";

      $dbh = Db::getDbh();

      $stmt = $dbh->prepare($sql);

      $stmt->execute();
      $results = $stmt->fetchAll(PDO::FETCH_CLASS, '\Model\Entity\Movie');

      return $results;

    }

    public function countAll() {
      $sql = "SELECT COUNT(*)
              FROM movies;";

      $dbh = Db::getDbh();

      $stmt = $dbh->prepare($sql);

      $stmt->execute();
      $result = $stmt->fetchColumn();

      return $result;

    }

    public function countAllByGenre($genre) {
      $sql = "SELECT COUNT(*)
              FROM movies m
              INNER JOIN movies_genres ON m.id = movies_genres.movieId
              INNER JOIN genres g ON g.id = movies_genres.genreId
              WHERE g.name = :genre";

      $dbh = Db::getDbh();

      $stmt = $dbh->prepare($sql);
      $stmt->bindValue(":genre", $genre);

      $stmt->execute();
      $result = $stmt->fetchColumn();

      return $result;

    }

    public function countAllByKeyword($keyword) {
      $sql = "SELECT COUNT(*)
              FROM movies m
              WHERE m.title LIKE :keyword
              OR m.year LIKE :keyword
              OR m.cast LIKE :keyword
              OR m.plot LIKE :keyword
              OR m.writers LIKE :keyword
              OR m.directors LIKE :keyword
              OR m.runtime LIKE :keyword;";

      $dbh = Db::getDbh();

      $stmt = $dbh->prepare($sql);
      $stmt->bindValue(":keyword", $keyword);

      $stmt->execute();
      $result = $stmt->fetchColumn();

      return $result;

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

    public function findIdByTitle($name) {
      $sql = "SELECT id
              FROM movies
              WHERE title = :title;";

      $dbh = Db::getDbh();
      $stmt = $dbh->prepare($sql);

      $stmt->bindValue(":title", $name);

      $stmt->execute();
      $result = $stmt->fetch();
      return $result;

    }

    public function findOneTitle($id) {
      $sql = "SELECT title
              FROM movies
              WHERE id = :id;";

      $dbh = Db::getDbh();
      $stmt = $dbh->prepare($sql);

      $stmt->bindValue(":id", $id);

      $stmt->execute();
      $result = $stmt->fetch();
      return $result;

    }

    public function findAllByGenre($genre,$page) {
      $numPerPage = 8;
      $offset = ($page-1) * $numPerPage;

      $sql = "SELECT g.id AS genreId, m.id, m.imdbId, m.title
              FROM movies m
              INNER JOIN movies_genres ON m.id = movies_genres.movieId
              INNER JOIN genres g ON g.id = movies_genres.genreId
              WHERE g.name = :genre
              ORDER BY rating DESC
              LIMIT $numPerPage
              OFFSET $offset;";

      $dbh = Db::getDbh();
      $stmt = $dbh->prepare($sql);

      $stmt->bindValue(":genre", $genre);

      $stmt->execute();
      $results = $stmt->fetchAll(PDO::FETCH_CLASS, '\Model\Entity\Movie');
      return $results;

    }

    public function findAllByKeyword($keyword,$page) {
      $numPerPage = 8;
      $offset = ($page-1) * $numPerPage;
      $keyword = "%$keyword%";
      $sql = "SELECT *
              FROM movies
              WHERE title LIKE :keyword
              OR year LIKE :keyword
              OR cast LIKE :keyword
              OR plot LIKE :keyword
              OR writers LIKE :keyword
              OR directors LIKE :keyword
              OR runtime LIKE :keyword
              ORDER BY rating DESC
              LIMIT $numPerPage
              OFFSET $offset;";

      $dbh = Db::getDbh();
      $stmt = $dbh->prepare($sql);

      $stmt->bindValue(":keyword", $keyword);

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

}
