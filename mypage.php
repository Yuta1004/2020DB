<?php
session_start();

require "util_func.php";
requireLogin();

$userid = $_SESSION["studyq_userid"];
$query_q_list = "search.php?genre=Questions&target=user_id&keyword=$userid";
$query_a_list = "search.php?genre=Answers&target=user_id&keyword=$userid";
?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <h1 class="title" onclick="javascript:window.location='/';return false;"><u>Study Q</u></h1>
    <h2 class="minititle">マイページ</h2><br><br>
    <?php
        if($_SESSION["studyq_is_operator"]) {
            echo "<hr style='margin-top: 0px;'>";
            echo "<h3 class='center' style='color: #FF0000;'><u>あなたはシステム管理者です</u></p>";
            echo "<button type='button' onclick='javascript:window.location=\"allview.php\";return false;'>投稿の管理を行う</button><br><br><br>";
            echo "<hr style='margin-top: 0px;'>";
        }
    ?>
    <div class="center">
        <button type="button" onclick="javascript:window.location='<?php echo $query_q_list; ?>';return false;">自身の投稿一覧</button><br><br><br>
        <button type="button" onclick="javascript:window.location='<?php echo $query_a_list; ?>';return false;">自身の回答一覧</button><br><br><br>
        <button type="button" onclick="javascript:window.location='userinfo.php';return false;">ユーザ情報確認・変更</button><br><br><br>
        <button type="button" onclick="javascript:window.location='logout.php';return false;">ログアウト</button><br><br><br>
    </div>
</body>

</html>