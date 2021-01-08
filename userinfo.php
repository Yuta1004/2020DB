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
    <h2 class="minititle">ユーザ情報</h2>
    <form class="center" style="width: 400px;">
        <div style="text-align: left;">
            <p><b>ユーザID</b>:          <input type="text" name="userid" value=<?php echo $_SESSION["studyq_userid"]; ?>></p>
            <p><b>ニックネーム</b>:       <input type="text" name="nickname" value=<?php echo $_SESSION["studyq_nickname"]; ?>></p>
            <p><b>パスワード</b>:         <input type="password" name="password"></p>
            <p><b>パスワード(確認用)</b>:  <input type="password" name="password_conf"></p>
        </div>
        <input type="submit" name="change" value="変更">
    </form>
</body>

</html>