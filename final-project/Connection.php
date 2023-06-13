<?php

  // 時間設定
  date_default_timezone_set('Asia/Taipei');
  
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
        // echo "Connected successfully";
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

    // 新增筆記
    public function addNote($note)
    {
      $mySqlRequest = "INSERT INTO note (`title`, `description`, `created_date`) VALUES(:title, :description, :date) ";
      $statement = $this->pdo->prepare($mySqlRequest);
      $statement->bindValue('title', $note['title']);
      $statement->bindValue('description', $note['description']);
      $statement->bindValue('date', date('Y-m-d H:i:s'));
      return $statement->execute();
    }

    // 刪除筆記
    public function removeNote($id)
    {
      // 變數前面寫一個分號
      $sql = "DELETE FROM note WHERE `id` = :id";
      $statement = $this->pdo->prepare($sql);
      $statement->bindValue('id', $id);
      return $statement->execute();
    }

    // 取得單一筆記
    public function getNoteById($id)
    {
      $sql = "SELECT * FROM note WHERE id = :id";
      $statement = $this->pdo->prepare($sql);
      $statement->bindValue('id', $id);
      $statement->execute();
      // PDO::FETCH_ASSOC 回傳陣列檔案的意思
      // 如果輸入不存在的id 抓不到資料則回傳給他空值
      return $statement->fetch(PDO::FETCH_ASSOC) ?: [
        'id' => '',
        'title' => '',
        'description' => ''
      ];
    }

    // 更新筆記
    public function updateNote($id, $note)
    {
      $sql = "UPDATE note set title = :title, description = :description WHERE id = :id";
      $statement = $this->pdo->prepare($sql);
      $statement->bindValue('id', $id);
      $statement->bindValue('title', $note['title']);
      $statement->bindValue('description', $note['description']);
      return $statement->execute();
    }

  }

  return new Connection();