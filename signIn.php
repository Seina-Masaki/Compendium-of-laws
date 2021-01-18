<?php

require_once('config.php');

try{
  $pdo = new PDO(DSN, DB_USER, DB_PASS);
  $pdo -> exec("create table if not exists userData(
    id int not null auto_increment primary key,
    email varchar(255),
    password varchar(255),
    created timestamp not null default current_timestamp
    )");
  // echo "接続おけ  <br>";
} catch(PDOException $e) {
  // echo '接続エラー'.$e->getMessage();
}



// ログイン機能
session_start();

if(!empty($_POST)) {
  if($_POST['email'] != '' && $_POST['password'] != '') {
    $login = $pdo -> prepare('SELECT * FROM userData WHERE email=? AND password=?');
    $login -> execute(array(
      $_POST['email'],
      sha1($_POST['password'])
    ));
    $member = $login -> fetch();

    if($member) {
      $_SESSION['id'] = $member['id'];
      $_SESSION['time'] = time();
      header('Location: list.php');
      exit();
    }
  }
}


?>

<!DOCTYPE html>
<html lang="ja">
  <head>
  <meata charset="utf-8">
  <title>大学生のための六法全書/Login</title>
  <meta name="description" content="指定の法令だけを登録、保存できるWebサービスです。">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="styles.css">
  <link rel="apple-touch-icon" href="">
  <link rel="icon" sizes="192*192" href="">
  </head>
  <body>
    <h1>大学生のための六法全書</h1>
    <p>利用するために、ログインをお願いします。</p>

    <h2>ログイン</h2>
    <form  action="" method="post">
      <table>
        <tr>
          <th><label for="email">email</label></th>
          <th><input type="email" name="email"></th>
        </tr> 
          <th><label for="password">password</label></th>
          <th><input type="password" name="password"></th>
        </tr>
      </table>
      <button type="submit">Sign In!</button>
    </form>

    <a href="signUp.php">初めての方はこちら</a>
  </body>
</html>