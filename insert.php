<?php
session_start();
include('functions.php'); //←関数を記述したファイルの読み込み
$pdo = db_conn(); //←関数実行

// var_dump($_POST);
// exit();

if (
    // !isset($_POST['userid']) || $_POST['userid'] == '' ||
    !isset($_POST['coin_title']) || $_POST['coin_title'] == '' ||
    !isset($_POST['coin_text']) || $_POST['coin_text'] == '' ||
    !isset($_POST['coin_code']) || $_POST['coin_code'] == '' ||
    !isset($_POST['coin_open']) || $_POST['coin_open'] == ''
) {
    exit('ParamError');
}

// $userid = $_POST['userid'];
$coin_title = $_POST['coin_title'];
$coin_text = $_POST['coin_text'];
$coin_code = $_POST['coin_code'];
$coin_open = $_POST['coin_open'];
// var_dump($coin_code);
// exit();
//$before = "coin_code";
$parts = explode("_", $coin_code); //アンダーバーで配列に分割

$coin_mind = $parts[0];
$coin_value = intval($parts[1]);
$userid  = $_SESSION['id'];


//2. DB接続します(エラー処理追加)
//$pdo = db_conn(); //←関数実行functions.phpに保管
// //DB接続
// $dbn = 'mysql:dbname=gsf_d03_db01;charset=utf8;port=3306;host=localhost';
// $user = 'root';
// $pwd = 'root';

// try {
//     $pdo = new PDO($dbn, $user, $pwd);
// } catch (PDOException $e) {
//     exit('dbError:' . $e->getMessage());
// }

//データ登録SQL作成
$sql = 'INSERT INTO coin_post(id ,userid , coin_title, coin_text, indate, coin_code, coin_mind, coin_value, coin_open)
VALUES(NULL, :a1, :a2, :a3, sysdate(), :a4, :a5, :a6, :a7)';

// a01 userId
// a02 coin_title
// a03 coin_text
// a04 coin_code
// a05 coin_mind
// a06 coin_value
// a07 coin_open


// $sql = 'INSERT INTO gs_mypantry_table(id, product, category, kane_price, basyo_place, comment, indate, enough, ONOFF) 
// VALUES(NULL, :mp222, :mp333, :mp444,:mp555,:mp666, sysdate(),:mp888,:mp999)';


$stmt = $pdo->prepare($sql);
$stmt->bindValue(':a1', $userid, PDO::PARAM_STR);    //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':a2', $coin_title, PDO::PARAM_STR);   //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':a3', $coin_text, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':a4', $coin_code, PDO::PARAM_STR);   //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':a5', $coin_mind, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':a6', $coin_value, PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':a7', $coin_open, PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$status = $stmt->execute();

$_SESSION['last_mind'] = $coin_mind;
$_SESSION['last_value'] = $coin_value;

// var_dump($stmt);
// exit();



// $url = "Location: feedback.php";
$feedback = rand(1, 2);
$feedbackmoji = strval($feedback);
// $url = "Location: index" . $feedbackmoji . ".php";
$url = "Location: feadback.php";

// var_dump($url);


//４．データ登録処理後
if ($status == false) {
    //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
    $error = $stmt->errorInfo();
    exit('sqlError:' . $error[2]);
} else {
    //５．index.phpへリダイレクト
    header($url);
    // header('Location: index.php');
    // header($url);
}
