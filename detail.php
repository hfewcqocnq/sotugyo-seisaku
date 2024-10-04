<?php
session_start();
$user_id = $_SESSION["user_id"];
$idea_id = $_GET["idea_id"];
include("funcs.php");
sschk();
$pdo = db_conn();

$sql = "SELECT * FROM ss_upload WHERE idea_id=:idea_id";

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':idea_id',$idea_id,PDO::PARAM_INT);
$status = $stmt->execute();

if($status==false) {
  sql_error($stmt);
}else{
  $row = $stmt->fetch();
}

?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>NTNI 詳細</title>
  <link rel="icon" type="img/site_logo.png" href="img/site_logo.png">
  <link href="css/style.css" rel="stylesheet">
</head>
<body>
  <div class="logo_senter">
    <a href="top.php"><img class="logo" src="img/rogo.png"></a>
  </div>
  <div class="container">
    <h1><?=$row["idea_title"]?></h1>
    <a><?php 
     $str1 = $row["idea_naiyou"] ;
     $substr1 = mb_substr($str1, 0 ,20);
      echo (''.$substr1.'<br><br>…続きは申請することで閲覧可能です<br><br>'); ?>
      <!-- 文字列途中まで表示 --></a><br>
    <div class="detail_btn">
      <a href="request.php?idea_id=<?=h($row["idea_id"])?>">申請</a>
    　<a href="top.php">戻る</a>
    </div>
  </div>
  <footer>
  <?php include("menu.php"); ?>
  </footer>
</body>
</html>