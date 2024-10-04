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
  <title>申請画面</title>
  <link href="css/style.css" rel="stylesheet">
</head>
<body>
  <img class="logo" src="img/rogo.png">
  <div class="container">
    <form method="POST" action="request_act.php"> 
    <fieldset>
      <legend>こちらの内容を申請しますか</legend>
      <p>タイトル</p>
      <input class="rq" type="text" readonly name="idea_title" size="40" value="<?=$row["idea_title"]?>"><br>
      <p>内容</p>
      <textArea class="rq" readonly name="idea_naiyou" rows="1" cols="42">
        <?php 
     $str1 = $row["idea_naiyou"] ;
     $substr1 = mb_substr($str1, 0 ,0);
      echo (''.$substr1.'申請することで閲覧可能です'); ?>
      </textArea><br>
      <input type="hidden" name="idea_id" value="<?=$row["idea_id"]?>">
      <input type="hidden" name="request_status" value="1">
      <input class="btn" type="submit" value="申請">
      </fieldset>
    </form><br>
    <a href="top.php">戻る</a>
  </div>
</body>
</html>
