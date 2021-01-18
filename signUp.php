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
  
  $email = $_POST['email'];
  $password = $_POST['password'];
  
  // 新規登録機能
  session_start();

  if(!empty($_POST['email']) && !empty($_POST['password'])) {
    $sql = ('SELECT COUNT(*) AS cnt FROM userData WHERE email=?');
    $member = $pdo -> prepare($sql);
    $member -> execute(array($_POST['email']));
    $result = $member -> fetch();
    if($result['cnt'] > 0) {
      $error['email'] = 'duplicate';
    } else {
      $sql = ('INSERT INTO userData(email, password) VALUES(:email, :password)');
      $stmt = $pdo -> prepare($sql);
      $stmt -> bindParam(':email', $email, PDO::PARAM_STR);
      $stmt -> bindParam(':password', sha1($password), PDO::PARAM_STR);
      $stmt -> execute();
      // idを取得し、リストPHPへジャンプ
      $sth = $pdo -> query('SELECT id FROM userData');
      $aryList = $sth -> fetchAll(PDO::FETCH_COLUMN);
      foreach($aryList as $value) {
        $_SESSION['id'] = $value;
        header('Location: List.php');
      }
    }
  }
  ?>
<html lang="ja">
<head>
  <meata charset="utf-8">
  <title>大学生のための六法全書/SignUp</title>
  <meta name="description" content="指定の法令だけを登録、保存できるWebサービスです。">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="styles.css">
  <link rel="apple-touch-icon" href="">
  <link rel="icon" sizes="192*192" href="">
</head>
<body>
  <div class="one">
    <h1>Compendium Of Laws</h1>
    <h2>For University Student</h2>
  </div>
  
  <div class="mainText">
    <h2 class="newRegister">新規登録</h2>
    <div class="two">
      <form action="" method="post">
      <label for="email" class="email">your email address</label><br>
      <input type="email" name="email"><br>
      <label for="password" class="password">your password</label><br>
      <input type="password" name="password"><br>
      <button type="submit" class="btn-border">Sign Up!</button><br>
      <?php if($error['email'] === 'duplicate'):?>
      <p>指定されたメールアドレスは、既に登録されています。</p>
      <?php endif; ?>
      </form>
    </div>
  </div>
  <p class="alert">※パスワードは半角英数字をそれぞれ１文字以上含んだ、８文字以上で設定してください。</p>
  <div class="link">
  <a href="signIn.php">ログインページ</a>
  </div>