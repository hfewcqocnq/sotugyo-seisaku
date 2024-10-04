<?php
session_start();

include("funcs.php");
sschk();
$pdo = db_conn();

$sql = "SELECT
ss_upload.idea_id as idea_id,
ss_upload.user_id as user_id,
ss_upload.idea_title as idea_title,
ss_user.netname as netname
FROM ss_upload JOIN ss_user ON ss_upload.user_id = ss_user.user_id";

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
  <title>NTNI TOP</title>
  <link rel="icon" type="img/site_logo.png" href="img/site_logo.png">
  <link href="css/style.css" rel="stylesheet">
</head>
<body>
  <div class="logo_senter">
  <a href="top.php"><img class="logo" src="img/rogo.png"></a>
  </div>
  <div class="container">
    <form class="search" action="top_result.php" method="post">
      <label><input type="text" placeholder="欲しいアイデアのキーワードを入力" name="idea_title"></label>
      <button type="submit" aria-label="検索"></button>
    </form>
    <h1>投稿されているアイデア一覧</h1>
    <table class="top_table">
      <?php foreach($values as $v){ ?>
        <tr class="top_tr">
        <td class="title_td"><a href="detail.php?idea_id=<?=$v["idea_id"]?>"><?=$v["idea_title"]?></a>　</td>
      </tr>
      <?php } ?>
    </table>
  </div>
<footer>
  <?php include("menu.php"); ?>
</footer>
<script>
  const a = '<?php echo $json; ?>';
  console.log(JSON.parse(a));
</script>
</body>
</html>