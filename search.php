<?php

require_once('config.php');

try{
  $pdo = new PDO(DSN, DB_USER, DB_PASS);
  // echo "接続おけ  <br>";
} catch(PDOException $e) {
  // echo '接続エラー'.$e->getMessage();
}

session_start();
// echo $_SESSION['id'];

if(preg_match("/の/",$_POST["title"])){
  $title = "第" . $_POST["title"];
} else {
  $title = "第" . $_POST["title"] . "条";
}
$paragraph = $_POST["paragraph"] . "項";
$item = $_POST["item"] . "号";

// データベースに接続するテーブルを定義
$lawName = $_POST["lawName"];

  // 条数・項数・号数を指定
  if(!empty($_POST["title"]) && !empty($_POST["paragraph"]) && !empty($_POST["item"])) {
  $stmt = $pdo -> prepare("SELECT * FROM $lawName WHERE title LIKE '%" . $title . "%' ");
  $stmt -> execute();
  // 条数・項数を指定
  } elseif(!empty($_POST["title"]) && !empty($_POST["paragraph"])) {
  $stmt = $pdo -> prepare("SELECT * FROM $lawName WHERE title LIKE '%" . $title . "%' ");
  $stmt -> execute();
  // 条数を指定
  } elseif(!empty($_POST["title"])) {
  $stmt = $pdo -> prepare("SELECT * FROM $lawName WHERE title LIKE '%" . $title . "%' ");
  $stmt -> execute();
  } 
// }


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
      第<input type="text" name="title" placeholder="五百十一">条<br>
      <?php echo $error; ?>
      　<input type="text" name="paragraph" placeholder="(全角数字)２">項<br>
      　<input type="text" name="item" placeholder="(漢数字)三">号<br>
      <input  class="btn-border" type="submit" value="Let's search it!">
      </form>
    </div>
  </div>
<hr>
  <a href="list.php">一覧ページへ</a>


</body>
</html>

