<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>NTNI ログイン</title>
  <link rel="icon" type="img/site_logo.png" href="img/site_logo.png">
  <link href="css/style.css" rel="stylesheet">
</head>
<body>
  <div class="logo_senter">
  <a href="notop.php"><img class="logo" src="img/rogo.png"></a>
  </div>
  <div class="container">
    <h1>LOGIN</h1>
    <div>
      <form class="login_form" action="login_act.php" method="POST">
        ID : <input type="text" name="lid"><br>
        PW: <input type="password" name="lpw"><br>
        <input class="btn" type="submit" value="ログイン">
      </form>
    </div>
  </div>
</body>
</html>