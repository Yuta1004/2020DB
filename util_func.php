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

function requireLogin() {
    if(!$_SESSION["studyq_nickname"]) {
        header("Location: error.php?errno=5", true, 301);
        exit();
    }
}

function requireNotLogin() {
    if($_SESSION["studyq_nickname"]) {
        header("Location: error.php?errno=6", true, 301);
        exit();
    }
}
?>