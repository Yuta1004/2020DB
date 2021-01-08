<?php
function getUserMsg() {
    $userid = $_COOKIE["studyq_userid"];
    $nickname = $_COOKIE["studyq_nickname"];
    if($userid && $nickname) {
        $mylink = "mypage.php";
        $hdmsg = "$nickname さんのマイページへ";
    } else {
        $mylink = "login.php";
        $hdmsg = "ログイン";
    }
    return array($mylink, $hdmsg);
}
?>