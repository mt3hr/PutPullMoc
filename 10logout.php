<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>ログアウト</title>
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
            <p id="error">エラー</p>
            <p>ログアウトしました</p>
            <form method="POST" action="./1login.php">
                <input class="button" type="submit" name="submit" value="ログインへ">
            </form>
        </div>
    </div>
</body>

</html>