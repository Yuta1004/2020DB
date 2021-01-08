<?php
session_start();

require "util_func.php";
list($mylink, $hdmsg) = getUserMsg();

// Exists check
if(!$_GET["id"]) error(8);
$dbh = getDBHandler();
$question_id = $_GET["id"];
$sql = "select * from Questions as Q inner join Users as U on Q.user_id=U.user_id where question_id=\"$question_id\";";
$question_info = $dbh->query($sql)->fetch();
if(!$question_info) error(8);

// Get question info
$nickname = $question_info["nickname"];
$title = $question_info["title"];
$body = $question_info["body"];
$tweet = $question_info["tweet"];
$date = $question_info["date"];
$help = 0;
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
    <h2 class="minititle">投稿詳細</h2>
    <div class="center" style="width: 60%; text-align: left;">
        <div class="listelement">
            <p><b>投稿者名</b>: <?php echo $nickname; ?></p>
            <p><b>投稿日時</b>: <?php echo $date; ?></p>
            <p><b>問題</b></p> <pre style="font-size: 20px;"><?php echo $body; ?></pre><br>
            <p><b>ひとこと</b>: <?php echo $tweet; ?></p>
            <p>
                <b>HELP!</b>: <i><?php echo $help; ?></i>
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
    <form class="center" style="width: 45%;" method="POST" action="answer_confirm.php">
        <div style="text-align: left;">
            <p><b>回答</b></p>
            <textarea rows="10" cols="90%" name="body"></textarea>
        </div>
        <input type="hidden" name="question_id" value=<?php echo $question_id; ?>>
        <input type="submit" value="投稿">
    </form>
</body>

</html>