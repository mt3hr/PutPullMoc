<?php
//TODOセッションログイン情報から自分のデータを持ってくる
session_cache_limiter('none');
session_start();
$userID = $_POST['userID'];
$WMID = $_POST['WMID'];
$dsn = 'sqlsrv:server=10.42.129.3;database=21jygr01';
$user = '21jygr01';
$password = '21jygr01';
$pdo = new PDO($dsn, $user, $password);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);




$sql = ' DELETE FROM mockup WHERE UserID = ? AND WMID=?;';
$stmt = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
$stmt->execute(array($userID, $WMID)); //SQL文を実行



$_SESSION['mocUserID'] = $userID;
$uri = './31MocDeleteFinish.php';
header("Location: " . $uri);
?>