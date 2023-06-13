<?php

// echo "this is save.php";

// superglobals
// 印出來查看
// echo '<pre>', print_r($_POST), '</pre>';

$connection = require_once './Connection.php';


// 如果POST 是空給他一個空值
$id = $_POST['id'] ?? "";

// 判斷他是要新增還是更新
if ($id) {
  $connection->updateNote($id, $_POST);
} else {
  // $_POST 用超級函數取得傳送來的資料
  $connection->addNote($_POST);
}

// 轉址
header('Location: index.php');