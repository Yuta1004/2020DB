<?php
session_start();

require "util_func.php";
list($mylink, $hdmsg) = getUserMsg();

$results = array();
$genre = $_GET["genre"];
$target = $_GET["target"];
$keyword = htmlspecialchars($_GET["keyword"]);
if($genre && $target && $keyword) {
    // Check
    if(!(in_array($genre, array("Questions", "Answers")) && in_array($target, array("body", "user_id")))) {
        error(0);
    }

    // Get results
    $is_operator = $_SESSION["studyq_is_operator"];
    $sql = "select * from $genre where $target like '%$keyword%' and (visible=1 or $is_operator=1);";
    $results = getDBHandler()->query($sql)->fetchAll();
} else {
    $genre = "Questions";
    $target = "body";
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
    <h2 class="minititle">検索</h2>
    <hr>
    <form class="center" style="width: 30%;" method="GET" action="#">
        <input type="radio" name="genre" value="Questions" <?php if($genre == "Questions") echo "checked"; ?>>問題
        <input type="radio" name="genre" value="Answers"   <?php if($genre == "Answers") echo "checked"; ?>>回答<br>
        <input type="radio" name="target" value="body"     <?php if($target == "body") echo "checked"; ?>>投稿本文
        <input type="radio" name="target" value="user_id"  <?php if($target == "user_id") echo "checked"; ?>>ユーザID<br>
        <input type="text" name="keyword" size="40" value=<?php echo $keyword?>>
        <input type="submit" value="検索">
    </form>
    <hr>
    <p class="center"><b><? echo count($results); ?></b>件の投稿がヒットしました</p>
    <div class="center" style="width: 70%;">
        <?php
            $idx = 1;
            foreach($results as $result) {
                $question_id = $result["question_id"];
                $title = $result["title"];
                $nickname = $result["nickname"];
                $date = $result["date"];
                $body = adjustmentStr($result["body"], 80);
                $count = $result["count"];
                echo "<div class='listelement' style='width:85%; margin-left: auto; margin-right: auto;'>\n";
                echo "<b>No.$idx</b><br>\n";
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
</body>

</html>