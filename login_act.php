<?php
//最初にSESSIONを開始！！
session_start();

//0.外部ファイル読み込み
include('functions.php');

//1.  DB接続&送信データの受け取り
$pdo = db_conn();

$email = $_POST['email'];
$password = $_POST['password'];


//2. データ登録SQL作成
$sql = 'SELECT * FROM coin_user WHERE email=:email AND password=:password';
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':email', $email, PDO::PARAM_STR);
$stmt->bindValue(':password', $password, PDO::PARAM_STR);
$res = $stmt->execute();

//3. SQL実行時にエラーがある場合
if ($res == false) {
    queryError($stmt);
}

//4. 抽出データ数を取得
$val = $stmt->fetch();

//5. 該当レコードがあればSESSIONに値を代入
if ($val['email'] != '') {
    // ログイン成功の場合はセッション変数に値を代入
    $_SESSION = array();    //空に
    $_SESSION['chk_ssid'] = session_id();
    $_SESSION['id'] = $val['id'];
    // $_SESSION['kanri_flg'] = $val['kanri_flg'];
    // $_SESSION['name'] = $val['name'];
    header('Location: coinbox.php');
} else {
    //ログイン失敗の場合はログイン画面へ戻る
    echo "<script type='text/javascript'>alert('ログインに失敗しました。再度ログインしてください');</script>";
    header('Location: index.php');
}



