<!-- TODO 入力内容チェックをする -->

<?php
session_start();


$dsn = 'sqlsrv:server=10.42.129.3;database=21jygr01';
$user = '21jygr01';
$password = '21jygr01';
$pdo = new PDO($dsn, $user, $password);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    session_start();
    $sql = "INSERT INTO userTable VALUES(?,?,?,?,SHA2(?,0)) ";
    $stmt = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
    $stmt->execute(array($_POST["userID"],$_POST["email"],$_POST["surname"],$_POST["name"],$_POST["pass"])); //SQL文を実行



$uri = './19StudentRegisterFinish.php';
header("Location: " . $uri);

?>