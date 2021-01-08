<?php
session_start();

require "util_func.php";
requireNotLogin();

// Check
if(!($_POST["userid"] && $_POST["nickname"] && $_POST["password"] && $_POST["password_conf"])) {
    goto __exit;
}
$userid = $_POST["userid"];
$nicnkame = $_POST["nickname"];
$password = $_POST["password"];
$password_conf = $_POST["password_conf"];
if($password != $password_conf) {
    goto __exit;
}

// Define MySQL Connection Info
define("DB_DATABASE", "db2020");
define("DB_USERNAME", "db2020");
define("DB_PASSWORD", "db2020");
define("PDO_DSN", "mysql:dbhost=localhost;dbname=db2020;unix_socket=/tmp/mysql.sock");

// Create MySQL Connection
try {
    $dbh = new PDO(PDO_DSN, DB_USERNAME, DB_PASSWORD);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $dbh->query("set names utf8");
} catch (PDOException $e) {
    echo $e->getMessage();
    exit();
}

__exit:?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <h1 class="title" onclick="javascript:window.location='index.php';return false;"><u>Study Q</u></h1>
    <h2 class="minititle">ユーザ登録</h2>
    <form class="center" style="width: 400px;" method="POST" action="register_confirm.php">
        <div style="text-align: left;">
            <p><b>ユーザID</b>:          <input type="text" name="userid"></p>
            <p><b>ニックネーム</b>:       <input type="text" name="nickname"></p>
            <p><b>パスワード</b>:         <input type="password" name="password"></p>
            <p><b>パスワード(確認用)</b>:  <input type="password" name="password_conf"></p>
        </div>
        <input type="submit" value="確認">
    </form>
</body>

</html>