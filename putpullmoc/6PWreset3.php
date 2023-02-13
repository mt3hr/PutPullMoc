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
            <p id="error"><?php
		        session_start();
		        $errorMsg = $_SESSION['errorMsg']??'';
		        print "<p>".$errorMsg."</p>";
		        $_SESSION['errorMsg'] = null;
		    ?></p>
            <form method="POST" action="./6PWchack.php">
                <input class="text" type="password" name= "pass" placeholder="新しいパスワード" />
                <input class="text" type="password" name= "newpass" placeholder="新しいパスワード（再入力）" />
                <input class="button" type="submit" name="submit" value="送信">
            </form>
        </div>
    </div>
</body>

</html>