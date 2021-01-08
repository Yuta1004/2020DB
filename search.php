<?php
session_start();

// Useinfo
require "util_func.php";
list($mylink, $hdmsg) = getUserMsg();
?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <header>
        <h3 style="text-align: right;"><a href=<?php echo $mylink; ?>><i><?php echo $hdmsg; ?></i></a></h3>
    </header>
    <h1 class="title" onclick="javascript:window.location='/';return false;"><u>Study Q</u></h1>
    <h2 class="minititle">検索</h2>
    <hr>
    <form class="center" style="width: 30%;">
        <input type="radio" name="search_target">ユーザID
        <input type="radio" name="search_target" checked>投稿本文<br>
        <input type="text" size="40">
        <input type="submit" value="検索">
    </form>
    <hr>
    <p class="center"><b>0</b>件の投稿がヒットしました</p>
    <div class="center" style="width: 70%;">
        <div class="listelement">
            <b>タイトル</b><br>
            投稿者名: あああ<br>
            投稿日時: 1970/01/01 00:00:00<br>
            HELP!: <i>9999</i><br><br>
            <u>内容</u><br>
            あああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああ…
        </div>
    </div>
</body>

</html>