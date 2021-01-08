<?php
// Message List
$msg_array = array(
    /* 0 */ "未定義のエラーが発生しました",
    /* 1 */ "未入力の項目があります",
    /* 2 */ "パスワードが一致しません",
    /* 3 */ "登録に失敗しました(ユーザIDが既に使用されている可能性があります)",
    /* 4 */ "ログインに失敗しました",
    /* 5 */ "このページにアクセスするためにはログインが必要です",
    /* 6 */ "このページにアクセスする前にログアウトしてください",
    /* 7 */ "情報更新に失敗しました(ユーザIDが既に使用されている可能性があります)",
    /* 8 */ "存在しないページです"
);

// Check
$errno = $_GET["errno"];
if(!$errno || $errno < 0 || count($msg_array) < $errno) {
    $errno = 0;
}
$errno += 0.0;
?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <h1 class="title" onclick="javascript:window.location='/';return false;"><u>Study Q</u></h1>
    <h2 class="minititle">エラー発生</h2>
    <p class="center"><?php echo "$msg_array[$errno]"; ?></p>
    <div class="center">
        <button style="font-size: 15px;" onclick="javascript:window.history.back(-1);return false;">もどる</button>
    </div>
</body>

</html>