<?php
$userid = htmlspecialchars($_POST["userid"]);
$pw = $_POST["password"];

// Login
if($_POST["login"]) {
    // Check
    if(!($userid && $pw)) {
        header("Location: error.php?errno=1", true, 301);
        exit();
    }

    // Create MySQL Connection
    try {
        $dbh = new PDO("mysql:dbhost=localhost;dbname=db2020;unix_socket=/tmp/mysql.sock", "db2020", "db2020");
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $dbh->query("set names utf8");
    } catch (PDOException $e) {
        echo $e->getMessage();
        exit();
    }

    // User valid process
    $userinfo = $dbh->query("select nickname, hashed_pw from Users where user_id=\"$userid\";")->fetch();
    if(!$userinfo) {
        header("Location: error.php?errno=4", true, 301);
        exit();
    }
    if($userinfo["hashed_pw"] != crypt($pw, "1204chino4021")) {
        header("Location: error.php?errno=4", true, 301);
        exit();
    }
    setcookie("studyq_userid", $userid);     // (´・ω・｀)
    setcookie("studyq_nickname", $userinfo["nickname"]);
    header("Location: /", true, 301);
}
?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <header>
        <h3 style="text-align: right;"><a href="mypage.html"><i>○○さんのマイページへ</i></a></h3>
    </header>
    <h1 class="title" onclick="javascript:window.location='index.html';return false;"><u>Study Q</u></h1>
    <h2 class="minititle">ログイン</h2>
    <form class="center" style="width: 400px;" method="POST" action="#">
        <div style="text-align: left;">
            <p><b>ユーザID</b>:     <input type="text" name="userid"></p>
            <p><b>パスワード</b>:    <input type="password" name="password"></p>
        </div>
        <input type="submit" name="login" value="ログイン">
    </form>
</body>

</html>