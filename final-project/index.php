<?php

  $connection = require_once './Connection.php';

  $notes = $connection->getNotes();

  // var_dump($notes);
  // 覺得不好看可以改成 <pre>
  // echo '<pre>', print_r($notes), '</pre>';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>記事本</title>
  <link rel="stylesheet" href="app.css">
</head>
<body>

  <div>
    <form class="new-note" action="save.php" method="post">
      <input type="hidden" name="id" value="">
      <input type="text" name="title" placeholder="Note title" autocomplete="off" value="">
      <textarea name="description" cols="30" rows="4" placeholder="Note Description"></textarea>
      <button>
        新增筆記
      </button>
    </form>
    <div class="notes">
      <div class="note">
        <div class="title">
          <a href="#">This is post title</a>
        </div>
        <div class="description">
          This is description
        </div>
        <small>2021-05-31</small>
        <form action="delete.php" method="post">
          <input type="hidden" name="id" value="">
          <button class="close">X</button>
        </form>
      </div>
      <div class="note">
        <div class="title">
          <a href="#">This is post title2</a>
        </div>
        <div class="description">
          This is description
        </div>
        <small>2031-05-31</small>
        <form action="delete.php" method="post">
          <input type="hidden" name="id" value="">
          <button class="close">X</button>
        </form>
      </div>
    </div>
  </div>

</body>
</html>