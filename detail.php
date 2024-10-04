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
  <title>詳細画面</title>
  <link href="css/style.css" rel="stylesheet">
</head>
<body>
  <img class="logo" src="img/rogo.png">
  <div class="container">
    <h1><?=$row["idea_title"]?></h1>
    <a>
      <?php if ($_SESSION["user_id"] === $row["user_id"]){
        echo $row["idea_naiyou"];
        }else {$str1 = $row["idea_naiyou"] ;
        $substr1 = mb_substr($str1, 0 ,20);
        echo (''.$substr1.'<br><br>…続きは申請することで閲覧可能です<br><br>');
      } ?>
    </a>
    <div class="detail_btn">
    <?php if ($_SESSION["user_id"] !== $row["user_id"]): ?>
      <a href="request.php?idea_id=<?=h($row["idea_id"])?>">申請</a>
    <?php endif; ?>
    　<a href="top.php">戻る</a>
  </div>
  </div>
  <footer>
  <?php include("menu.php"); ?>
  </footer>
</body>
</html>
