
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
// ログイン済みの場合


$result = $pdo -> query('SELECT * FROM myroppou');

foreach($result as $row) {
  if($row['recognize'] == $_SESSION['id']) {
    if($row['title'] != "") {
      echo $row['title']."<br>";
    }
    if($row['one'] != "") {
      echo $row['one']."<br>";
    }
    if($row['two'] != "") {
      echo $row['two']."<br>";
    }
    if($row['three'] != "") {
      echo $row['three']."<br>";
    }
    if($row['four'] != "") {
      echo $row['four']."<br>";
    }
    if($row['five'] != "") {
      echo $row['five']."<br>";
    }
    if($row['six'] != "") {
      echo $row['six']."<br>";
    }
    if($row['seven'] != "") {
      echo $row['seven']."<br>";
    }
    if($row['eight'] != "") {
      echo $row['eight']."<br>";
    }
    if($row['nine'] != "") {
      echo $row['nine']."<br>";
    }
    if($row['ten'] != "") {
      echo $row['ten']."<br>";
    }
    if($row['eleven'] != "") {
      echo $row['eleven']."<br>";
    }
    if($row['twelve'] != "") {
      echo $row['twelve']."<br>";
    }
    if($row['thirteen'] != "") {
      echo $row['thirteen']."<br>";
    }
    if($row['fourteen'] != "") {
      echo $row['fourteen']."<br>";
    }
    if($row['fifteen'] != "") {
      echo $row['fifteen']."<br>";
    }
    if($row['sixteen'] != "") {
      echo $row['sixteen']."<br>";
    }
    if($row['seventeen'] != "") {
      echo $row['seventeen']."<br>";
    }
    if($row['eighteen'] != "") {
      echo $row['eighteen']."<br>";
    }
    if($row['title'] != "") {
      echo "<hr>";
    }
  }
}
?>
<html lang="ja">
<head>
  <meata charset="utf-8">
  <title>大学生のための六法全書/List</title>
  <meta name="description" content="指定の法令だけを登録、保存できるWebサービスです。">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="styles.css">
  <link rel="apple-touch-icon" href="">
  <link rel="icon" sizes="192*192" href="">
</head>
<body>


<a href="search.php">検索ページへ</a>


</body>
</html>