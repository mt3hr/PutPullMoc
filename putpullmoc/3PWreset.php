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
            <p>登録されているのメールアドレスを入力してください。</p>
            <p id="error"><?php
		        session_start();
		        $errorMsg = $_SESSION['errorMsg']??'';
		        print "<p>".$errorMsg."</p>";
		        $_SESSION['errorMsg'] = null;
		    ?></p>
            <form method="POST" action="./3PWresetcheck.php">
                <input class="text" type="text" name='Email' placeholder="メールアドレス">
                <input class="button" type="submit" name="submit" value="送信">
            </form>
        </div>
    </div>
</body>

</html>