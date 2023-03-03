<?php
session_cache_limiter('none');
session_start();
$userID = $_SESSION['userID'];
$dsn = 'sqlsrv:server=10.42.129.3;database=21jygr01';
$user = '21jygr01';
$password = '21jygr01';
$pdo = new PDO($dsn, $user, $password);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$json = file_get_contents('php://input');
$jsondata = json_decode($json, true);
$wmid = $jsondata["wm_id"];
$version_id = $jsondata["version_id"];

// 小路へ。Userで絞り込むと、教員が他人のモックアップを見ることができなくなる。
// $sql='SELECT HTMLWithID FROM mockup WHERE UserID = ? AND WMID = ? AND VersionID = ?;';
$sql = 'SELECT HTMLWithID FROM mockup WHERE WMID = ? AND VersionID = ?;';
$stmt = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
$stmt->execute(array($wmid, $version_id)); //SQL文を実行
$count = $stmt->rowCount();
if ($count != 0) {
    while ($row = $stmt->fetch(PDO::FETCH_BOTH)) {
        print $row['HTMLWithID'];
    }
} else {
    $_SESSION['errorMsg'] = "データが見つかりません。";
}

?>