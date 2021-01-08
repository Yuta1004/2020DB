<?php
function getUserMsg() {
    $nickname = $_SESSION["studyq_nickname"];
    if($nickname) {
        $mylink = "mypage.php";
        $hdmsg = "$nickname さんのマイページへ";
    } else {
        $mylink = "login.php";
        $hdmsg = "ログイン";
    }
    return array($mylink, $hdmsg);
}

function getDBHandler() {
    // Create MySQL Connection
    try {
        $dbh = new PDO("mysql:dbhost=localhost;dbname=db2020;unix_socket=/tmp/mysql.sock", "db2020", "db2020");
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $dbh->query("set names utf8");
    } catch (PDOException $e) {
        echo $e->getMessage();
        exit();
    }
    return $dbh;
}

function requireLogin() {
    if(!$_SESSION["studyq_nickname"]) error(5);
}

function requireNotLogin() {
    if($_SESSION["studyq_nickname"]) error(6);
}

function error($errno) {
    header("Location: error.php?errno=$errno", true, 301);
    exit();
}

function message($msg) {
    header("Location: message.php?msg=$msg", true, 301);
    exit();
}
?>