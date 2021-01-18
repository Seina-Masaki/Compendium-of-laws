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

if(!empty($_POST["paragraph"])) {
  $_POST["paragraph"] = mb_convert_kana($_POST["paragraph"], "N");
}

if(preg_match("/の/",$_POST["title"])){
  $title = "第" . $_POST["title"];
} else {
  $title = "第" . $_POST["title"] . "条";
}
$paragraph = $_POST["paragraph"] . "項";
$item = $_POST["item"] . "号";

// if(is_numeric($_POST["title"])) {
  //   $error = "漢数字で入力してください。" . "<br>";
  // 条数・項数・号数を指定
  if(!empty($_POST["title"]) && !empty($_POST["paragraph"]) && !empty($_POST["item"])) {
  $stmt = $pdo -> prepare("SELECT * FROM minpou WHERE title LIKE '%" . $title . "%' ");
  $stmt -> execute();
  // 条数・項数を指定
  } elseif(!empty($_POST["title"]) && !empty($_POST["paragraph"])) {
  $stmt = $pdo -> prepare("SELECT * FROM minpou WHERE title LIKE '%" . $title . "%' ");
  $stmt -> execute();
  // 条数を指定
  } elseif(!empty($_POST["title"])) {
  $stmt = $pdo -> prepare("SELECT * FROM minpou WHERE title LIKE '%" . $title . "%' ");
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
  <link rel="stylesheet" href="styles.css">
  <link rel="apple-touch-icon" href="">
  <link rel="icon" sizes="192*192" href="">
</head>
<body>

<form action="register.php" method="post">
  <p>―Search―</p>
  第<input type="text" name="title" placeholder="五百十一">条<br>
  <?php echo $error; ?>
  　<input type="text" name="paragraph" placeholder="(全角数字)２">項<br>
  　<input type="text" name="item" placeholder="(漢数字)三">号<br>
  <input type="submit" value="検索する">

</form>


</body>
</html>
