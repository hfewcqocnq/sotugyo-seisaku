<?php
try{
session_start();
include("funcs.php");
sschk();
$pdo = db_conn();

//SQL文を実行して、結果を$stmtに代入する。
$stmt = $pdo->prepare(" SELECT * FROM ss_upload WHERE  idea_title LIKE '%" . $_POST["idea_title"] . "%' "); 

$stmt->execute();
} catch(PDOException $e){
$e->getMessage() . "\n";
exit();
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>NTNI 検索結果</title>
  <link rel="icon" type="img/site_logo.png" href="img/site_logo.png">
  <link href="css/style.css" rel="stylesheet">
</head>
<body>
  <div class="logo_senter">
  <a href="top.php"><img class="logo" src="img/rogo.png"></a>
  </div>
  <div class="container">
    <form class="search" action="top_result.php" method="post">
      <label><input type="text" value="<?php echo $_POST["idea_title"]; ?>" name="idea_title" placeholder="欲しいアイデアのキーワードを入力"></label>
      <button type="submit" aria-label="検索"></button>
    </form>
    <h1>投稿されているアイデア検索結果一覧</h1>
        <table class="top_table">
            <!-- ここでPHPのforeachを使って結果をループさせる -->
            <?php foreach ($stmt as $row): ?>
            <tr class="top_tr">
                <td class="title_td">
                    <a href="detail.php?idea_id=<?=$row[0]?>"><?php echo $row[2]?></a>
                </td>
            </tr>
            <?php endforeach; ?>
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