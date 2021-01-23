<?php

// データベース接続
require_once('config.php');

try{
  $pdo = new PDO(DSN, DB_USER, DB_PASS, DRIVER_OPT);
  // echo "接続おけ  <br>";
} catch(PDOException $e) {
  // echo '接続エラー'.$e->getMessage();
}

session_start();

function kansujiEncoding ($num)
{
    $num     = (int)$num;
    $kansuji = '';

    if ($num === 0) {
        return '零';
    }

    $valueNum = strlen($num);
    $whileNum = 0;

    while ($valueNum) {
        $whileNum++;

        // 桁
        switch ($whileNum) {
        case 2:
            $kansuji = '十' . $kansuji;
            break;
        case 3:
            $kansuji = '百' . $kansuji;
            break;
        case 4:
            $kansuji = '千' . $kansuji;
            break;
        case 5:
            $kansuji = '万' . $kansuji;
            break;
        case 6:
            $kansuji = '十' . $kansuji;
            break;
        case 7:
            $kansuji = '百' . $kansuji;
            break;
        case 8:
            $kansuji = '千' . $kansuji;
            break;
        case 9:
            $kansuji = '億' . $kansuji;
            break;
        case 10:
            return 'むりぽ';
            break;
        }

        $substrNum = (int)mb_substr($num, $valueNum -1, 1);

        if ($substrNum === 1 && $whileNum === 1) {
            $kansuji = '一';
        }

        // 数
        switch ($substrNum) {
        case 2:
            $kansuji = '二' . $kansuji;
            break;
        case 3:
            $kansuji = '三' . $kansuji;
            break;
        case 4:
            $kansuji = '四' . $kansuji;
            break;
        case 5:
            $kansuji = '五' . $kansuji;
            break;
        case 6:
            $kansuji = '六' . $kansuji;
            break;
        case 7:
            $kansuji = '七' . $kansuji;
            break;
        case 8:
            $kansuji = '八' . $kansuji;
            break;
        case 9:
            $kansuji = '九' . $kansuji;
            break;
        }

        $valueNum--;
    }

    return $kansuji;
}

$lawName = $_POST["lawName"];
$title = "第" . kansujiEncoding($_POST["title"]) . "条";
$paragraph = mb_convert_kana($_POST["paragraph"], "N") . "項";
$item = kansujiEncoding($_POST["item"]) . "号";

// 条数・項数・号数を指定
if(!empty($_POST["title"]) && !empty($_POST["paragraph"]) && !empty($_POST["item"])) {
  $stmt = $pdo -> prepare("SELECT * FROM $lawName WHERE title LIKE '%" . $title . "%' ");
  $stmt -> execute();
  foreach($stmt as $row) {
    if($row["title"] != "") {
      // echo $row["title"] . "<br>";
      $text[] = $row["title"];
    }
    if($_POST["paragraph"] == "１") {
      // echo $row["sentence"] . "<br>";
      $text[] = $row["sentence"];
    } 
    if(preg_match("/２項/", $paragraph)) {
      // echo $row["paragraphSentence_two"];
      $text[] = $row["paragraphSentence_two"];
    }
    if(preg_match("/３項/", $paragraph)) {
      // echo $row["paragraphSentence_three"];
      $text[] = $row["paragraphSentence_three"];
    }
    if(preg_match("/４項/", $paragraph)) {
      // echo $row["paragraphSentence_four"];
      $text[] = $row["paragraphSentence_four"];
    }
    if(preg_match("/５項/", $paragraph)) {
      // echo $row["paragraphSentence_five"];
      $text[] = $row["paragraphSentence_five"];
    }
    if(preg_match("/６項/", $paragraph)) {
      // echo $row["paragraphSentence_six"];
      $text[] = $row["paragraphSentence_six"];
    }
    if(preg_match("/７項/", $paragraph)) {
      // echo $row["paragraphSentence_seven"];
      $text[] = $row["paragraphSentence_seven"];
    }
    if(preg_match("/８項/", $paragraph)) {
      // echo $row["paragraphSentence_eight"];
      $text[] = $row["paragraphSentence_eight"];
    }
    if(preg_match("/９項/", $paragraph)) {
      // echo $row["paragraphSentence_nine"];
      $text[] = $row["paragraphSentence_nine"];
    }
    if(preg_match("/１０項/", $paragraph)) {
      // echo $row["paragraphSentence_ten"];
      $text[] = $row["paragraphSentence_ten"];
    }
    if(preg_match("/一号/", $item)) {
      // echo $row["itemSentence_one"];
      $text[] = $row["itemSentence_one"];
    }
    if(preg_match("/二号/", $item)) {
      // echo $row["itemSentence_two"];
      $text[] = $row["itemSentence_two"];
    }
    if(preg_match("/三号/", $item)) {
      // echo $row["itemSentence_three"];
      $text[] = $row["itemSentence_three"];
    }
    if(preg_match("/四号/", $item)) {
      // echo $row["itemSentence_four"];
      $text[] = $row["itemSentence_four"];
    }
    if(preg_match("/五号/", $item)) {
      // echo $row["itemSentence_five"];
      $text[] = $row["itemSentence_five"];
    }
    if(preg_match("/六号/", $item)) {
      // echo $row["itemSentence_six"];
      $text[] = $row["itemSentence_six"];
    }
    if(preg_match("/七号/", $item)) {
      // echo $row["itemSentence_seven"];
      $text[] = $row["itemSentence_seven"];
    }
    if(preg_match("/八号/", $item)) {
      // echo $row["itemSentence_eight"];
      $text[] = $row["itemSentence_eight"];
    }
    if(preg_match("/九号/", $item)) {
      // echo $row["itemSentence_nine"];
      $text[] = $row["itemSentence_nine"];
    }
    if(preg_match("/十号/", $item)) {
      // echo $row["itemSentence_ten"];
      $text[] = $row["itemSentence_ten"];
    } 
  }
  $sentence = "以下の条文を追加しました。";
  // 条数・項数を指定
} elseif(!empty($_POST["title"]) && !empty($_POST["paragraph"])) {
  $stmt = $pdo -> prepare("SELECT * FROM $lawName WHERE title LIKE '%" . $title . "%' ");
  $stmt -> execute();
  foreach($stmt as $row) {
    if($row["title"] != "") {
      // echo $row["title"] . "<br>";
      $text[] = $row["title"];
    }
    if($_POST["paragraph"] == "１") {
      // echo $row["sentence"] . "<br>";
      $text[] = $row["sentence"];
    } 
    if(preg_match("/２項/", $paragraph)) {
      // echo $row["paragraphSentence_two"];
      $text[] = $row["paragraphSentence_two"];
    }
    if(preg_match("/３項/", $paragraph)) {
      // echo $row["paragraphSentence_three"];
      $text[] = $row["paragraphSentence_three"];
    }
    if(preg_match("/４項/", $paragraph)) {
      // echo $row["paragraphSentence_four"];
      $text[] = $row["paragraphSentence_four"];
    }
    if(preg_match("/５項/", $paragraph)) {
      // echo $row["paragraphSentence_five"];
      $text[] = $row["paragraphSentence_five"];
    }
    if(preg_match("/６項/", $paragraph)) {
      // echo $row["paragraphSentence_six"];
      $text[] = $row["paragraphSentence_six"];
    }
    if(preg_match("/７項/", $paragraph)) {
      // echo $row["paragraphSentence_seven"];
      $text[] = $row["paragraphSentence_seven"];
    }
    if(preg_match("/８項/", $paragraph)) {
      // echo $row["paragraphSentence_eight"];
      $text[] = $row["paragraphSentence_eight"];
    }
    if(preg_match("/９項/", $paragraph)) {
      // echo $row["paragraphSentence_nine"];
      $text[] = $row["paragraphSentence_nine"];
    }
    if(preg_match("/１０項/", $paragraph)) {
      // echo $row["paragraphSentence_ten"];
      $text[] = $row["paragraphSentence_ten"];
    } 
  }
  $sentence = "以上の条文を追加しました。";
  // 条数を指定
} elseif(!empty($_POST["title"])) {
  $stmt = $pdo -> prepare("SELECT * FROM $lawName WHERE title LIKE '%" . $title . "%' ");
  $stmt -> execute();
  foreach($stmt as $row) {
    if($row["title"] != "") {
      // echo $row["title"] . "<br>";
      $text[] = $row["title"];
    }
    if($row["sentence"] != "") {
      // echo $row["sentence"] . "<br>";
      $text[] = $row["sentence"];
    }
    if($row["paragraphSentence_two"] != "") {
      // echo $row["paragraphSentence_two"] . "<br>";
      $text[] = $row["paragraphSentence_two"];
    }
    if($row["paragraphSentence_three"] != "") {
      // echo $row["paragraphSentence_three"] . "<br>";
      $text[] = $row["paragraphSentence_three"];
    }
    if($row["paragraphSentence_four"] != "") {
      // echo $row["paragraphSentence_four"] . "<br>";
      $text[] = $row["paragraphSentence_four"];
    }
    if($row["paragraphSentence_five"] != "") {
      // echo $row["paragraphSentence_five"] . "<br>";
      $text[] = $row["paragraphSentence_five"];
    }
    if($row["paragraphSentence_six"] != "") {
      // echo $row["paragraphSentence_six"] . "<br>";
      $text[] = $row["paragraphSentence_six"];
    }
    if($row["paragraphSentence_seven"] != "") {
      // echo $row["paragraphSentence_seven"] . "<br>";
      $text[] = $row["paragraphSentence_seven"];
    }
    if($row["paragraphSentence_eight"] != "") {
      // echo $row["paragraphSentence_eight"] . "<br>";
      $text[] = $row["paragraphSentence_eight"];
    }
    if($row["paragraphSentence_nine"] != "") {
      // echo $row["paragraphSentence_nine"] . "<br>";
      $text[] = $row["paragraphSentence_nine"];
    }
    if($row["paragraphSentence_ten"] != "") {
      // echo $row["paragraphSentence_ten"] . "<br>";
      $text[] = $row["paragraphSentence_ten"];
    }
    if($row["itemSentence_one"] != "") {
      // echo $row["itemSentence_one"] . "<br>";
      $text[] = $row["itemSentence_one"];
    }
    if($row["itemSentence_two"] != "") {
      // echo $row["itemSentence_two"] . "<br>";
      $text[] = $row["itemSentence_two"];
    }
    if($row["itemSentence_three"] != "") {
      // echo $row["itemSentence_three"] . "<br>";
      $text[] = $row["itemSentence_three"];
    }
    if($row["itemSentence_four"] != "") {
      // echo $row["itemSentence_four"] . "<br>";
      $text[] = $row["itemSentence_four"];
    }
    if($row["itemSentence_five"] != "") {
      // echo $row["itemSentence_five"] . "<br>";
      $text[] = $row["itemSentence_five"];
    }
    if($row["itemSentence_six"] != "") {
      // echo $row["itemSentence_six"] . "<br>";
      $text[] = $row["itemSentence_six"];
    }
    if($row["itemSentence_seven"] != "") {
      // echo $row["itemSentence_seven"] . "<br>";
      $text[] = $row["itemSentence_seven"];
    }
    if($row["itemSentence_eight"] != "") {
      // echo $row["itemSentence_eight"] . "<br>";
      $text[] = $row["itemSentence_eight"];
    }
    if($row["itemSentence_nine"] != "") {
      // echo $row["itemSentence_nine"] . "<br>";
      $text[] = $row["itemSentence_nine"];
    }
    if($row["itemSentence_nine"] != "") {
      // echo $row["itemSentence_nine"] . "<br>";
      $text[] = $row["itemSentence_ten"];
    }
  }
  $sentence = "上記の条文を追加しました。";
} elseif(!empty($_POST["paragraph"]) && !empty($_POST["item"])) {
  $sentence = "条数が入力されていません";
} elseif(!empty($_POST["item"])) {
  $sentence = "条数または項数が入力されていません";
} elseif(empty($_POST["title"]) && empty($_POST["paragraph"]) && empty($_POST["item"]) && !empty($_POST["lawName"])) {
  $sentence = "正しく入力してください";
  var_dump($_POST["lawName"]);
}

// データベースに登録する法令を変数で定義
if($_POST["lawName"] != "") {
  $lawName = $_POST["lawName"];
  // ーーーーーーーーーーーーー――
  // ――――――更新！――――――
  // ―――――――――――――――
  if($lawName == "minpou") {
    $lawName = "民法";
  }
  if($lawName == "keiho") {
    $lawName = "刑法";
  }
  if($lawName == "minso") {
    $lawName = "民訴";
  }
  if($lawName == "keiso") {
    $lawName = "刑訴";
  }
}
if($text[0] != "") {
  $title = $text[0];
} else {
  $title = "";
}
if($text[1] != "") {
  $one = $text[1];
} else {
  $one = "";
}
if($text[2] != "") {
  $two = $text[2];
} else {
  $two = "";
}
if($text[3] != "") {
  $three = $text[3];
} else {
  $three = "";
}
if($text[4] != "") {
  $four = $text[4];
} else {
  $four = "";
}
if($text[5] != "") {
  $five = $text[5];
} else {
  $five = "";
}
if($text[6] != "") {
  $six = $text[6];
} else {
  $six = "";
}
if($text[7] != "") {
  $seven = $text[7];
} else {
  $seven = "";
}
if($text[8] != "") {
  $eight = $text[8];
} else {
  $eight = "";
}
if($text[9] != "") {
  $nine = $text[9];
} else {
  $nine = "";
}
if($text[10] != "") {
  $ten = $text[10];
} else {
  $ten = "";
}
if($text[11] != "") {
  $eleven = $text[11];
} else {
  $eleven = "";
}
if($text[12] != "") {
  $twelve = $text[12];
} else {
  $twelve = "";
}
if($text[13] != "") {
  $thirteen = $text[13];
} else {
  $thirteen = "";
}
if($text[14] != "") {
  $fourteen = $text[14];
} else {
  $fourteen = "";
}
if($text[15] != "") {
  $fifteen = $text[15];
} else {
  $fifteen = "";
}
if($text[16] != "") {
  $sixteen = $text[16];
} else {
  $sixteen = "";
}
if($text[17] != "") {
  $seventeen = $text[17];
} else {
  $seventeen = "";
}
if($text[18] != "") {
  $eighteen = $text[18];
} else {
  $eighteen = "";
}

// $eng = one;
// $eng = thirteen;

// function eisujiEncoding ($eng)
// {
//   $eisuji = str_replace($eng, "one", $one);
//                     // 1
// }

// $i = 0;
// while($text[1] >= $i) {
// $text[$i];
//   $i++;
// }

// echo $_SESSION['id'];


$sql = ('INSERT INTO myroppou (lawName, title, one, two, three, four, five, six, seven, eight, nine, ten, eleven, twelve, thirteen, fourteen, fifteen, sixteen, seventeen, eighteen, recognize) VALUES (:lawName, :title, :one, :two, :three, :four, :five, :six, :seven, :eight, :nine, :ten, :eleven, :twelve, :thirteen, :fourteen, :fifteen, :sixteen, :seventeen, :eighteen, :recognize)');

$dsn = 'mysql:dbname=roppou;host=localhost;port=8889;charset=utf8';
$user = 'root';
$password = 'root';
$dbh = new PDO($dsn, $user, $password);
$sth = $dbh -> prepare($sql);
$sth ->bindParam(':lawName', $lawName, PDO::PARAM_STR);
$sth ->bindParam(':title', $title, PDO::PARAM_STR);
$sth ->bindParam(':one', $one, PDO::PARAM_STR);
$sth ->bindParam(':two', $two, PDO::PARAM_STR);
$sth ->bindParam(':three', $three, PDO::PARAM_STR);
$sth ->bindParam(':four', $four, PDO::PARAM_STR);
$sth ->bindParam(':five', $five, PDO::PARAM_STR);
$sth ->bindParam(':six', $six, PDO::PARAM_STR);
$sth ->bindParam(':seven', $seven, PDO::PARAM_STR);
$sth ->bindParam(':eight', $eight, PDO::PARAM_STR);
$sth ->bindParam(':nine', $nine, PDO::PARAM_STR);
$sth ->bindParam(':ten', $ten, PDO::PARAM_STR);
$sth ->bindParam(':eleven', $eleven, PDO::PARAM_STR);
$sth ->bindParam(':twelve', $twelve, PDO::PARAM_STR);
$sth ->bindParam(':thirteen', $thirteen, PDO::PARAM_STR);
$sth ->bindParam(':fourteen', $fourteen, PDO::PARAM_STR);
$sth ->bindParam(':fifteen', $fifteen, PDO::PARAM_STR);
$sth ->bindParam(':sixteen', $sixteen, PDO::PARAM_STR);
$sth ->bindParam(':seventeen', $seventeen, PDO::PARAM_STR);
$sth ->bindParam(':eighteen', $eighteen, PDO::PARAM_STR);
$sth ->bindParam(':recognize', $_SESSION['id'], PDO::PARAM_INT);
$sth -> execute();
?>

<html lang="ja">
<head>
  <meata charset="utf-8">
  <title>大学生のための六法全書/SignUp</title>
  <meta name="description" content="指定の法令だけを登録、保存できるWebサービスです。">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="styles.css?v=3">
  <link rel="apple-touch-icon" href="">
  <link rel="icon" sizes="192*192" href="">
</head>
<body>
  <div class="one">
    <h1>Compendium Of Laws</h1>
    <h2>For University Student</h2>
  </div>
  <div class="mainText-search">
    <h2 class="newRegister"><?php echo $lawName;?></h2>
    <div class="two">
      <?php foreach($text as $value): ?>
      <p class="lawText"><?php echo $value ?></p>
      <?php endforeach; ?>
    </div>
  </div>
  <p class="lawText-sub"><?php echo $sentence; ?></p>
<hr>
<a href="list.php">一覧ページへ</a>／
<a href="search.php">検索ページへ</a>
</body>
</html>

