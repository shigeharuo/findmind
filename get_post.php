<?php
session_start();
include 'functions.php';

$pdo = db_conn();

$sql = "SELECT * FROM coin_post WHERE userId=".$_SESSION['id']." ORDER BY id DESC LIMIT 10;";
$stmt = $pdo->prepare($sql);

$status = $stmt->execute();

//データ表示
if ($status == false) {
    showSqlErrorMsg($stmt);
} else {
    $res = [];
    while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $res[] = $result;
    }
    echo json_encode($res);
}