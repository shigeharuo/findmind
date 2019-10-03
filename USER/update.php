<?php
// 関数ファイル読み込み
include('functions.php'); //←関数を記述したファイルの読み込み
// var_dump($_POST);
// exit();
//入力チェック(受信確認処理追加)
if (
    !isset($_POST['Uname']) || $_POST['Uname'] == '' ||
    !isset($_POST['lid']) || $_POST['lid'] == '' ||
    !isset($_POST['lpw']) || $_POST['lpw'] == ''
) {
    exit('ParamError');
}
// }

//POSTデータ取得
$id = $_POST['id']; //インサートとほぼ一緒＿IDも入れる
$Uname = $_POST['Uname'];
$lid = $_POST['lid'];
$lpw = $_POST['lpw'];
$kanri_flg = $_POST['kanri_flg'];
$life_flg = $_POST['life_flg'];


//DB接続します(エラー処理追加)
$pdo = db_conn(); //←関数実行
// 01 Uname
// 02 lid
// 03 lpw,
// 04 kanri_flg
// 05 life_flg
//データ登録SQL作成
$sql = 'UPDATE gs_bm_table SET Uname=:a1, lid=:a2, lpw=:a3,  kanri_flg=:a4, life_flg=:a5 WHERE id=:id';
//WHERE id=:idを入れないと全てが変わる。「どこの」を入れる
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':a1', $Uname, PDO::PARAM_STR);
$stmt->bindValue(':a2', $lid, PDO::PARAM_STR);
$stmt->bindValue(':a3', $lpw, PDO::PARAM_STR);
$stmt->bindValue(':a4', $kanri_flg, PDO::PARAM_INT);
$stmt->bindValue(':a5', $life_flg, PDO::PARAM_INT);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$status = $stmt->execute();

//4 ．デ ータ登録処理後
if ($status == false) {
    errorMsg($stmt);
} else {
    header('Location: select.php'); //一覧画面にリダイレクト
    exit;
}
