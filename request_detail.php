<?php
session_start();
$user_id = $_SESSION["user_id"];
$idea_id = $_GET["request_idea_id"];
include("funcs.php");
sschk();
$pdo = db_conn();

$sql = "SELECT * FROM ss_upload WHERE idea_id = $idea_id";

$stmt = $pdo->prepare($sql);
$status = $stmt->execute();

$values = "";
if($status==false) {
  sql_error($stmt);
}else{
  $row = $stmt->fetch();
}

$values =  $stmt->fetchAll(PDO::FETCH_ASSOC); 
$json = json_encode($values,JSON_UNESCAPED_UNICODE);
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
  <div>
      <h1><?=$row["idea_title"]?></h1>
      <a><?=$row["idea_naiyou"]?></a><br>
  </div>
</form><br>
  <div class="detail_btn">
    <a href="mypage.php">戻る</a>
  </div>
  <footer>
  <?php include("menu.php"); ?>
  </footer>
</body>
</html>