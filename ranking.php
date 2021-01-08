<?php
session_start();

require "util_func.php";
list($mylink, $hdmsg) = getUserMsg();

// Get raning order by Valuations
$dbh = getDBHandler();
$sql = "select U.nickname as nickname, Q.question_id as question_id, Q.title as title, Q.date as date, Q.body as body, count(V.user_id) as count from Questions as Q inner join Users as U on Q.user_id=U.user_id left join Valuations as V on Q.question_id=V.question_id group by Q.question_id order by count desc, Q.date desc limit 5;";
$v_ranking_questions = $dbh->query($sql)->fetchAll();

// Get ranking order by Answer nums;
$sql = "select U.nickname as nickname, Q.question_id as question_id, Q.title as title, Q.date as date, Q.body as body, count(A.user_id) as count from Questions as Q inner join Users as U on Q.user_id=U.user_id left join Answers as A on Q.question_id=A.question_id group by Q.question_id order by count desc, date desc limit 5;";
$a_ranking_questions = $dbh->query($sql)->fetchAll();
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
    <h2 class="minititle">ランキング</h2>
    <hr>
    <ul class="menubar" style="width: 90%; margin-left: auto; margin-right: auto;">
        <li class="menubar" style="width: 50%; margin: 0px 10px 0px 10px;">
            <div style="width: 100%;">
                <h2 class="minititle"><i>難易度順</i></h2>
                <?php
                    foreach($v_ranking_questions as $question) {
                        $question_id = $question["question_id"];
                        $title = $question["title"];
                        $nickname = $question["nickname"];
                        $date = $question["date"];
                        $body = adjustmentStr($question["body"], 40);
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
                <h2 class="minititle"><i>回答数</i></h2>
                <?php
                    foreach($a_ranking_questions as $question) {
                        $question_id = $question["question_id"];
                        $title = $question["title"];
                        $nickname = $question["nickname"];
                        $date = $question["date"];
                        $body = adjustmentStr($question["body"], 40);
                        $count = $question["count"];
                        echo "<div class='listelement' style='width:70%; margin-left: auto; margin-right: auto;'>\n";
                        echo "<h3><b><u><a href='detail.php?id=$question_id'>$title</a></u></b></h3>\n";
                        echo "投稿者名: $nickname<br>\n";
                        echo "投稿日時: $date<br>\n";
                        echo "回答数: <i>$count</i><br><br>\n";
                        echo "<u>内容</u><br> <pre style='font-size:18px;'>$body</pre>\n";
                        echo "</div>";
                    }
                ?>
            </div>
        </li>
    </ul>
</body>

</html>