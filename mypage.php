<?php
session_start();
include("funcs.php");
sschk();
$pdo = db_conn();

$sql = "SELECT
ss_upload.idea_id as idea_id,
ss_upload.user_id as user_id,
ss_upload.idea_title as idea_title,
ss_user.name as name,
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
  <title>NTNI マイページ</title>
  <link rel="icon" type="img/site_logo.png" href="img/site_logo.png">
  <link href="css/style.css" rel="stylesheet">
</head>
<body>
  <div class="logo_senter">
    <a href="top.php"><img class="logo" src="img/rogo.png"></a>
  </div>
  <div class="container">
    <table class="touroku_table">
      <caption>登録情報</caption>
      <tr class="touroku_tr">
        <td>名前　　　　：<?php if(isset($_SESSION["name"])){echo $_SESSION["name"];}?></td>
        <td>ニックネーム：<?php if(isset($_SESSION["netname"])){echo $_SESSION["netname"];}?></td>
      </tr>
    </table>
    <table class="top_table">
      <caption><?php echo $_SESSION["netname"]; ?> さんの投稿アイデア一覧</caption>
      <?php foreach($values as $v){ ?>
        <tr>
          <?php if ($_SESSION["user_id"] === $v["user_id"]): ?>
          <td class="title_mypage_td"><?=h($v["idea_title"])?><br>
          <a href="upload_change.php?idea_id=<?=h($v["idea_id"])?>">投稿内容を変更</a>　
          <a href="delete_check.php?idea_id=<?=h($v["idea_id"])?>">投稿内容を削除</a></td>
          <?php endif; ?>
        </tr>
      <?php } ?>
    </table>
    <ul class="mypage_ul">
      <li><a class="mypage_li" href="myrequest_list.php"><?php echo $_SESSION["netname"]; ?> さんの申請一覧</a></li>
      <li><a class="mypage_li" href="request_list.php">申請依頼のあった投稿一覧</a></li>
    </ul>
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