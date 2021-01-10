<?php
session_start();

require "util_func.php";
requireLogin();

list($mylink, $hdmsg) = getUserMsg();

$genre = $_GET["genre"];
$user_id = $_GET["user_id"];
$question_id = $_GET["question_id"];

// Check
if(!($user_id && $question_id && $genre)) error(0, "/");
if(!in_array($genre, array("Questions", "Answers"))) error(0, "/");
if(!$_SESSION["studyq_is_operator"]) error(11);

// Post question
if($_POST["setvisible"]) {
    try {
        $visible = $_POST["isvisible"] == "visible" ? 1 : 0;
        $sql = "update $genre set visible=$visible where question_id=\"$question_id\" and user_id=\"$user_id\";";
        $result = getDBHandler()->query($sql);
    } catch (PDOException $e) {
        error(0, "/");
    }
    message("正常に更新処理が完了しました");
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
    <h2 class="minititle">投稿管理</h2>
    <p class="center">この投稿に対する操作を選択してください</p>
    <form class="center" style="width: 45%;" method="POST" action="#">
        <input type="radio" name="isvisible" value="visible" checked>表示
        <input type="radio" name="isvisible" value="invisible">非表示</br>
        <input type="submit" name="setvisible" value="設定">
    </form>
</body>

</html>