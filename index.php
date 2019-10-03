<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>FIND MIND</title>
    <link href="https://fonts.googleapis.com/css?family=Barlow:700,700i|M+PLUS+1p&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/main.css">
</head>

<body>

    <!-- <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#">todo登録</a>
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

    <!-- 必要な属性を追加 -->
    <div class="mainBOX">
        <!-- <form method="post" action="login_act.php"> -->
        <form method="post" action="coinbox.php">
            <div class="toprogo">
                <img src="img/toprogo.png" class="toprogo" alt="">
            </div>
            <div class="form-group">
                <label for="lid">Email</label>
                <input type="text" class="PUT_titlearea" id="lid" name="lid" placeholder="ログイン未実装">
            </div>
            <div class="form-group">
                <label for="lpw">Pass</label>
                <input type="password" class="PUT_titlearea" id="lpw" name="lpw" placeholder="このままログインボタンを押してください。">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">ログイン</button>
            </div>
        </form>
    </div>
</body>

</html>