<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>ログアウト</title>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Righteous&family=Teko:wght@600&display=swap" rel="stylesheet">
    <link href="css/login.css" rel="stylesheet" type="text/css" media="all">
</head>
<?php
/*
$_SESSION['login'] = 0;
$_SESSION['email']='';
$_SESSION['userID']='';
*/
setcookie("PHPSESSID", '', time() - 1800, '/') // 小路へ。ログイン・ログアウト判断のためには全部消さないとできなかったのでこうしました。
    ?>

<body>
    <div class="login-page">
        <div class="form">
            <a href="/"><h1>PutPullMock</h1></a>
            <h2>ログアウト</h2>
            <p>ログアウトしました</p>
            <form method="POST" action="./1login.php">
                <input class="button" type="submit" name="submit" value="ログインへ">
            </form>
        </div>
    </div>
</body>

</html>