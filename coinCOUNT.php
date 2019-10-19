<?php
// ここにphpの処理を記述しよう
include('functions.php'); //←関数を記述したファイルの読み込み
$pdo = db_conn(); //←関数実行



//コイン集計//コイン集計
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

?>


<h1>
    <?= $Ru_sum + $Sa_sum ?>
</h1>
<?= $Ru_sum  ?> <?= $Sa_sum ?>