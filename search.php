<?php

require_once('config.php');

try{
  $pdo = new PDO(DSN, DB_USER, DB_PASS, DRIVER_OPT);
  // echo "接続おけ  <br>";
} catch(PDOException $e) {
  // echo '接続エラー'.$e->getMessage();
}

session_start();

?>
<html lang="ja">
<head>
  <meata charset="utf-8">
  <title>大学生のための六法全書/Search</title>
  <meta name="description" content="指定の法令だけを登録、保存できるWebサービスです。">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="styles.css?v=4">
  <link rel="apple-touch-icon" href="">
  <link rel="icon" sizes="192*192" href="">
</head>
<body>
  <div class="one">
    <h1>Compendium Of Laws</h1>
    <h2>For University Student</h2>
  </div>

  <div class="mainText-search">
    <p class="newRegister">―Search―</p>
    <div class="two">
      <form action="register.php" method="post">
      <select class="select" name="lawName">
      <!-- ―――――――更新―――――――― -->
      <!-- ―――――――更新―――――――― -->
      <!-- ―――――――更新―――――――― -->
        <option value="minpou">民法</option>
        <option value="keiho">刑法</option>
        <option value="minso">民訴</option>
        <option value="keiso">刑訴</option>
      </select><br>
      第<input type="num" name="title">条<br>
      <?php echo $error; ?>
      　<input type="num" name="paragraph">項<br>
      　<input type="num" name="item">号<br>
      <input  class="btn-border" type="submit" value="Let's search it!">
      </form>
    </div>
  </div>
<hr>
  <a href="list.php">一覧ページへ</a>


</body>
</html>
