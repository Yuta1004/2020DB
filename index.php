<?php
session_start();

require "util_func.php";
list($mylink, $hdmsg) = getUserMsg();

// Get raning order by Valuations
$dbh = getDBHandler();
$sql = "select U.nickname as nickname, Q.question_id as question_id, Q.title as title, Q.date as date, Q.body as body, count(V.user_id) as count from Questions as Q inner join Users as U on Q.user_id=U.user_id left join Valuations as V on Q.question_id=V.question_id group by Q.question_id order by Q.date desc limit 5;";
$latest_questions = $dbh->query($sql)->fetchAll();

// Get ranking order by Answer nums;
$sql = "select U.nickname as nickname, Q.question_id as question_id, Q.title as title, Q.date as date, Q.body as body, count(V.user_id) as count, rand() as random from Questions as Q inner join Users as U on Q.user_id=U.user_id left join Valuations as V on Q.question_id=V.question_id group by Q.question_id order by random, Q.date desc limit 5;";
$pickup_questions = $dbh->query($sql)->fetchAll();
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
    <h2 class="minititle" style="width: 100%;">分からない・気になっている問題を投稿してみよう！</h2>
    <ul class="menubar" style="padding-left: 40px;">
        <li class="menubar"><button type="button" onclick="javascript:window.location='post.php';return false;">投稿</button></li>
        <li class="menubar"><button type="button" onclick="javascript:window.location='search.php';return false;">検索</button></li>
        <li class="menubar"><button type="button" onclick="javascript:window.location='ranking.php';return false;">ランキング</button></li>
    </ul>
    <hr>
    <ul class="menubar" style="width: 90%; margin-left: auto; margin-right: auto;">
        <li class="menubar" style="width: 50%; margin: 0px 10px 0px 10px;">
            <div style="width: 100%;">
                <h2 class="minititle"><i>新着</i></h2>
                <?php
                    foreach($latest_questions as $question) {
                        $question_id = $question["question_id"];
                        $title = $question["title"];
                        $nickname = $question["nickname"];
                        $date = $question["date"];
                        $body = $question["body"];
                        $count = $question["count"];
                        echo "<div class='listelement' style='width:70%; margin-left: auto; margin-right: auto;'>\n";
                        echo "<h3><b><u><a href='detail.php?id=$question_id'>$title</a></u></b></h3>\n";
                        echo "投稿者名: $nickname<br>\n";
                        echo "投稿日時: $date<br>\n";
                        echo "HELP!: <i>$count</i><br><br>\n";
                        echo "<u>内容</u><br> <pre style='font-size:18px;'>$body</pre>\n";
                        echo "</div>";
                    }
                ?>
            </div>
        </li>
        <li class="menubar">
            <div class="center" style="background-color:gray; width: 2px; height:1500px;"></div>
        </li>
        <li class="menubar" style="width: 50%; margin: 0px 10px 0px 10px;">
            <div style="width: 100%;">
                <h2 class="minititle"><i>ピックアップ</i></h2>
                <?php
                    foreach($pickup_questions as $question) {
                        $question_id = $question["question_id"];
                        $title = $question["title"];
                        $nickname = $question["nickname"];
                        $date = $question["date"];
                        $body = $question["body"];
                        $count = $question["count"];
                        echo "<div class='listelement' style='width:70%; margin-left: auto; margin-right: auto;'>\n";
                        echo "<h3><b><u><a href='detail.php?id=$question_id'>$title</a></u></b></h3>\n";
                        echo "投稿者名: $nickname<br>\n";
                        echo "投稿日時: $date<br>\n";
                        echo "HELP!: <i>$count</i><br><br>\n";
                        echo "<u>内容</u><br> <pre style='font-size:18px;'>$body</pre>\n";
                        echo "</div>";
                    }
                ?>
            </div>
        </li>
    </ul>
</body>

</html>