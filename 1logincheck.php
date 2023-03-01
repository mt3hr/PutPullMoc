<?php
//  TODO サーバー用意しだいconnection記述
//INSERT INTO `mockup` (`WMID`, `VersionID`, `WMName`, `RegisterDatetime`, `CSSForHTMLWithID`, `HTMLWithID`, `UserID`) VALUES
// 	('21jy0000m001', '0001', 'テスト2', '2023-01-17 12:18:02', 'abc', '123', '21jy0000'),
// 	('21jy0200m001', '0001', 'テスト1', '2023-01-17 12:23:57', 'abc', '123', '21jy0200');
// /*!40000 ALTER TABLE `mockup` ENABLE KEYS */;

// -- テーブル 21jygr01.passwordreset: ~2 rows (約) のデータをダンプしています
// /*!40000 ALTER TABLE `passwordreset` DISABLE KEYS */;
// INSERT INTO `passwordreset` (`UserID`, `Token`, `TokenLimit`) VALUES
// 	('21jy0000', 'abc', '2023-01-17 12:23:16'),
// 	('21jy0200', 'abc', '2023-01-17 12:24:35');
// /*!40000 ALTER TABLE `passwordreset` ENABLE KEYS */;

// -- テーブル 21jygr01.student: ~1 rows (約) のデータをダンプしています
// /*!40000 ALTER TABLE `student` DISABLE KEYS */;
// INSERT INTO `student` (`UserID`, `StudentID`) VALUES
// 	('21jy0000', '0000');
// /*!40000 ALTER TABLE `student` ENABLE KEYS */;

// -- テーブル 21jygr01.teaher: ~1 rows (約) のデータをダンプしています
// /*!40000 ALTER TABLE `teaher` DISABLE KEYS */;
// INSERT INTO `teaher` (`UserID`, `TeacherID`) VALUES
// 	('21jy0200', '0200');
// /*!40000 ALTER TABLE `teaher` ENABLE KEYS */;

// -- テーブル 21jygr01.user: ~2 rows (約) のデータをダンプしています
// /*!40000 ALTER TABLE `user` DISABLE KEYS */;
// INSERT INTO `user` (`UserID`, `Email`, `LastName`, `FirstName`, `PassWord`) VALUES
// 	('21jy0000', '21jy0000@jec.ac.jp', '電子', '太郎', 'abc'),
// 	('21jy0200', '21jy0200@jec.ac.jp', 'sawaguchi', 'takashi', 'abc');
//

$dsn = 'sqlsrv:server=10.42.129.3;database=21jygr01';
$user = '21jygr01';
$password = '21jygr01';
$pdo = new PDO($dsn, $user, $password);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

session_start();
$email = htmlspecialchars($_POST['mail'], ENT_QUOTES);
$pass = htmlspecialchars($_POST['pass'], ENT_QUOTES);
$sql = "SELECT UserID,Email,PassWord FROM userTable WHERE Email = ? AND PassWord = ?";
$stmt = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
$stmt->execute(array($email, hash('sha256', $pass))); //SQL文を実行
$count = $stmt->rowCount();



if ($count == 0) {
    $_SESSION['errorMsg'] = "メールアドレスまたはパスワードが間違っています。";
    $uri = $_SERVER['HTTP_REFERER'];
    header("Location: " . $uri);

} else {
    $_SESSION['login'] = 1;

    while ($row = $stmt->fetch(PDO::FETCH_BOTH)) {
        $_SESSION['email'] = $row['Email'];
        $_SESSION['userID'] = $row['UserID'];
    }

    $sql = "SELECT UserID FROM student WHERE UserID = ?";
    $stmt = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
    $stmt->execute(array($_SESSION['userID'])); //SQL文を実行
    $count = $stmt->rowCount();
    if ($count == 0) {
        $_SESSION['position'] = "t";
        $uri = './11MenuK.php';
        header("Location: " . $uri);
    } else {
        $_SESSION['position'] = "s";
        $uri = './12MenuS.php';
        header("Location: " . $uri);
    }

}

// 

?>