<?php

namespace Model\Manager;

use Model\Db;
use PDO;

/**
 * Contient toutes les méthodes faisant des requêtes à la base de données
 */
class UserManager
{
  public function searchUser($usernameOrEmail) {
    $sql = "SELECT * FROM users
        WHERE username = :usernameOrEmail
        OR email = :usernameOrEmail";

    $dbh = Db::getDbh();
    $stmt = $dbh->prepare($sql);
    $stmt->bindValue(":usernameOrEmail", $usernameOrEmail);
    $stmt->execute();
    $result = $stmt->fetch();

    return $result;
  }

  public function checkEmail($email) {
    $sql = "SELECT id FROM users WHERE email = :email";

    $dbh = Db::getDbh();
    $stmt = $dbh->prepare($sql);
    $stmt->bindValue(":email", $email);
    $stmt->execute();
    $result = $stmt->fetch();

    return $result;
  }

  public function checkUsername($username) {
    $sql = "SELECT id FROM users WHERE username = :username";

    $dbh = Db::getDbh();
    $stmt = $dbh->prepare($sql);
    $stmt->bindValue(":username", $username);
    $stmt->execute();
    $result = $stmt->fetch();

    return $result;
  }

  public function addUser($username,$email,$passwordHash,$token,$role) {

    $sql = "INSERT INTO users (id, username, email, password, token, role, dateRegistered)
     VALUES (NULL,:username,:email,:password,:token,:role, NOW())";

    $dbh = Db::getDbh();
    $stmt = $dbh->prepare($sql);

    $stmt->bindValue(":username", $username);
    $stmt->bindValue(":email", $email);
    $stmt->bindValue(":password", $passwordHash);
    $stmt->bindValue(":token", $token);
    $stmt->bindValue(":role", $role);
    $result = $stmt->execute();

    return $result;


  }

  public function setUserWatchlist($watchlist,$userId) {

    $sql = "UPDATE users
           SET watchlist = :watchlist
           WHERE id = :id
           ;";

    $dbh = Db::getDbh();
    $stmt = $dbh->prepare($sql);

    $stmt->bindValue(":id", $userId);
    $stmt->bindValue(":watchlist", $watchlist);

    $result = $stmt->execute();

    return $result;


  }

}
