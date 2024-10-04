<?php
session_start();
$idea_id = $_POST["idea_id"];

include("funcs.php");
sschk();
$pdo = db_conn();

$stmt = $pdo->prepare("DELETE FROM ss_upload WHERE idea_id=:idea_id");
$stmt->bindValue(':idea_id', $idea_id, PDO::PARAM_INT);
$status = $stmt->execute();

if($status==false){
  sql_error($stmt);
}else{
  redirect("mypage.php");
}
?>