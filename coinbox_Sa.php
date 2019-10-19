<?php
// ここにphpの処理を記述しよう
include('functions.php'); //←関数を記述したファイルの読み込み
$pdo = db_conn(); //←関数実行

//データ表示SQL作成
// $sql = 'SELECT * FROM coin_post ORDER BY id DESC limit 1';
$sql = 'SELECT * FROM coin_post  where coin_mind = "Sa" ORDER BY indate DESC';
$allcoin = 'SELECT coin_value FROM coin_post where coin_mind = "Ru" ';
// $sql = 'SELECT * FROM HIP_TAKE_HIP ORDER BY indate DESC';
$stmt = $pdo->prepare($sql);
$status = $stmt->execute();



// var_dump($sum_coin);
// exit();

// 投稿を表示させるはじまり
if ($status == false) {
    showSqlErrorMsg($stmt);
} else {
    $view = ''; //白紙に戻るって感じリセットする意味
    while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
        // リピート表示
        $view .= '<div class="box_content_'  . $result['coin_mind']  . '">';
        $view .= '<div class="box_content_L"><img src="img/'  . $result['coin_code']  . '.png" class="coin"></div>';
        $view .= '<div class="box_content_R">';
        $view .= '<p class="box_R_title">' . $result['coin_title'] . '</p>';
        $view .= '<p class="box_R_indate">' . $result['indate'] . '</p> ';
        $view .= '<p class="box_R_comment">' . $result['coin_text'] . '</p> ';
        $view .= '</div>';
        $view .= '</div>';
    }
}
// 投稿を表示させるおわり

// マインドコインを集計する。
$sql_sum = 'SELECT SUM(coin_value) as coin_value FROM coin_post GROUP BY coin_mind';
$stmt_sum = $pdo->prepare($sql_sum);
$status = $stmt_sum->execute();

$values = array();
if ($status == false) {
    showSqlErrorMsg($stmtR);
} else {
    //白紙に戻るって感じリセットする意味
    while ($result = $stmt_sum->fetch(PDO::FETCH_ASSOC)) {
        // リピート表示
        array_push($values, $result['coin_value']);
    }
}
$Ru_sum = $values[0];
$Sa_sum = $values[1];
// マインドコインを集計する。
?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>put a coin</title>
    <!-- <link href="https://fonts.googleapis.com/css?family=Barlow:700,700i|M+PLUS+1p&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="https://use.typekit.net/scr0ulr.css"> -->
    <?php readfile('LINK.html'); ?>
</head>

<body>

    <!-- <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#">PUT_A_COIN</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">todo登録</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="select.php">todo一覧</a>
                    </li>
                </ul>
            </div>
        </nav>
    </header> -->
    <div class="topnavi_area">
        <div class="navi_LLL"><a href="put_a_coin.php">気持ちを貯金する</a></div>
        <div class="navi_RuSa"><a href="coinbox.php"><img src="img/TOP_RuOFF.png" alt=""></a></div>
        <div class="navi_yajirusi"><a href="coinbox_Ru.php"><img src="img/TOP_RuSaOFF.png" alt=""></a></div>
        <div class="navi_RuSa"><img src="img/TOP_SaON.png" alt=""></div>
    </div>
    <div class="navi_COIN_Sa">
        現在の悲しみサファイヤ貯金額は <B><?= $Sa_sum ?> です</B>
    </div>
    <?= $view ?>
    <form method="post" action="insert.php" enctype="multipart/form-data">
        <!-- コインを決める -->
        <div class="mainBOX">

            <div class="coin_area">
                <div class="Ru500box">
                    <input type="radio" id="Ru500_radio" name="coin_code" value="Ru_500">
                    <label for="Ru500_radio"></label>
                </div>
                <p class="Ru100box">
                    <input type="radio" id="Ru100_radio" name="coin_code" value="Ru_100">
                    <label for="Ru100_radio">
                    </label>
                </p>
                <p class="Ru050box">
                    <input type="radio" id="Ru050_radio" name="coin_code" value="Ru_50">
                    <label for="Ru050_radio">
                    </label>
                </p>
                <p class="Ru010box">
                    <input type="radio" id="Ru010_radio" name="coin_code" value="Ru_10">
                    <label for="Ru010_radio">
                    </label>
                </p>
                <p class="Ru005box">
                    <input type="radio" id="Ru005_radio" name="coin_code" value="Ru_5">
                    <label for="Ru005_radio">
                    </label>
                </p>
                <p class="Ru001box">
                    <input type="radio" id="Ru001_radio" name="coin_code" value="Ru_1">
                    <label for="Ru001_radio">
                    </label>
                </p>

                <!-- fffffffff -->
                <p class="coinbox">
                    <img src="img/coinbox.png" alt="">
                </p>

                <!-- fffffffff -->

                <p class="Sa001box">
                    <input type="radio" id="Sa001_radio" name="coin_code" value="Sa_1">
                    <label for="Sa001_radio">
                    </label>
                </p>
                <p class="Sa005box">
                    <input type="radio" id="Sa005_radio" name="coin_code" value="Sa_5">
                    <label for="Sa005_radio">
                    </label>
                </p>
                <p class="Sa010box">
                    <input type="radio" id="Sa010_radio" name="coin_code" value="Sa_10">
                    <label for="Sa010_radio">
                    </label>
                </p>
                <p class="Sa050box">
                    <input type="radio" id="Sa050_radio" name="coin_code" value="Sa_50">
                    <label for="Sa050_radio">
                    </label>
                </p>
                <p class="Sa100box">
                    <input type="radio" id="Sa100_radio" name="coin_code" value="Sa_100">
                    <label for="Sa100_radio">
                    </label>
                </p>
                <div class="Sa500box">
                    <input type="radio" id="Sa500_radio" name="coin_code" value="Sa_500">
                    <label for="Sa500_radio"></label>
                </div>

            </div>



            <input type="text" class="PUT_titlearea" id="title" name="coin_title">
            <div class="PUTtextbox">
                <textarea class="PUT_textarea" id="comment" name="coin_text" rows="3"></textarea>
            </div>

            <input type="hidden" name="coin_open" value="0">
            <input type="checkbox" name="coin_open" value="1">投稿を他の人が読んでもOK


            <div class="form-group">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
    </form>
    <?php include('/coinbox.php'); ?>

    </div>
</body>

</html>