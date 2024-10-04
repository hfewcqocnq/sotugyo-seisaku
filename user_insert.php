<?php
include "funcs.php";

$name      = filter_input( INPUT_POST, "name" );
$netname   = filter_input( INPUT_POST, "netname" );
$lid       = filter_input( INPUT_POST, "lid" );
$lpw       = filter_input( INPUT_POST, "lpw" );
$lpw       = password_hash($lpw, PASSWORD_DEFAULT); 

$pdo = db_conn();

$sql = "INSERT INTO ss_user(name,netname,lid,lpw)VALUES(:name,:netname,:lid,:lpw)";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':name', $name, PDO::PARAM_STR);
$stmt->bindValue(':netname', $netname, PDO::PARAM_STR);
$stmt->bindValue(':lid', $lid, PDO::PARAM_STR);
$stmt->bindValue(':lpw', $lpw, PDO::PARAM_STR);
$status = $stmt->execute();

if ($status == false) {
    sql_error($stmt);
} else {
    redirect("login.php");
}