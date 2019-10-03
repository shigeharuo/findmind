<?php
//共通で使うものを別ファイルにしておきましょう。

//DB接続関数（PDO）
function db_conn()
{
    //1. DB接続
    $dbn = 'mysql:dbname=gsf_d03_db01;charset=utf8;port=3306;host=localhost';
    $user = 'root';
    $pwd = 'root';

    try {
        return new PDO($dbn, $user, $pwd);
    } catch (PDOException $e) {
        exit('dbError:' . $e->getMessage());
    }
}
// 管理者じゃなかったらしれーっとする
function kanri_Check()
{
    if ($_SESSION['kanri_flg'] == '0') {
        // ログイン失敗時の処理（ログイン画面に移動）
        header('Location: ../select.php');
    }
}

//SQL処理エラー
function errorMsg($stmt)
{
    $error = $stmt->errorInfo();
    exit('ErrorQuery:' . $error[2]);
}

function h($str)
{
    return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
}

// SESSIONチェック＆リジェネレイト
function chk_ssid()
{
    // 失敗時はログイン画面に戻る（セッションidがないor一致しない）一致しないとは、古いセッションでログインしようとしている可能性
    if (!isset($_SESSION['chk_ssid']) || $_SESSION['chk_ssid'] != session_id()) {
        // ログイン失敗時の処理（ログイン画面に移動）
        header('Location: index.php');
    } else {
        session_regenerate_id(true); // セッションidの再生成
        $_SESSION['chk_ssid'] = session_id(); // セッション変数に格納
    }
}

// menuを決める
function menuAdmin()
{
    $menuAdmin = '<div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">データ登録　|　</a>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="USER/select.php">ユーザー管理</a></li>
                    <li class="nav-item"><a class="nav-link" href="USER/index.php">ユーザー新規発行</a></li>
                    <li class="nav-item"><a class="nav-link" href="logout.php">　|　ログアウト</a></li>
                </ul>
            </div>';
    return $menuAdmin;
}

function menunormal()
{
    $menunormal = '<div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">データ登録　|　</a>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="logout.php">　|　ログアウト</a></li>
                </ul>
            </div>';
    return $menunormal;
}
