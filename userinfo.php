<?php
session_start();

require "util_func.php";
requireLogin();

if($_POST["change"]) {
    $userid = htmlspecialchars($_POST["userid"]);
    $nickname = htmlspecialchars($_POST["nickname"]);
    $pw = $_POST["password"];
    $pw_conf = $_POST["password_conf"];

    // Check
    if(!($userid && $nickname && $pw && $pw_conf)) error(1);
    if($pw != $pw_conf) error(2);

    // Update user info
    try {
        $old_userid = $_SESSION["studyq_userid"];
        $hashed_pw = crypt($pw, "1204chino4021");
        $sql = "update Users set user_id=\"$userid\", nickname=\"$nickname\", hashed_pw=\"$hashed_pw\" where user_id=\"$old_userid\";";
        getDBHandler()->query($sql);
        $_SESSION["studyq_userid"] = $userid;
        $_SESSION["studyq_nickname"] = $nickname;
    } catch (PDOException $e) {
        error(7);
    }
    message("ユーザ情報が正常に更新されました", true, 301);
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
    <h2 class="minititle">ユーザ情報</h2>
    <form class="center" style="width: 400px;" method="POST", action="#">
        <div style="text-align: left;">
            <p><b>ユーザID</b>:          <input type="text" name="userid" value=<?php echo $_SESSION["studyq_userid"]; ?>></p>
            <p><b>ニックネーム</b>:       <input type="text" name="nickname" value=<?php echo $_SESSION["studyq_nickname"]; ?>></p>
            <p><b>パスワード</b>:         <input type="password" name="password"></p>
            <p><b>パスワード(確認用)</b>:  <input type="password" name="password_conf"></p>
        </div>
        <input type="submit" name="change" value="変更">
    </form>
</body>

</html>