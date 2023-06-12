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

    // 讀取資料
    public function getNotes()
    {
      // 寫原生
      $mySqlRequest = "SELECT *  FROM note ORDER BY created_date DESC";
      // 執行它
      $statement = $this->pdo->prepare($mySqlRequest);
      $statement->execute();

      return $statement->fetchAll(PDO::FETCH_ASSOC);
      // FETCH_ASSOC 回傳 array
    }

  }

  return new Connection();