<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>パスワードリセット</title>
    <link href="css/login.css" rel="stylesheet" type="text/css" media="all">
</head>

<body>
    <div class="login-page">
        <div class="form">
            <h1>パスワードリセット</h1>
            <p>メールを送信しました。</p>
            <p id="error">エラー</p>
            <form method="POST" action="./index.php">
                <input class="button" type="submit" name="submit" value="ログインへ">
            </form>
            <form method="POST" action="./6PWreset3.php">
                <input class="button" type="submit" name="submit" value="次へ">
            </form>
        </div>
    </div>
</body>

</html>