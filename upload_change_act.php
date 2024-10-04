<?php
session_start();

$idea_title   = $_POST["idea_title"];
$idea_naiyou  = $_POST["idea_naiyou"];
$idea_id      = $_POST["idea_id"];

include("funcs.php");
sschk();
$pdo = db_conn(); 

$sql = "UPDATE ss_upload SET idea_title=:idea_title,idea_naiyou=:idea_naiyou WHERE idea_id=:idea_id";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':idea_title',   $idea_title,   PDO::PARAM_STR); 
$stmt->bindValue(':idea_naiyou', $idea_naiyou, PDO::PARAM_STR); 
$stmt->bindValue(':idea_id',    $idea_id,    PDO::PARAM_INT);
$status = $stmt->execute();

if($status==false){
    sql_error($stmt);
}else{
    redirect("mypage.php");
}
?>