<?php
session_start();

$idea_title   = $_POST["idea_title"];
$idea_naiyou  = $_POST["idea_naiyou"];
$idea_id      = $_POST["idea_id"];

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
  <title>NTNI 変更確認</title>
  <link rel="icon" type="img/site_logo.png" href="img/site_logo.png">
  <link href="css/style.css" rel="stylesheet">
</head>
<body>
  <div class="logo_senter">
  <a href="top.php"><img class="logo" src="img/rogo.png"></a>
  </div>
  <div class="container">
    <form method="POST" action="upload_change_act.php"> 
      <fieldset>
        <legend>こちらの内容で変更しますか</legend>
        <p>タイトル</p>
        <input class="rq" type="text" readonly name="idea_title" value="<?php echo $idea_title; ?>"><br>
        <p>内容</p>
        <textArea class="rq" readonly name="idea_naiyou" rows="10" cols="42"><?php echo $_POST["idea_naiyou"] ?></textArea><br>
        <input type="hidden" name="idea_id" value="<?=$row["idea_id"]?>">
        <input class="btn" type="submit" value="更新">
      </fieldset>
    </form>
  </div>
</body>
</html>