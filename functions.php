<?php
//共通で使うものを別ファイルにしておきましょう。

//DB接続関数（PDO）
function db_conn()
{
    //1. DB接続（別途送ります）
    $dbn = 'mysql:dbname=enoki;charset=utf8;port=3306;host=localhost';
    $user = 'root';
    $pwd = 'root';

    try {
        return new PDO($dbn, $user, $pwd);
    } catch (PDOException $e) {
        exit('dbError:' . $e->getMessage());
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


function coin_V()
{
    $sql_sum = 'SELECT SUM(coin_value) as coin_value FROM coin_post GROUP BY coin_mind';
    $stmt_sum = $pdo->prepare($sql_sum);
    $status = $stmt_sum->execute();

    $values = array();
    // if ($status == false) {
    //     showSqlErrorMsg($stmtR);
    // } else {
    //白紙に戻るって感じリセットする意味
    while ($result = $stmt_sum->fetch(PDO::FETCH_ASSOC)) {
        // リピート表示
        array_push($values, $result['coin_value']);
    }

    $Ru_sum = $values[0];
    $Sa_sum = $values[1];
}
