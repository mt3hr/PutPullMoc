<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>パスワードリセット</title>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Righteous&family=Teko:wght@600&display=swap" rel="stylesheet">
    <link href="css/login.css" rel="stylesheet" type="text/css" media="all">
</head>
<?php
$passwordResetToken = filter_input(INPUT_GET, 'token');
$dsn = 'sqlsrv:server=10.42.129.3;database=21jygr01';
$user = '21jygr01';
$password = '21jygr01';
$pdo = new PDO($dsn, $user, $password);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


$sql = "SELECT Email,token,ResetSentAt FROM passwordReset WHERE token = ?";
$stmt = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
$stmt->execute(array($passwordResetToken)); //SQL文を実行
$count = $stmt->rowCount();

while ($row = $stmt->fetch(PDO::FETCH_BOTH)) {
    $timesent = DateTime::createFromFormat("Y-m-d H:i:s",$row['ResetSentAt']);
    
    $email = $row['Email'];
}

//nowからsent1を引いて期間内だったら期限更新、外だったら期限、トークン更新
if ($count == 0) {
    $_SESSION['errorMsg'] = "URLが無効です。もう一度、申請して下さい。";
    $uri = './3PWreset.php';
    header("Location: " . $uri);
} else {

    $sql = "SELECT UserID FROM userTable WHERE Email = ?";
    $stmt = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
    $stmt->execute(array($email)); //SQL文を実行
    $count = $stmt->rowCount();

    while ($row = $stmt->fetch(PDO::FETCH_BOTH)) {
        $UserID = $row['UserID'];
    }
}
?>

<body>
    <div class="login-page">
        <div class="form">
            <h1>PutPullMock</h1>
            <h2>パスワードリセット</h2>
            <p id="error">
                <?php
                session_start();
                $errorMsg = $_SESSION['errorMsg'] ?? '';
                print "<p>" . $errorMsg . "</p>";
                $_SESSION['errorMsg'] = null;
                ?>
            </p>
            <form method="POST" action="./6PWchack.php">
                <?php
                print '<input class="text" type="hidden" name="userID" value ="' . $UserID . '" />';
                ?>
                <input class="text" type="password" name="pass" placeholder="新しいパスワード" />
                <input class="text" type="password" name="newpass" placeholder="新しいパスワード（再入力）" />
                <input class="button" type="submit" name="submit" value="送信">
            </form>
        </div>
    </div>
</body>

</html>