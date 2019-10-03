<?php
include('../functions.php'); //←関数を記述したファイルの読み込み
$pdo = db_conn(); //←関数実行

// ログイン状態のチェック
USERchk_ssid(); // idチェック関数の実行
kanri_Check(); // idチェック関数の実行



if (
    !isset($_POST['Uname']) || $_POST['Uname'] == '' ||
    !isset($_POST['lid']) || $_POST['lid'] == '' ||
    !isset($_POST['lpw']) || $_POST['lpw'] == ''
) {
    exit('ParamError');
}



$Uname = $_POST['Uname'];
$lid = $_POST['lid'];
$lpw = $_POST['lpw'];
$kanri_flg = $_POST['kanri_flg'];
$life_flg = $_POST['life_flg'];


//2. DB接続します(エラー処理追加)
$pdo = db_conn(); //←関数実行functions.phpに保管
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
$sql = 'INSERT INTO gs_bm_table(id, Uname, lid, lpw, kanri_flg, life_flg)
VALUES(NULL, :a1, :a2, :a3, :a4,:a5)';

// 01 Uname
// 02 lid
// 03 lpw,
// 04 kanri_flg
// 05 life_flg


$stmt = $pdo->prepare($sql);
$stmt->bindValue(':a1', $Uname, PDO::PARAM_STR);    //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':a2', $lid, PDO::PARAM_STR);   //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':a3', $lpw, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':a4', $kanri_flg, PDO::PARAM_INT);   //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':a5', $life_flg, PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$status = $stmt->execute();



//４．データ登録処理後
if ($status == false) {
    //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
    $error = $stmt->errorInfo();
    exit('sqlError:' . $error[2]);
} else {
    //５．index.phpへリダイレクト
    header('Location: index.php');
}
