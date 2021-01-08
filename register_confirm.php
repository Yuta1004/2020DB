<?php
$userid = htmlspecialchars($_POST["userid"]);
$nickname = htmlspecialchars($_POST["nickname"]);
$pw = $_POST["password"];
$pw_conf = $_POST["password_conf"];

// Check
if(!($userid && $nickname && $pw && $pw_conf)) {
    header("Location: error.php?errno=1", true, 301);
    exit();
}
if($pw != $pw_conf) {
    header("Location: error.php?errno=2", true, 301);
    exit();
}

// Regist user
if($_POST["regist"]) {
    // Create MySQL Connection
    try {
        $dbh = new PDO("mysql:dbhost=localhost;dbname=db2020;unix_socket=/tmp/mysql.sock", "db2020", "db2020");
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $dbh->query("set names utf8");
    } catch (PDOException $e) {
        echo $e->getMessage();
        exit();
    }

    // Crypt -> Insert to DB
    $hashed_pw = crypt($pw, "1204chino4021");
    try {
        $result = $dbh->query("insert into Users values(\"$userid\", \"$nickname\", \"$hashed_pw\");");
    } catch (PDOException $e) {
        header("Location: error.php?errno=3", true, 301);
        exit();
    }
    header("Location: message.php?msg=登録が正常に完了しました");
}
?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <h1 class="title" onclick="javascript:window.location='index.php';return false;"><u>Study Q</u></h1>
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