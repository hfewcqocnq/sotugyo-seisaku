<?php
session_start();

$lid = $_POST["lid"];
$lpw = $_POST["lpw"];

include("funcs.php");
$pdo = db_conn();

$stmt = $pdo->prepare("SELECT * FROM ss_user WHERE lid=:lid");
$stmt->bindValue(':lid', $lid, PDO::PARAM_STR);
$status = $stmt->execute();

if($status==false){
    sql_error($stmt);
}

$val = $stmt->fetch();
$pw = password_verify($lpw,$val["lpw"]);
if($pw){
  $_SESSION["chk_ssid"]  = session_id();
  $_SESSION["user_id"]   = $val['user_id'];
  $_SESSION["name"]      = $val['name'];
  $_SESSION["netname"]   = $val['netname'];
  $_SESSION["lid"]       = $val['lid'];

  redirect("top.php");
}else{
  redirect("login.php");
}

exit();
?>