<?php
session_start();

require "util_func.php";
requireNotLogin();

$userid = htmlspecialchars($_POST["userid"]);
$nickname = htmlspecialchars($_POST["nickname"]);
$pw = $_POST["password"];
$pw_conf = $_POST["password_conf"];

// Check
if(!($userid && $nickname && $pw && $pw_conf)) error(1);
if($pw != $pw_conf) error(2);
if(strlen($userid) > 16 || strlen($nickname) > 32) error(10);

// Regist user
if($_POST["regist"]) {
    // Crypt -> Insert to DB
    $hashed_pw = crypt($pw, "1204chino4021");
    try {
        $sql = "insert into Users values(\"$userid\", \"$nickname\", \"$hashed_pw\");";
        $result = getDBHandler()->query($sql);
    } catch (PDOException $e) {
        error(3);
    }
    $_SESSION["studyq_userid"] = $userid;
    $_SESSION["studyq_nickname"] = $nickname;
    message("ユーザ登録が正常に完了しました");
}
?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <h1 class="title" onclick="javascript:window.location='/';return false;"><u>Study Q</u></h1>
    <h2 class="minititle">ユーザ登録</h2>
    <form class="center" style="width: 400px;" method="POST" action="#">
        <p>以下の内容で登録してよろしいですか?</p>
        <div class="center" style="text-align: left; width: 200px;">
            <p><b>ユーザID</b>: <?php echo $userid ?></p>
            <p><b>ニックネーム</b>: <?php echo $nickname ?></p>
            <p><b>パスワード</b>: *******</p>
        </div>
        <input type="hidden" name="userid" value=<?php echo $userid; ?>></p>
        <input type="hidden" name="nickname" value=<?php echo $nickname; ?>></p>
        <input type="hidden" name="password" value=<?php echo $pw; ?>></p>
        <input type="hidden" name="password_conf" value=<?php echo $pw_conf; ?>></p>
        <input type="submit" name="regist" value="登録">
    </form>
</body>

</html>