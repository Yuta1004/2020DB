<?php
session_start();
if(!$_SESSION["studyq_is_operator"])
    $_SESSION["studyq_is_operator"] = 0;

require "util_func.php";
list($mylink, $hdmsg) = getUserMsg();

// Check
$page = $_GET["page"];
if(!$page || $page < 1) {
    $page = 1;
}

// Get all questions
$is_operator = $_SESSION["studyq_is_operator"];
$offset = ($page-1) * 10;
$sql = "select U.nickname as nickname, Q.question_id as question_id, Q.title as title, Q.date as date, Q.body as body, count(V.user_id) as count from Questions as Q inner join Users as U on Q.user_id=U.user_id left join Valuations as V on Q.question_id=V.question_id where Q.visible=1 or $is_operator=1 group by Q.question_id order by Q.date asc limit 10 offset $offset;";
$questions = getDBHandler()->query($sql)->fetchAll();

// Redirect
if(count($questions) == 0) {
    -- $page;
    header("Location: allview.php?page=$page", true, 301);
    exit();
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
    <h2 class="minititle">投稿一覧</h2>
    <hr>
    <p class="center"><b>ページ <? echo $page; ?></b></p>
    <div class="center" style="width: 70%;">
        <?php
            foreach($questions as $question) {
                $question_id = $question["question_id"];
                $title = $question["title"];
                $nickname = $question["nickname"];
                $date = $question["date"];
                $body = adjustmentStr($question["body"], 80);
                $count = $question["count"];
                echo "<div class='listelement' style='width:85%; margin-left: auto; margin-right: auto;'>\n";
                echo "<b>No.$question_id</b><br>\n";
                echo "<h3><b><u><a href='detail.php?id=$question_id'>$title</a></u></b></h3>\n";
                echo "投稿者名: $nickname<br>\n";
                echo "投稿日時: $date<br>\n";
                echo "HELP!: <i>$count</i><br><br>\n";
                echo "<u>内容</u><br> <pre style='font-size:18px;'>$body</pre>\n";
                echo "</div>";
                ++ $idx;
            }
        ?>
    </div>
    <ul class="menubar">
        <li class="menubar"><button type="button" onclick="javascript:window.location='allview.php?page=<?php echo ($page-1);?>';return false;">前ページへ</button></li>
        <li class="menubar"><button type="button" onclick="javascript:window.location='allview.php?page=<?php echo ($page+1);?>';return false;">次ページへ</button></li>
    </ul>
</body>

</html>