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
    if(!$_SESSION["studyq_nickname"]) error(5);
}

function requireNotLogin() {
    if($_SESSION["studyq_nickname"]) error(6);
}

function error($errno) {
    header("Location: error.php?errno=$errno", true, 301);
    exit();
}
?>