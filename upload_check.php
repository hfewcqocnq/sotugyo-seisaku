<?php
session_start();

$idea_title   = $_POST["idea_title"];
$idea_naiyou  = $_POST["idea_naiyou"];
$user_id      = $_SESSION["user_id"];

include("funcs.php");
sschk();
$pdo = db_conn(); 

?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>NTNI 投稿確認</title>
  <link rel="icon" type="img/site_logo.png" href="img/site_logo.png">
  <link href="css/style.css" rel="stylesheet">
</head>
<body>
  <div class="logo_senter">
  <a href="top.php"><img class="logo" src="img/rogo.png"></a>
  </div>
  <div class="container">
    <form method="POST" action="upload_insert.php">
      <fieldset>
        <legend>こちらの内容で投稿しますか</legend>
        <p>タイトル</p>
        <input class="rq" type="text" readonly name="idea_title" value="<?php echo $idea_title; ?>"><br>
        <p>内容</p>
        <textArea class="rq" readonly name="idea_naiyou" rows="1" cols="42"><?php echo $_POST["idea_naiyou"] ?></textArea><br>
        <input class="btn" type="submit" value="投稿">
      </fieldset>
    </form>
  </div>
</body>
</html>