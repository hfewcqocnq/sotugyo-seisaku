<?php
session_start();
include("funcs.php");
sschk();
$pdo = db_conn();

$sql = "SELECT
ss_request.request_idea_id as request_idea_id,
ss_request.request_idea_title as request_idea_title,
ss_request.user_id as user_id
FROM ss_request JOIN ss_user ON ss_request.user_id = ss_user.user_id";

$stmt = $pdo->prepare($sql);
$status = $stmt->execute();

$values = "";
if($status==false) {
  sql_error($stmt);
}

$values =  $stmt->fetchAll(PDO::FETCH_ASSOC); 
$json = json_encode($values,JSON_UNESCAPED_UNICODE);
?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>NTNI 申請一覧</title>
  <link rel="icon" type="img/site_logo.png" href="img/site_logo.png">
  <link href="css/style.css" rel="stylesheet">
</head>
<body>
  <div class="logo_senter">
    <a href="top.php"><img class="logo" src="img/rogo.png"></a>
  </div>
<div class="container">
  <table class="top_table">
    <caption><?php echo $_SESSION["netname"]; ?> さんの申請一覧</caption>
      <?php foreach($values as $v){ ?>
        <tr class="top_tr">
          <?php if ($_SESSION["user_id"] === $v["user_id"]): ?>
          <td class="title_td"><a href="request_detail.php?request_idea_id=<?=$v["request_idea_id"]?>"><?=$v["request_idea_title"]?></a>　</td>
          <?php endif; ?>
        </tr>
      <?php } ?>
      </table>
      <a class="back_btn" href="mypage.php">戻る</a>
</div>
<script>
  const a = '<?php echo $json; ?>';
  console.log(JSON.parse(a));
</script>
<footer>
  <?php include("menu.php"); ?>
</footer>
</body>
</html>