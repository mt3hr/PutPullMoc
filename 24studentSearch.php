<!DOCTYPE html>
<html>
<?php

session_cache_limiter('none');
session_start();
$userID = $_SESSION['userID'];
$dsn = 'sqlsrv:server=10.42.129.3;database=21jygr01';
$user = '21jygr01';
$password = '21jygr01';
$pdo = new PDO($dsn, $user, $password);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

?>

<head>
    <meta charset="UTF-8">
    <title>学生一覧</title>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Righteous&family=Teko:wght@600&display=swap" rel="stylesheet">
    <link href="css/glovalnavigation.css" rel="stylesheet" type="text/css" media="all">
    <link href="css/studentsearchtable.css" rel="stylesheet" type="text/css" media="all">
    <header class="header">
        <div class="header-inner">

            <!-- TODO ログイン時にuserの役職(学生、教師)をsessionに登録する。そこからメニュー分岐 -->
            <!-- 保存一覧は情報を渡さないか、自分を渡すかして、表示できるようにする -->
            <?php
            if ($_SESSION['position'] == "t") {
                print
                    '<h1 class="header-logo">
                        <a href="11MenuK.php">PutPullMock</a>
                    </h1>
                    <nav class="header-nav">
                        <ul class="header-navList">
                            <li class="header-navListItem"><a id="current" href="11MenuK.php">メニュー</a></li>
                            <li class="header-navListItem"><a href="24studentSearch.php"">学生一覧</a></li>
                            <li class="header-navListItem"><a href="31mockupSearch.php">保存一覧</a></li>
                            <li class="header-navListItem"><a href="/">新規作成</a></li>
                            <li class="header-navListItem"><a href="10logout.php">ログアウト</a></li>
                        </ul>
                    </nav>';
            } else {
                print
                    '<h1 class="header-logo">
                        <a href="12MenuS.php">PutPullMock</a>
                    </h1>
                    <nav class="header-nav">
                        <ul class="header-navList">
                            <li class="header-navListItem"><a id="current" href="12MenuS.php">メニュー</a></li>
                            <li class="header-navListItem"><a href="31mockupSearch.php">保存一覧</a></li>
                            <li class="header-navListItem"><a href="/">新規作成</a></li>
                            <li class="header-navListItem"><a href="10logout.php">ログアウト</a></li>
                        </ul>
                    </nav>';
                //教師ではないのでlogoutさせる
                $uri = './10logout.php';
                header("Location: " . $uri);
            }
            ?>
        </div>
    </header>
</head>

<body>
    <div class="menu-page">
        <h1>| 学生検索</h1>
        <div class="search-option">
            <p class="paperpad">検索する学生情報を入力してください。</p>
            <ul>
                <form action="24studentSearch.php" method="post">

                    <p>名前で検索</p>

                    <input class="text" type="text" name="stulastname" placeholder="姓">
                    <input class="text" type="text" name="stufirstname" placeholder="名"><input class="searchbutton"
                        type="submit" class="menubutton" value="検索">

                </form>
                <form action="24studentSearch.php" method="post">

                    <p>学生番号</p>

                    <input class="text" type="text" name="stunum" placeholder="学籍番号"><input class="searchbutton"
                        type="submit" class="menubutton" value="検索">
                </form>

            </ul>
        </div>
        <table id="student">
            <tr>
                <th id="num">学籍番号</th>
                <th id="name">姓</th>
                <th id="name">名</th>
                <th id="mail">メールアドレス</th>
                <th></th>
                <th id="icon"></th>
                <th id="icon"></th>
            </tr>
            <?php
            if ($_POST['stunum'] ?? '' != null) {
                $stunum = htmlspecialchars($_POST['stunum'], ENT_QUOTES);
                $sql = "SELECT userTable.UserID,Email,LastName,FirstName FROM userTable INNER JOIN student ON userTable.UserID = student.UserID WHERE userTable.UserID LIKE ?;";
                $stmt = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
                $stmt->execute(array('%' . $stunum . '%')); //SQL文を実行
            
            } else if ($_POST['stufirstname'] ?? '' != null) {
                if ($_POST['stufirstname'] == null) {
                    $_POST['stufirstname'] = "";
                }
                if ($_POST['stulastname'] == null) {
                    $_POST['stulastname'] = "";
                }
                $stulastname = htmlspecialchars($_POST['stulastname'], ENT_QUOTES);
                $stufirstname = htmlspecialchars($_POST['stufirstname'], ENT_QUOTES);
                $sql = "SELECT userTable.UserID,Email,LastName,FirstName FROM userTable INNER JOIN student ON userTable.UserID = student.UserID WHERE LastName LIKE ? AND FirstName LIKE ?;";
                $stmt = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
                $stmt->execute(array('%' . $stulastname . '%', '%' . $stufirstname . '%')); //SQL文を実行
            
            } else if ($_POST['stulastname'] ?? '' != null) {
                if ($_POST['stufirstname'] == null) {
                    $_POST['stufirstname'] = "";
                }
                if ($_POST['stulastname'] == null) {
                    $_POST['stulastname'] = "";
                }
                $stulastname = htmlspecialchars($_POST['stulastname'], ENT_QUOTES);
                $stufirstname = htmlspecialchars($_POST['stufirstname'], ENT_QUOTES);
                $sql = "SELECT userTable.UserID,Email,LastName,FirstName FROM userTable INNER JOIN student ON userTable.UserID = student.UserID WHERE LastName LIKE ? AND FirstName LIKE ?;";
                $stmt = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
                $stmt->execute(array('%' . $stulastname . '%', '%' . $stufirstname . '%')); //SQL文を実行
            
            } else {
                $sql = 'SELECT userTable.UserID,Email,LastName,FirstName FROM userTable INNER JOIN student ON userTable.UserID = student.UserID;';
                $stmt = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
                $stmt->execute(array($userID)); //SQL文を実行
            
            }


            $count = $stmt->rowCount();

            if ($count != 0) {
                while ($row = $stmt->fetch(PDO::FETCH_BOTH)) {

                    print '<tr>
                        <td>' . $row['UserID'] . '</td>
                        <td>' . $row['LastName'] . '</td><td> ' . $row['FirstName'] . '</td>
                        <td>' . $row['Email'] . '</td>
                        <td>
                            <form method="POST" action="./31mockupSearch.php">
                                <input type="hidden" name="userID" value="' . $row['UserID'] . '">
                                <input class="menubutton" type="submit" value="課題確認">
                            </form>
                        </td>
                        <td>
                        <form method="POST" action="./13MyPage.php">
                            <input type="hidden" name="userID" value="' . $row['UserID'] . '">
                            <input class="iconbutton" type="image" src="img/studentEditIcon.png" width="40" alt="情報編集" title="情報編集">
                        </form>
                        </td>
                        <td>
                        <form method="POST" action="./26studentSearchDelete.php">
                            <input class="menubutton" type="hidden" name="userID" value="' . $row['UserID'] . '">
                            <input class="iconbutton" type="image" src="img/deleteIcon.png" width="40" alt="削除" title="削除">
                        </form>
                        </td>
                        </tr>';
                }
            } else {



                $errorMsg = $_SESSION['errorMsg'] ?? '';
                print "<p id = 'error'> 検索結果0件</p>";
                $_SESSION['errorMsg'] = null;


            }

            ?>


        </table>

    </div>

</body>

</html>