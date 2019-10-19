<?php
session_start();
include('functions.php'); //←関数を記述したファイルの読み込み
$pdo = db_conn(); //←関数実行

// ユーザー別の投稿数取得
$sql = "SELECT COUNT(Id) as post_num FROM coin_post WHERE  userId=". $_SESSION['id'];
$stmt = $pdo->prepare($sql);
$status = $stmt->execute();
$result = $stmt->fetch(PDO::FETCH_ASSOC);
$post_num = $result['post_num'];

if ($post_num > 10) {
  $ru_1 = array();
  $sa_1 = array();
  $ru_2 = array();
  $sa_2 = array();

  // 区間１の取得とRuとSaの平均
  $sql = "SELECT * FROM coin_post WHERE userId=".$_SESSION['id']." ORDER BY id DESC LIMIT 5;";
  $stmt = $pdo->prepare($sql);
  $status = $stmt->execute();
  while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
    // RuとSaの条件分岐
    // Ruの場合
    if ($result['coin_mind'] == "Ru"){
      array_push($ru_1, $result['coin_value']);
    } else { // Saの場合
      array_push($sa_1, $result['coin_value']);
    }
  }
  $avg_ru_1 = array_sum($ru_1)/count($ru_1);
  $avg_sa_1 = array_sum($sa_1)/count($sa_1);
  // var_dump($avg_ru_1);
  // var_dump($avg_sa_1);

  // 区間2の取得とRuとSaの平均
  $sql = "SELECT * FROM coin_post WHERE userId=2 ORDER BY id DESC LIMIT 3, 5;";
  $stmt = $pdo->prepare($sql);
  $status = $stmt->execute();
  while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
    // RuとSaの条件分岐
    // Ruの場合
    if ($result['coin_mind'] == "Ru"){
      array_push($ru_2, $result['coin_value']);
    } else { // Saの場合
      array_push($sa_2, $result['coin_value']);
    }
  }
  $avg_ru_2 = array_sum($ru_2)/count($ru_2);
  $avg_sa_2 = array_sum($sa_2)/count($sa_2);
  // var_dump($avg_ru_2);
  // var_dump($avg_sa_2);
  
  //mindの決定
  if ($_SESSION['last_mind'] == 'Ru'){
    if ($avg_ru_1 <= $_SESSION['last_value']){  //
      if ($avg_ru_1 >= $avg_ru_2){
        $mind = 1;
      }else{
        $mind = 2;
      }
    }else{
      if ($avg_ru_1 >= $avg_ru_2){
        $mind = 3;
      }else{
        $mind = 4;
      }
    }
  }else{  // Saの場合
    if ($avg_ru_1 <= $_SESSION['last_value']){  //
      if ($avg_ru_1 >= $avg_ru_2){
        $mind = 4;
      }else{
        $mind = 3;
      }
    }else{
      if ($avg_ru_1 >= $avg_ru_2){
        $mind = 2;
      }else{
        $mind = 1;
      }
    }
  }
  var_dump('mind='.$mind);
  // mindを元にfeadbackをDBから取得。
  $sql = "SELECT * FROM feadback_list WHERE  mind=". $mind;
  $stmt = $pdo->prepare($sql);
  $status = $stmt->execute();
  $result = $stmt->fetch(PDO::FETCH_ASSOC);
  var_dump($result);

} else{
  echo 'まだ１０以下なので区間情報がありません';
}

?>

<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>put a coin</title>
    <link href="https://fonts.googleapis.com/css?family=Barlow:700,700i|M+PLUS+1p&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/main.css">
</head>
<body>


</body>
</html>