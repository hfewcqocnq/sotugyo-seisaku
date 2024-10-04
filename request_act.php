<?php
session_start();

$user_id = $_SESSION["user_id"];
$request_idea_id = $_POST["idea_id"];
$request_idea_title = $_POST["idea_title"];
$request_status = $_POST["request_status"];

include("funcs.php");
sschk();
$pdo = db_conn();

$stmt = $pdo->prepare("INSERT INTO ss_request(user_id,request_idea_id,request_idea_title,request_status,indate)VALUES(:user_id,:request_idea_id,:request_idea_title,:request_status,sysdate())");
$stmt->bindValue(':user_id', $user_id, PDO::PARAM_INT);
$stmt->bindValue(':request_idea_id', $request_idea_id, PDO::PARAM_INT);
$stmt->bindValue(':request_idea_title', $request_idea_title, PDO::PARAM_STR);
$stmt->bindValue(':request_status', $request_status, PDO::PARAM_INT);
$status = $stmt->execute();

if ($status == false) {
    sql_error($stmt);
} else {
    redirect("mypage.php");
}