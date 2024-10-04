<?php
session_start();

$idea_title   = $_POST["idea_title"];
$idea_naiyou  = $_POST["idea_naiyou"];
$user_id      = $_SESSION["user_id"];

include("funcs.php");
sschk();
$pdo = db_conn(); 

$stmt = $pdo->prepare("INSERT INTO ss_upload(user_id,idea_title,idea_naiyou,indate)VALUES(:user_id,:idea_title,:idea_naiyou,sysdate())");
$stmt->bindValue(':idea_title', $idea_title, PDO::PARAM_STR);
$stmt->bindValue(':user_id', $user_id, PDO::PARAM_INT);
$stmt->bindValue(':idea_naiyou', $idea_naiyou, PDO::PARAM_STR);
$status = $stmt->execute(); 

if($status==false){
    sql_error($stmt);
}else{
    redirect("mypage.php");
}
?>