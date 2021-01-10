<?php
session_start();

require "util_func.php";
requireLogin();

list($mylink, $hdmsg) = getUserMsg();

// Check
$question_id = $_POST["question_id"];
if(!$question_id) error(0, "/");

// Post answer
if($_POST["help"]) {
    try {
        $userid = $_SESSION["studyq_userid"];
        $sql = "insert into Valuations values (\"$question_id\", \"$userid\");";
        $result = getDBHandler()->query($sql);
    } catch (PDOException $e) {
        error(9, "/");
    }
    message("HELP!しました");
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
    <h2 class="minititle">HELP!する</h2>
    <p class="center">問題に対してHELP!します</p>
    <form class="center" style="width: 10%;" method="POST" action="#">
        <input type="hidden" name="question_id" value=<?php echo $question_id; ?>>
        <input type="submit" name="help" value="HELP!">
    </form>
</body>

</html>