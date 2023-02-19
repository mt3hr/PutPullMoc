<?php
session_cache_limiter('none');
session_start();

$userID = $_SESSION['userID'];
$dsn = 'sqlsrv:server=10.42.129.3;database=21jygr01';
$user = '21jygr01';
$password = '21jygr01';
$pdo = new PDO($dsn, $user, $password);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

//TODO アプリケーションのサーバへの保存ボタンの用意
$json = file_get_contents('php://input');
$jsondata = json_decode($json, true);
$wm_id = $jsondata["wm_id"];
$wm_name = $jsondata["wm_name"];
$register_date_time = $jsondata["register_date_time"];
$html_with_id = $jsondata["html_with_id"];

$user_id = $userID;
$next_version_id = "1"; // バージョンはサーバでシーケンシャルな値を設定していくという話に落ち着いていたはず。
$sql = "SELECT TOP 1 VersionID FROM mockup WHERE WMID = ? ORDER BY VersionID DESC;";
$stmt = $pdo->prepare($sql);
$stmt->execute(array($wm_id));
$count = $stmt->rowCount();
if ($count != 0) {
    while ($row = $stmt->fetch(PDO::FETCH_BOTH)) {
        $next_version_id = ((int) $row["VersionID"]) + 1;
    }
} else {
    $next_version_id = 1;
}

// 保存処理
$sql = 'INSERT INTO mockup(WMID, VersionID, WMName, RegisterDatetime, HTMLWithID, UserID) VALUES(?, ?, ?, ? ,? ,?);';
$stmt = $pdo->prepare($sql);
$stmt->execute(array($wm_id, $next_version_id, $wm_name, $register_date_time, json_encode($html_with_id), $user_id));
?>