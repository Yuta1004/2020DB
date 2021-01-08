<?php
session_start();

require "util_func.php";
requireLogin();

list($mylink, $hdmsg) = getUserMsg();

$title = htmlspecialchars($_POST["title"]);
$body = htmlspecialchars($_POST["body"]);
$tweet = htmlspecialchars($_POST["tweet"]);

// Check
if(!($title && $body)) error(1);

// Post question
if($_POST["post"]) {
    try {
        $date = date("Y/m/d H:i:s", strtotime("+9hours"));
        $userid = $_SESSION["studyq_userid"];
        $sql = "insert into Questions (user_id, title, body, tweet, date) values (\"$userid\", \"$title\", \"$body\", \"$tweet\", \"$date\");";
        $result = getDBHandler()->query($sql);
    } catch (PDOException $e) {
        error(0);
    }
    message("正常に投稿処理が完了しました");
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
    <h1 class="title" onclick="javascript:window.location='/';return false;"><u>Study Q</u></h1>
    <h2 class="minititle">投稿</h2>
    <p class="center">この内容で投稿してもよろしいですか? <b>※投稿後の削除はできません</b></p>
    <form class="center" style="width: 45%;" method="POST" action="#">
        <div style="text-align: left;">
            <p><b>タイトル</b>:  <?php echo $title; ?></p>
            <p><b>問題</b></p>  <pre style="font-size: 20px;"><?php echo $body; ?></pre><br>
            <p><b>ひとこと</b>:  <?php echo $tweet; ?></p>
        </div>
        <input type="hidden" name="title" value=<?php echo $title; ?>>
        <textarea style="display: none;" name="body"><?php echo $body; ?></textarea>
        <input type="hidden" name="tweet" value=<?php echo $tweet; ?>>
        <input type="submit" name="post" value="投稿">
    </form>
</body>

</html>