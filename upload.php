<?php
session_start();
include "funcs.php";
sschk();
?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>NTNI 投稿</title>
  <link rel="icon" type="img/site_logo.png" href="img/site_logo.png">
  <link href="css/style.css" rel="stylesheet">
</head>
<body>
  <div class="logo_senter">
  <a href="top.php"><img class="logo" src="img/rogo.png"></a>
  </div>
  <div class="container">
    <form method="POST" action="upload_check.php">
      <fieldset>
      <legend>投稿</legend>
      <input type="text" name="idea_title" placeholder="タイトルを入力"><br>
      <textArea name="idea_naiyou" rows="10" cols="42" placeholder="内容を入力"></textArea><br>
      <input class="btn" type="submit" value="投稿">
      </fieldset>
  </div>
  </form>
  <footer>
  <?php include("menu.php"); ?>
  </footer>
</body>
</html>