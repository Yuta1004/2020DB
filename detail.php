<?php
// Useinfo
$userid = $_COOKIE["studyq_userid"];
$nickname = $_COOKIE["studyq_nickname"];
if($userid && $nickname) {
    $mylink = "mypage.php";
    $hdmsg = "$nickname さんのマイページへ";
} else {
    $mylink = "login.php";
    $hdmsg = "ログイン";
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
        <h3 style="text-align: right;"><a href=<?php echo $mylink; ?>><i><?php echo $hdmsg; ?></i></a></h3>
    </header>
    <h1 class="title" onclick="javascript:window.location='index.html';return false;"><u>Study Q</u></h1>
    <h2 class="minititle">投稿詳細</h2>
    <div class="center" style="width: 60%; text-align: left;">
        <div class="listelement">
            <p><b>投稿者名</b>: あああああ</p>
            <p><b>投稿日時</b>: 1970/01/01 00:00:00</p>
            <p><b>問題</b></p>
            <div>
                あああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああ…
            </div><br>
            <p><b>ひとこと</b>: あああああああああああああああああああああ</p>
            <p>
                <b>HELP!</b>: <i>9999</i>
                <button type="button" style="font-size: 10px; padding: 5px 10px 5px 10px;">HELP!する</button>
            </p>
        </div>
    </div>
    <hr>
    <p class="center"><b>0</b>件の回答があります</p>
    <div class="center" style="width: 70%;">
        <div class="listelement">
            <b>No.0</b><br>
            回答者名: あああ<br>
            回答日時: 1970/01/01 00:00:00<br><br>
            <u>回答内容</u><br>
            あああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああ…
        </div>
    </div>
    <hr>
    <form class="center" style="width: 45%;">
        <div style="text-align: left;">
            <p><b>回答</b></p>
            <textarea rows="10" cols="90%"></textarea>
        </div>
        <input type="submit" value="投稿">
    </form>
</body>

</html>