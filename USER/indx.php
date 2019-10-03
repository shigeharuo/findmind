<?php
session_start(); // セッションの開始

include('functions.php'); //←関数を記述したファイルの読み込み
$pdo = db_conn(); //←関数実行

// var_dump($_SESSION['kanri_flg']);
// exit();
// ログイン状態のチェック
chk_ssid(); // idチェック関数の実行
kanri_Check(); // idチェック関数の実行

?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ユーザー登録</title>
    <link rel="stylesheet" href="../css/my.css">
    <style>
        div {
            padding: 10px;
            font-size: 16px;
        }
    </style>
</head>

<body class="body">

    <!-- <header>
        <nav class="navbar navbar-expand-lg navbar-light">
            <a class="navbar-brand" href="#">ユーザー登録</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="../select.php">パントリーへ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="select.php">ユーザーのみなさん</a>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="../logout.php">　|　ログアウト</a></li>
                </ul>
            </div>
        </nav>
    </header> -->

    <form method="post" action="insert.php">
        <div class="form-group">
            <label for="Uname">ユーザー名</label>
            <input type="text" class="form-control" id="Uname" name="Uname" placeholder="ユーザー名">
        </div>
        <div class="form-group">
            <label for="lid">ログインID</label>
            <input type="text" class="form-control" id="lid" name="lid" placeholder="ログインID">
        </div>
        <div class="form-group">
            <label for="lpw">ログインPW</label>
            <input type="text" class="form-control" id="lpw" name="lpw" placeholder="ログインPW">
        </div>
        <div class="form-MP">
            <label for="life_flg" class="MG0">性別</label>
            <select type="example" class="form-control" id="life_flg" name="life_flg">
                <option value="0">性別</option>
                <option value="1">男性</option>
                <option value="2">女性</option>
                <option value="9">その他</option>
                <option value="0">回答しない</option>
            </select>
        </div>

        <div>
            <label for="life_flg" class="MG0">生年月日</label>
            <select id="select_year" name="year"></select>年
            <select id="select_month" name="month"></select>月
            <select id="select_day" name="day"></select>日
        </div>
        <!-- <div class="form-MP">
            <label for="kanri_flg" class="MG0">般：0，管理者：1</label>
            <select type="example" class="form-control" id="kanri_flg" name="kanri_flg">
                <option value="0">一般：0</option>
                <option value="1">管理者：1</option>
            </select>
        </div> -->
        <!-- <div class="form-MP">
            <label for="life_flg" class="MG0">アクティブ：0，非アクティブ：1</label>
            <select type="example" class="form-control" id="life_flg" name="life_flg">
                <option value="0">アクティブ：0</option>
                <option value="1">非アクティブ：1</option>
            </select>
        </div> -->
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>

    </form>

</body>

</html>

<!-- 
(function(){
'use strict';

const select_year = document.getElementById('select_year');
const select_month = document.getElementById('select_month');
const select_day = document.getElementById('select_day');
let i;

function $set_year(){
// 年を生成(100年分)
for(i = 1919; i < 2020; i++){ let op=document.createElement('option'); op.value=i; op.text=i; select_year.appendChild(op); } function $set_month(){ // 月を生成(12) for(i=1; i <=12; i++){ let op=document.createElement('option'); op.value=i; op.text=i; select_month.appendChild(op); } } function $set_day(){ //日の選択肢を空にする let children=select_day.children while(children.length){ children[0].remove() } // 日を生成(動的に変える) if(select_year.value !=='' && select_month.value !=='' ){ const last_day=new Date(select_year.value,select_month.value,0).getDate() for (i=1; i <=last_day; i++) { let op=document.createElement('option'); op.value=i; op.text=i; select_day.appendChild(op); } } } // load時、年月変更時に実行する window.onload=function(){ $set_year(); $set_month(); $set_day(); select_year.addEventListener('change',$set_day) select_month.addEventListener('change',$set_day) } })(); -->