<?php

class Database  {
  private $pdo;
  private $response;
  private $host = 'localhost';
  private $database = 'dreamstore';
  private $username = 'root';
  private $password = 'root';

  public function __construct()  {
    try {
      $this->pdo = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->database, $this->username, $this->password);
      $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $e) {
      die('Błąd połączenia: ' . $e->getMessage());
    }
  }

  public function getPDO() {
      return $this->pdo;
  }

  public function getResponse() {
    return $this->response;
  }
}
