<?php
session_start();

require "util_func.php";
requireLogin();

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
    <h2 class="minititle">投稿</h2>
    <form class="center" style="width: 45%;" method="POST" action="post_confirm.php">
        <div style="text-align: left;">
            <p><b>タイトル</b>:  <input type="text" size="80%" name="title"></p>
            <p><b>問題</b></p>
            <textarea rows="10" cols="90%" name="body"></textarea>
            <p><b>ひとこと</b>:  <input type="text" size="80%" name="tweet"></p>
        </div>
        <input type="submit" value="確認">
    </form>
</body>

</html>