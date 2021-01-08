<?php
session_start();

require "util_func.php";
requireLogin();

// Useinfo
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
    <h1 class="title" onclick="javascript:window.location='index.php';return false;"><u>Study Q</u></h1>
    <h2 class="minititle">投稿</h2>
    <form class="center" style="width: 45%;">
        <div style="text-align: left;">
            <p><b>タイトル</b>:           <input type="text" size="80%"></p>
            <p><b>問題</b></p>
            <textarea rows="10" cols="90%"></textarea>
            <p><b>ひとこと</b>:           <input type="text" size="80%"></p>
        </div>
        <input type="submit" value="投稿">
    </form>
</body>

</html>