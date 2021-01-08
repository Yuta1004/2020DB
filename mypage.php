<?php
session_start();

require "util_func.php";
requireLogin();
?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <h1 class="title" onclick="javascript:window.location='/';return false;"><u>Study Q</u></h1>
    <h2 class="minititle">マイページ</h2><br><br>
    <div class="center">
        <button type="button">投稿一覧</button><br><br><br>
        <button type="button">回答一覧</button><br><br><br>
        <button type="button">ユーザ情報確認・変更</button><br><br><br>
        <button type="button" onclick="javascript:window.location='logout.php';return false;">ログアウト</button><br><br><br>
    </div>
</body>

</html>