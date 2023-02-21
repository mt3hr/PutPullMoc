<!DOCTYPE html>
<html>
<!---->

<head>
    <meta charset="UTF-8">
    <title>ログイン</title>
    <link href="css/login.css" rel="stylesheet" type="text/css" media="all">
</head>

<?php
//userがログインしていないかチェック
if ($_SESSION['login'] ?? '' == 1) {
    $uri = './11MenuK.php';
    header("Location: " . $uri);
} else {


}
?>
<?php
$dsn = 'mysql:dbname=shop;host=127.0.0.1';
$user = 'root';
$password = 'password';



?>
<body>
    <div class="login-page">
        <div class="form">
            <h1>ログイン</h1>
            <!-- <form method="POST" action="/1logincheck.php"> -->
            <form method="POST" action="./1logincheck.php">
                <p id="error">
                    <?php
                    session_start();
                    $errorMsg = $_SESSION['errorMsg'] ?? '';
                    print "<p>" . $errorMsg . "</p>";
                    $_SESSION['errorMsg'] = null;
                    ?>
                </p>
                <input class="text" type="text" name="mail" placeholder="メールアドレス" />
                <input class="text" type="password" name="pass" placeholder="パスワード" />
                <input class="button" type="submit" name="submit" value="ログイン">
            </form>
            
            <a href="./3PWreset.php">パスワードを忘れた場合</a>
        </div>
    </div>
</body>

</html>