<?php

  $connection = require_once './Connection.php';

  $notes = $connection->getNotes();

  // var_dump($notes);
  // 覺得不好看可以改成 <pre>
  // echo '<pre>', print_r($notes), '</pre>';

  // 建立一個變數儲存目前的筆記
  $currentNote = [
    'id' => '',
    'title' => '',
    'description' => ''
  ];
  // echo '<pre>', print_r($_GET), '</pre>';

  // 如果該變數存在則去資料庫撈資料並用此id去撈，並更新回當前筆記
  if (isset($_GET['id'])) {
    // 會是一個陣列
    $currentNote = $connection->getNoteById($_GET['id']);
  }

  // 檢查是否正確執行
  // echo '<pre>', print_r($currentNote), '</pre>';
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
      <input type="hidden" name="id" value="<?php echo $currentNote['id']; ?>">
      <input type="text" name="title" placeholder="Note title" autocomplete="off" value="<?php echo $currentNote['title']; ?>">
      <textarea name="description" cols="30" rows="4" placeholder="Note Description"><?php echo $currentNote['description']; ?></textarea>
      <button>
        <?php if($currentNote['id']): ?>
          更新筆記
        <?php else: ?>
          新增筆記
        <?php endif; ?>
      </button>
    </form>

    <div class="notes">

      <?php foreach($notes as $note): ?>
      <div class="note">
        <div class="title">
          <!-- 用問號可以把它存在superGlobals裏面 -->
          <a href="?id=<?php echo $note['id']; ?>"><?php echo $note['title']; ?></a>
        </div>
        <div class="description">
          <?php echo $note['description']; ?>
        </div>
        <small><?php echo $note['created_date']; ?></small>
        <form action="delete.php" method="post">
          <input type="hidden" name="id" value="<?php echo $note['id'];?>">
          <button class="close">X</button>
        </form>
      </div>
      <?php endforeach; ?>

    </div>
  </div>

</body>
</html>