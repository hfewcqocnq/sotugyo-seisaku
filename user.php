<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>NTNI 会員登録</title>
  <link rel="icon" type="img/site_logo.png" href="img/site_logo.png">
  <link href="css/style.css" rel="stylesheet">
</head>
<body>
  <div class="logo_senter">
  <img class="logo" src="img/rogo.png">
  </div>
  <div class="container">
<form method="post" action="user_insert.php">
    <div>
    <fieldset>
      <legend>ユーザー登録</legend>
      <label>名前：<input type="text" name="name"></label><br>
      <label>ニックネーム：<input type="text" name="netname"></label><br>
      <label>ログイン ID ：<input type="text" name="lid"></label><br>
      <label>ログイン PW：<input type="text" name="lpw"></label><br>
      <input class="btn" type="submit" value="登録">
    </fieldset>
  </div>
</form>
</body>
</html>