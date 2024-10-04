<?php
include("funcs.php");
$pdo = db_conn();

$sql = "SELECT * FROM ss_upload";

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
  <img class="logo" src="img/rogo.png">
  </div>
  <div class="container">
    <h1>投稿されているアイデア一覧</h1>
    <table class="top_table">
      <?php foreach($values as $v){ ?>
        <tr class="top_tr">
          <td class="title_td"><?=$v["idea_title"]?>　</td>
          <!-- <a href="nodetail.php?idea_id=<?=$v["id"]?>"><?=$v["idea_title"]?></a> -->
        </tr>
      <?php } ?>
    </table>
  </div>
<script>
  const a = '<?php echo $json; ?>';
  console.log(JSON.parse(a));
</script>
<footer>
  <nav>
    <ul class="menu_list">
    <li><a class="menu_link" href="user.php">会員登録</a></li>
    <li><a class="menu_link" href="login.php">ログイン</a></li>
    </ul>
  </nav>
</footer>
</body>
</html>