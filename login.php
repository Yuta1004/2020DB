<?php
session_start();

require "util_func.php";
requireNotLogin();

$userid = htmlspecialchars($_POST["userid"]);
$pw = $_POST["password"];

// Login
if($_POST["login"]) {
    // Check
    if(!($userid && $pw)) error(1);

    // User valid process
    $sql = "select nickname, hashed_pw, is_operator from Users where user_id=\"$userid\";";
    $userinfo = getDBHandler()->query($sql)->fetch();
    if(!$userinfo || $userinfo["hashed_pw"] != crypt($pw, "1204chino4021")) {
        error(4);
    }
    $_SESSION["studyq_userid"] = $userid;
    $_SESSION["studyq_nickname"] = $userinfo["nickname"];
    $_SESSION["studyq_is_operator"] = $userinfo["is_operator"];
    message("ログインに成功しました");
}
?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <h1 class="title" onclick="javascript:window.location='/';return false;"><u>Study Q</u></h1>
    <h2 class="minititle">ログイン</h2>
    <form class="center" style="width: 400px;" method="POST" action="#">
        <div style="text-align: left;">
            <p><b>ユーザID</b>:     <input type="text" name="userid"></p>
            <p><b>パスワード</b>:    <input type="password" name="password"></p>
        </div>
        <input type="submit" name="login" value="ログイン">
    </form>
    <p class="center"><a href="register.php">ユーザ登録がまだの方はこちらへ</a></p>
</body>

</html>