<?php 

// 先印出來看
// echo '<pre>', print_r($_POST), '</pre>';

// 引入檔案
$connection = require_once './Connection.php';
// 使用函式
$connection->removeNote($_POST['id']);

// 轉址
header('Location: index.php');