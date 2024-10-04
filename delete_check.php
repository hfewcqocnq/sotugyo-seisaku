<?php
session_start();
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
  <title>NTNI 削除確認</title>
  <link rel="icon" type="img/site_logo.png" href="img/site_logo.png">
  <link href="css/style.css" rel="stylesheet">
</head>
<body>
  <div class="logo_senter">
    <a href="top.php"><img class="logo" src="img/rogo.png"></a>
  </div>
  <div class="container">
    <form method="POST" action="delete_act.php"> 
      <fieldset>
        <legend>こちらの内容を削除しますか</legend>
        <p>タイトル</p>
        <input class="rq" type="text" readonly name="idea_title" value="<?=$row["idea_title"]?>"><br>
        <p>内容</p>
        <textArea class="rq" readonly name="idea_naiyou" rows="10" cols="42"><?=$row["idea_naiyou"]?></textArea><br>
        <input type="hidden" name="idea_id" value="<?=$row["idea_id"]?>">
        <input class="btn" type="submit" value="削除">
      </fieldset>
    </form>
    <a href="mypage.php">戻る</a>
  </div>
  <footer>
  <?php include("menu.php"); ?>
  </footer>
</body>
</html>