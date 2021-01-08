<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <h1 class="title"><u>Study Q</u></h1>
    <h2 class="minititle">ユーザ登録</h2>
    <form class="center" style="width: 400px;" method="POST" action="register_confirm.php">
        <div style="text-align: left;">
            <p><b>ユーザID</b>:          <input type="text" name="userid"></p>
            <p><b>ニックネーム</b>:       <input type="text" name="nickname"></p>
            <p><b>パスワード</b>:         <input type="password" name="password"></p>
            <p><b>パスワード(確認用)</b>:  <input type="password" name="password_conf"></p>
        </div>
        <input type="submit" value="確認">
    </form>
</body>

</html>