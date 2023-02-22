<?php
//TODOセッションログイン情報から自分のデータを持ってくる
session_cache_limiter('none');
session_start();
$userID = $_POST['userID'];
$dsn = 'sqlsrv:server=10.42.129.3;database=21jygr01';
$user = '21jygr01';
$password = '21jygr01';
$pdo = new PDO($dsn, $user, $password);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


$sql = '
        DELETE FROM student WHERE UserID = ?;';
$stmt = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
$stmt->execute(array($userID)); //SQL文を実行

$sql = '
        DELETE FROM userTable WHERE UserID = ?;';
$stmt = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
$stmt->execute(array($userID)); //SQL文を実行





$uri = './27studentSearchDeleteFinish.php';
header("Location: " . $uri);
?>