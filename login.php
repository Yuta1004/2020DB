<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <header>
        <h3 style="text-align: right;"><a href="mypage.html"><i>○○さんのマイページへ</i></a></h3>
    </header>
    <h1 class="title" onclick="javascript:window.location='index.html';return false;"><u>Study Q</u></h1>
    <h2 class="minititle">ログイン</h2>
    <form class="center" style="width: 400px;">
        <div style="text-align: left;">
            <p><b>ユーザID</b>:              <input type="text" id="userid"></p>
            <p><b>パスワード</b>:             <input type="password" id="password"></p>
        </div>
        <input type="submit" value="ログイン">
    </form>
</body>

</html>