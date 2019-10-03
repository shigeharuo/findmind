<?php
session_start(); // セッションの開始

include('functions.php'); //←関数を記述したファイルの読み込み
$pdo = db_conn(); //←関数実行

// var_dump($_SESSION['kanri_flg']);
// exit();
// ログイン状態のチェック
chk_ssid(); // idチェック関数の実行
kanri_Check(); // idチェック関数の実行



//データ表示SQL作成
$sql = 'SELECT * FROM gs_bm_table';
$stmt = $pdo->prepare($sql);
$status = $stmt->execute();

//データ表示
$view = '';
if ($status == false) {
    //execute（SQL実行時にエラーがある場合）
    $error = $stmt->errorInfo();
    exit('sqlError:' . $error[2]);
} else {
    //Selectデータの数だけ自動でループしてくれる
    //http://php.net/manual/ja/pdostatement.fetch.php
    while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $view .= '<li class="list-group-item">';
        $view .= '<p>' . $result['Uname'] . '-' . $result['lid'] . '-' . $result['lpw'] . '-' . $result['kanri_flg'] . '-' . $result['life_flg'] . '</p>';
        $view .= '<a href="detail.php?id=' . $result[id] . '" class="badge badge-primary">Edit</a> '; //更新ボタンを表示
        $view .= '<a href="delete.php?id=' . $result[id] . '" class="badge badge-danger">Delete</a>'; //削除ボタンを表示PHPページにIDへ飛ばす
        $view .= '</li>';
    }
}
?>



<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>todoリスト表示</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/my.css">
    <style>
        div {
            padding: 10px;
            font-size: 16px;
        }
    </style>
</head>

<body class="body">
    <header>
        <nav class="navbar navbar-expand-lg navbar-light">
            <a class="navbar-brand" href="#">ユーザーのみなさん</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">新規登録</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../select.php">パントリーへ</a>
                    </li>
                    <!-- <li class="nav-item">
                        <a class="nav-link" href="select.php">確認一覧</a>
                    </li> -->
                    <li class="nav-item"><a class="nav-link" href="../logout.php">　|　ログアウト</a></li>
                </ul>
            </div>
        </nav>
    </header>

    <div>
        <ul class="list-group">
            <?= $view ?>
        </ul>
    </div>

</body>

</html>