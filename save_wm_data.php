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
$wm_id = $jsondata["wm_id"];
$wm_name = $jsondata["wm_name"];
$owner_user_id = $jsondata["owner_user_id"] != "" ? $jsondata["owner_user_id"] : $_SESSION['userID'];
$register_date_time = $jsondata["register_date_time"];
$html_with_id = $jsondata["html_with_id"];

$user_id = $owner_user_id;
$next_version_id = 1; // バージョンはサーバでシーケンシャルな値を設定していくという話に落ち着いていたはず。
$sql = "SELECT TOP 1 VersionID FROM mockup WHERE WMID = ? AND UserID = ? ORDER BY VersionID DESC;";
$stmt = $pdo->prepare($sql);
$stmt->execute(array($wm_id, $owner_user_id));
var_dump($wm_id);
var_dump($owner_user_id);
$count = $stmt->rowCount();
$result = $stmt->fetchAll(PDO::FETCH_BOTH);
var_dump($result);
$next_version_id = ($result[0]["VersionID"]) + 1;
var_dump($next_version_id);

// 保存処理
$sql = 'INSERT INTO mockup(WMID, VersionID, WMName, RegisterDatetime, HTMLWithID, UserID) VALUES(?, ?, ?, ? ,? ,?);';
$stmt = $pdo->prepare($sql);
$stmt->execute(array($wm_id, $next_version_id, $wm_name, $register_date_time, json_encode($html_with_id), $user_id));
?>