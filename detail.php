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
$user_id = $question_info["user_id"];
$nickname = $question_info["nickname"];
$title = $question_info["title"];
$body = $question_info["body"];
$tweet = $question_info["tweet"];
$date = $question_info["date"];

// Get answers
$sql = "select * from Answers as A inner join Users as U on A.user_id=U.user_id where question_id=\"$question_id\" order by date asc;";
$answers = $dbh->query($sql)->fetchAll();

// Get valuations
$sql = "select count(*) as count from Valuations where question_id=\"$question_id\";";
$help = $dbh->query($sql)->fetch()["count"];
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
                <form style="width: 0px; border: 0px; margin: 0px;" method="POST" action="valuation_confirm.php">
                    <input type="hidden" name="question_id" value=<?php echo $question_id; ?>>
                    <input type="submit" value="HELP!する">
                </form>
            </p>
            <?php
                if($_SESSION["studyq_is_operator"]) {
                    echo "<p><a href='setvisible_confirm.php?genre=Questions&question_id=$question_id&user_id=$user_id'>投稿管理を行う</a></p>";
                }
            ?>
        </div>
    </div>
    <hr>
    <p class="center"><b><?php echo count($answers); ?></b>件の回答があります</p>
    <div class="center" style="width: 70%;">
        <?php
            $idx = 1;
            foreach($answers as $answer) {
                $user_id = $answer["user_id"];
                $nickname = $answer["nickname"];
                $date = $answer["date"];
                $body = $answer["body"];
                echo "<div class=\"listelement\">";
                echo "<b>No.$idx</b><br>\n";
                echo "回答者名: $nickname<br>\n";
                echo "回答日時: $date<br><br>\n";
                echo "<u>回答内容</u><br> <pre style='font-size:15px;'>$body</pre>\n";
                if($_SESSION["studyq_is_operator"]) {
                    echo "<p><a href='setvisible_confirm.php?genre=Answers&question_id=$question_id&user_id=$user_id'>投稿管理を行う</a></p>";
                }
                echo "</div>\n";
                ++ $idx;
            }
        ?>
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