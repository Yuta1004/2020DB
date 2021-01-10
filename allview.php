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
$sql = "select * from Questions where visible=1 or $is_operator=1 order by date desc limit 10 offset $offset;";
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
            $idx = 1;
            foreach($questions as $question) {
                $no = ($page-1)*10 + $idx;
                $question_id = $question["question_id"];
                $title = $question["title"];
                $nickname = $question["nickname"];
                $date = $question["date"];
                $body = adjustmentStr($question["body"], 80);
                $count = $question["count"];
                echo "<div class='listelement' style='width:85%; margin-left: auto; margin-right: auto;'>\n";
                echo "<b>No.$no</b><br>\n";
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