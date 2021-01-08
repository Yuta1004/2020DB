<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <h1 class="title" onclick="javascript:window.location='index.php';return false;"><u>Study Q</u></h1>
    <p class="center"><? echo $_GET["msg"]; ?></p>
    <div class="center">
        <button style="font-size: 15px;" onclick="javascript:window.location='index.php';return false;">トップページへ</button>
    </div>
</body>

</html>