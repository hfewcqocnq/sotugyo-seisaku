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
  <title>NTNI 変更更新</title>
  <link rel="icon" type="img/site_logo.png" href="img/site_logo.png">
  <link href="css/style.css" rel="stylesheet">
</head>
<body>
  <div class="logo_senter">
  <a href="top.php"><img class="logo" src="img/rogo.png"></a>
  </div>
  <div class="container">
    <form method="POST" action="upload_change_check.php"> 
      <fieldset>
      <legend>更新</legend>
      <input type="text" name="idea_title" value="<?=$row["idea_title"]?>"><br>
      <textArea name="idea_naiyou" rows="10" cols="42"><?=$row["idea_naiyou"]?></textArea><br>
      <input type="hidden" name="idea_id" value="<?=$row["idea_id"]?>">
      <input class="btn" type="submit" value="更新">
      </fieldset>
    </form>
  </div>
  <footer>
  <?php include("menu.php"); ?>
  </footer>
</body>
</html>