<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <h1 class="title"><u>Study Q</u></h1>
    <h2 class="minititle">ユーザ登録</h2>
    <form class="center" style="width: 400px;" method="POST" action="#">
        <p>以下の内容で登録してよろしいですか?</p>
        <div class="center" style="text-align: left; width: 200px;">
            <p><b>ユーザID</b>: <?php echo $_POST["userid"]; ?></p>
            <p><b>ニックネーム</b>: <?php echo $_POST["nickname"]; ?></p>
            <p><b>パスワード</b>: *******</p>
        </div>
        <input type="hidden" name="userid" ></p>
        <input type="hidden" name="nickname"></p>
        <input type="hidden" name="password"></p>
        <input type="hidden" name="password_conf"></p>
        <input type="submit" value="登録">
    </form>
</body>

</html>