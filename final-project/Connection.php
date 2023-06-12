<?php

  class Connection
  {
    public PDO $pdo;

    public function __construct()
    {
      $servername = 'localhost';
      $dbname = "2023-hiskio-php-note-app";
      $username = "root";
      $password = "root";

      try {
        $this->pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

        // set the PDO error mode to exception
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "Connected successfully";
      } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
      }
    }

  }

  return new Connection();