<?php

// echo "this is save.php";

// superglobals
// 印出來查看
// echo '<pre>', print_r($_POST), '</pre>';

$connection = require_once './Connection.php';

// $_POST 用超級函數取得傳送來的資料
$connection->addNote($_POST);

// 轉址
header('Location: index.php');