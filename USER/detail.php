<?php
session_start(); // セッションの開始

include('functions.php'); //←関数を記述したファイルの読み込み
$pdo = db_conn(); //←関数実行

// var_dump($_SESSION['kanri_flg']);
// exit();
// ログイン状態のチェック
chk_ssid(); // idチェック関数の実行
kanri_Check(); // idチェック関数の実行



// getで送信されたidを取得
$id = $_GET['id'];

//DB接続します
$pdo = db_conn(); //←関数実行

//データ登録SQL作成，指定したidのみ表示する
$sql = 'SELECT * FROM gs_bm_table WHERE id=:id';
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$status = $stmt->execute();

//データ表示
if ($status == false) {
    // エラーのとき
    errorMsg($stmt);
} else {
    // エラーでないとき
    $rs = $stmt->fetch();
    // fetch()で1レコードを取得して$rsに入れる
    // $rsは配列で返ってくる．$rs["id"], $rs["task"]などで値をとれる
    // var_dump()で見てみよう
}
?>


<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>todo更新ページ</title>
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
            <a class="navbar-brand" href="#">ユーザー情報更新</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="../select.php">パントリーへ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">新規登録</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="select.php">ユーザーのみなさん</a>
                    </li>

                </ul>
                </ul>
            </div>
        </nav>
    </header>
    <!-- // 01 Uname
    // 02 lid
    // 03 lpw,
    // 04 kanri_flg
    // 05 life_flg -->
    <form method="post" action="update.php">
        <div class="form-group">
            <label for="Uname">ユーザー名</label>
            <!-- 受け取った値をvaluesに埋め込もう -->
            <input type="text" class="form-control" id="Uname" name="Uname" value="<?= $rs['Uname'] ?>">
        </div>
        <div class="form-group">
            <label for="lid">ユーザーID</label>
            <!-- 受け取った値をvaluesに埋め込もう -->
            <input type="text" class="form-control" id="lid" name="lid" value="<?= $rs['lid'] ?>">
        </div>
        <div class="form-group">
            <label for="lid">ユーザーPW</label>
            <!-- 受け取った値をvaluesに埋め込もう -->
            <input type="text" class="form-control" id="lpw" name="lpw" value="<?= $rs['lpw'] ?>">
        </div>
        <div class="form-group">
            <label for="kanri_flg">一般：0，管理者：1</label>
            <!-- 受け取った値をvaluesに埋め込もう -->
            <input type="text" class="form-control" id="kanri_flg" name="kanri_flg" value="<?= $rs['kanri_flg'] ?>">
        </div>
        <div class="form-group">
            <label for="kanri_flg">アクティブ：0，非アクティブ：1</label>
            <!-- 受け取った値をvaluesに埋め込もう -->
            <input type="text" class="form-control" id="life_flg" name="life_flg" value="<?= $rs['life_flg'] ?>">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
        <!-- idは変えたくない = ユーザーから見えないようにする重要重要重要-->
        <input type="hidden" name="id" value="<?= $rs['id'] ?>">
    </form>

</body>

</html>