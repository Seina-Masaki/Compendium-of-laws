
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

function lawvalue($lawstr) {
  $pdo = new PDO(DSN, DB_USER, DB_PASS);
  $result = $pdo -> query("SELECT * FROM myroppou WHERE lawName ='" . $lawstr . "' ");
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
}

?>
<html lang="ja">
<head>
  <meata charset="utf-8">
  <title>大学生のための六法全書/List</title>
  <meta name="description" content="指定の法令だけを登録、保存できるWebサービスです。">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="styles.css?v=12">
  <link rel="apple-touch-icon" href="">
  <link rel="icon" sizes="192*192" href="">
  <script src="js/jquery-3.5.1.min.js"></script>
</head>
<body>

<script>
  $(function() {
  let tabs = $(".tab"); // tabのクラスを全て取得し、変数tabsに配列で定義
  $(".tab").on("click", function() { // tabをクリックしたらイベント発火
    $(".active").removeClass("active"); // activeクラスを消す
    $(this).addClass("active"); // クリックした箇所にactiveクラスを追加
    const index = tabs.index(this); // クリックした箇所がタブの何番目か判定し、定数indexとして定義
    $(".content").removeClass("show").eq(index).addClass("show"); // showクラスを消して、contentクラスのindex番目にshowクラスを追加
  })
})
</script>

<div class="one">
  <h1>Compendium Of Laws</h1>
  <h2>For University Student</h2>
</div>

<div class="tab-area">
  <div class="tab active">
    民法
  </div>
  <div class="tab">
    (刑法)
  </div>
  <div class="tab">
    (憲法)
  </div>
  <div class="tab">
    (民訴)
  </div>
  <div class="tab">
    (刑訴)
  </div>
</div>
<div class="content-area">
  <div class="content show">
    <?php
    lawvalue('民法');
    ?>
  </div>
  <div class="content">
    
  </div>
  <div class="content">
    
  </div>
  <div class="content">
    
  </div>
  <div class="content">
    
  </div>
</div>


<a href="search.php">検索ページへ</a>

</body>
</html>
