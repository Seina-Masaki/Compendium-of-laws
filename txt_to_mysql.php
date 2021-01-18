<!DOCTYPE html>
<html lang="ja">
<head>

</head>
<body>

<?php

require_once('config.php');

try{
  $pdo = new PDO(DSN, DB_USER, DB_PASS);
  echo "接続おけ  <br>";
} catch(PDOException $e) {
  echo '接続エラー'.$e->getMessage();
}

// $xml = simplexml_load_file("https://elaws.e-gov.go.jp/api/1/lawdata/明治二十九年法律第八十九号");

// $title = "";
// $sentence = "";
// $paragraphSentence_two = "";
// $paragraphSentence_three = "";
// $paragraphSentence_four = "";
// $paragraphSentence_five = "";
// $paragraphSentence_six = "";
// $paragraphSentence_seven = "";
// $paragraphSentence_eight = "";
// $paragraphSentence_nine = "";
// $paragraphSentence_ten = "";
// $itemSentence_one = "";
// $itemSentence_two = "";
// $itemSentence_three = "";
// $itemSentence_four = "";
// $itemSentence_five = "";
// $itemSentence_six = "";
// $itemSentence_seven = "";
// $itemSentence_eight = "";
// $itemSentence_nine = "";
// $itemSentence_ten = "";

// $i = 1;
// $file = fopen("roppou$i.txt", "r");
// while($file) {
//   $file = fopen("roppou$i.txt", "r");
//   $filearr = file("roppou$i.txt");
//   if($file) {
//     // 条数
//     $title = $filearr[0];
//     echo $filearr[0] . "<br>";
    
//     // 条文
//     $sentence = $filearr[1];
//     echo $filearr[1] . "<br>";
    
//     // 項文または号文
//     while($line = fgets($file)) {
      
//       if(preg_match("/２項/", "$line")) {
//         $paragraphSentence_two = $line;
//         echo $line . "<br>";
//       } else {
        
//       }
//       if(preg_match("/３項/", "$line")) {
//         $paragraphSentence_three = $line;
//         echo $line . "<br>";
//       } else {
        
//       }
//       if(preg_match("/４項/", "$line")) {
//         $paragraphSentence_four = $line;
//         echo $line . "<br>";
//       } else {
        
//       }
//       if(preg_match("/５項/", "$line")) {
//         $paragraphSentence_five = $line;
//         echo $line . "<br>";
//       } else {
        
//       }
//       if(preg_match("/６項/", "$line")) {
//         $paragraphSentence_six = $line;
//         echo $line . "<br>";
//       } else {
        
//       }
//       if(preg_match("/７項/", "$line")) {
//         $paragraphSentence_seven = $line;
//         echo $line . "<br>";
//       } else {
        
//       }
//       if(preg_match("/８項/", "$line")) {
//         $paragraphSentence_eight = $line;
//         echo $line . "<br>";
//       } else {
        
//       }
//       if(preg_match("/９項/", "$line")) {
//         $paragraphSentence_nine = $line;
//         echo $line . "<br>";
//       } else {
        
//       }
//       if(preg_match("/１０項/", "$line")) {
//         $paragraphSentence_ten = $line;
//         echo $line . "<br>";
//       } else {
        
//       }
//       if(preg_match("/一号/", "$line")) {
//         $itemSentence_one = $line;
//         echo $line . "<br>";
//       } else {
        
//       }
//       if(preg_match("/二号/", "$line")) {
//         $itemSentence_two = $line;
//         echo $line . "<br>";
//       } else {
        
//       }
//       if(preg_match("/三号/", "$line")) {
//         $itemSentence_three = $line;
//         echo $line . "<br>";
//       } else {
        
//       }
//       if(preg_match("/四号/", "$line")) {
//         $itemSentence_four = $line;
//         echo $line . "<br>";
//       } else {
        
//       }
//       if(preg_match("/五号/", "$line")) {
//         $itemSentence_five = $line;
//         echo $line . "<br>";
//       } else {
        
//       }
//       if(preg_match("/六号/", "$line")) {
//         $itemSentence_six = $line;
//         echo $line . "<br>";
//       } else {
        
//       }
//       if(preg_match("/七号/", "$line")) {
//         $itemSentence_seven = $line;
//         echo $line . "<br>";
//       } else {
        
//       }
//       if(preg_match("/八号/", "$line")) {
//         $itemSentence_eight = $line;
//         echo $line . "<br>";
//       } else {
        
//       }
//       if(preg_match("/九号/", "$line")) {
//         $itemSentence_nine = $line;
//         echo $line . "<br>";
//       } else {
        
//       }
//       if(preg_match("/十号/", "$line")) {
//         $itemSentence_ten = $line;
//         echo $line . "<br>";
//       } else {
        
//       }
//     }
//   }
//   fclose($file);
//   $i += 1;

  
  $sql = ('INSERT INTO minpou (title, sentence, paragraphSentence_two, paragraphSentence_three, paragraphSentence_four, paragraphSentence_five, paragraphSentence_six, paragraphSentence_seven, paragraphSentence_eight, paragraphSentence_nine, paragraphSentence_ten, itemSentence_one, itemSentence_two, itemSentence_three, itemSentence_four, itemSentence_five, itemSentence_six, itemSentence_seven, itemSentence_eight, itemSentence_nine, itemSentence_ten) VALUES (:title, :sentence, :paragraphSentence_two, :paragraphSentence_three, :paragraphSentence_four, :paragraphSentence_five, :paragraphSentence_six, :paragraphSentence_seven, :paragraphSentence_eight, :paragraphSentence_nine, :paragraphSentence_ten, :itemSentence_one, :itemSentence_two, :itemSentence_three, :itemSentence_four, :itemSentence_five, :itemSentence_six, :itemSentence_seven, :itemSentence_eight, :itemSentence_nine, :itemSentence_ten)');
  
  $dsn = 'mysql:dbname=roppou;host=localhost;port=8889;charset=utf8';
  $user = 'root';
  $password = 'root';
  $sth = $pdo -> prepare($sql);
  $sth ->bindParam(':title', $title, PDO::PARAM_STR);
  $sth ->bindParam(':sentence', $sentence, PDO::PARAM_STR);
  $sth ->bindParam(':paragraphSentence_two', $paragraphSentence_two, PDO::PARAM_STR);
  $sth ->bindParam(':paragraphSentence_three', $paragraphSentence_three, PDO::PARAM_STR);
  $sth ->bindParam(':paragraphSentence_four', $paragraphSentence_four, PDO::PARAM_STR);
  $sth ->bindParam(':paragraphSentence_five', $paragraphSentence_five, PDO::PARAM_STR);
  $sth ->bindParam(':paragraphSentence_six', $paragraphSentence_six, PDO::PARAM_STR);
  $sth ->bindParam(':paragraphSentence_seven', $paragraphSentence_seven, PDO::PARAM_STR);
  $sth ->bindParam(':paragraphSentence_eight', $paragraphSentence_eight, PDO::PARAM_STR);
  $sth ->bindParam(':paragraphSentence_nine', $paragraphSentence_nine, PDO::PARAM_STR);
  $sth ->bindParam(':paragraphSentence_ten', $paragraphSentence_ten, PDO::PARAM_STR);
  $sth ->bindParam(':itemSentence_one', $itemSentence_one, PDO::PARAM_STR);
  $sth ->bindParam(':itemSentence_two', $itemSentence_two, PDO::PARAM_STR);
  $sth ->bindParam(':itemSentence_three', $itemSentence_three, PDO::PARAM_STR);
  $sth ->bindParam(':itemSentence_four', $itemSentence_four, PDO::PARAM_STR);
  $sth ->bindParam(':itemSentence_five', $itemSentence_five, PDO::PARAM_STR);
  $sth ->bindParam(':itemSentence_six', $itemSentence_six, PDO::PARAM_STR);
  $sth ->bindParam(':itemSentence_seven', $itemSentence_seven, PDO::PARAM_STR);
  $sth ->bindParam(':itemSentence_eight', $itemSentence_eight, PDO::PARAM_STR);
  $sth ->bindParam(':itemSentence_nine', $itemSentence_nine, PDO::PARAM_STR);
  $sth ->bindParam(':itemSentence_ten', $itemSentence_ten, PDO::PARAM_STR);
  
  $sth -> execute();
  
//   $title = "";
//   $sentence = "";
//   $paragraphSentence_two = "";
//   $paragraphSentence_three = "";
//   $paragraphSentence_four = "";
//   $paragraphSentence_five = "";
//   $paragraphSentence_six = "";
//   $paragraphSentence_seven = "";
//   $paragraphSentence_eight = "";
//   $paragraphSentence_nine = "";
//   $paragraphSentence_ten = "";
//   $itemSentence_one = "";
//   $itemSentence_two = "";
//   $itemSentence_three = "";
//   $itemSentence_four = "";
//   $itemSentence_five = "";
//   $itemSentence_six = "";
//   $itemSentence_seven = "";
//   $itemSentence_eight = "";
//   $itemSentence_nine = "";
//   $itemSentence_ten = "";
// }    


?>

</body>
</html>