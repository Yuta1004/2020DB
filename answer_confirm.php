<?php
session_start();

require "util_func.php";
requireLogin();

list($mylink, $hdmsg) = getUserMsg();

// Check
$question_id = $_POST["question_id"];
$body = htmlspecialchars($_POST["body"]);
if(!($question_id && $body)) error(1);

// Post answer
if($_POST["post"]) {
    try {
        $date = date("Y/m/d H:i:s", strtotime("+9hours"));
        $userid = $_SESSION["studyq_userid"];
        $sql = "insert into Answers values (\"$question_id\", \"$userid\", \"$body\", \"$date\");";
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
    <h2 class="minititle">回答投稿</h2>
    <p class="center">この内容で回答を投稿してもよろしいですか? <b>※投稿後の削除はできません</b></p>
    <form class="center" style="width: 45%;" method="POST" action="#">
        <div style="text-align: left;">
            <p><b>回答</b></p>  <pre style="font-size: 15px;"><?php echo $body; ?></pre><br>
        </div>
        <input type="hidden" name="question_id" value=<?php echo $question_id; ?>>
        <input type="hidden" name="body" value=<?php echo $body; ?>>
        <input type="submit" name="post" value="投稿">
    </form>
</body>

</html>