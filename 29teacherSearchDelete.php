<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>教員情報削除</title>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Righteous&family=Teko:wght@600&display=swap" rel="stylesheet">
    <link href="css/kyoinregister.css" rel="stylesheet" type="text/css" media="all">
    <link href="css/glovalnavigation.css" rel="stylesheet" type="text/css" media="all">
    <header class="header">
        <div class="header-inner">
            <?php
            session_start();
            if ($_SESSION['position'] == "t") {
                print
                    '<h1 class="header-logo">
                        <a href="11MenuK.php">PutPullMock</a>
                    </h1>
                    <nav class="header-nav">
                        <ul class="header-navList">
                            <li class="header-navListItem"><a id="current" href="11MenuK.php">メニュー</a></li>
                            <li class="header-navListItem"><a href="24studentSearch.php"">学生一覧</a></li>
                            <li class="header-navListItem"><a href="1MenuK.php">保存一覧</a></li>
                            <li class="header-navListItem"><a href="11MenuK.php">新規作成</a></li>
                            <li class="header-navListItem"><a href="10logout.php">ログアウト</a></li>
                        </ul>
                    </nav>';
            } else {
                print
                    '<h1 class="header-logo">
                        <a href="11MenuS.php">PutPullMock</a>
                    </h1>
                    <nav class="header-nav">
                        <ul class="header-navList">
                            <li class="header-navListItem"><a id="current" href="11MenuS.php">メニュー</a></li>
                            <li class="header-navListItem"><a href="1MenuK.php">保存一覧</a></li>
                            <li class="header-navListItem"><a href="11MenuK.php">新規作成</a></li>
                            <li class="header-navListItem"><a href="10logout.php">ログアウト</a></li>
                        </ul>
                    </nav>';
            }
            ?>
        </div>
    </header>
    <?php
    if ($_SESSION['position'] == "t") {
        print '<nav><a href="11MenuK.php">メニュー</a>
            <a href="24studentSearch.php">学生一覧</a>
            <a href="11MenuK.php">保存一覧</a>
            <a href="11MenuK.php">新規作成</a>
            <a href="10logout.php">ログアウト</a>
            <div class="animation start-home"></div>
            </nav>';
    } else {
        print '<nav><a href="11MenuK.php">メニュー</a>
            <a href="11MenuK.php">保存一覧</a>
            <a href="11MenuK.php">新規作成</a>
            <a href="10logout.php">ログアウト</a>
            <div class="animation start-home"></div>
            </nav>';
    }

    ?>
</head>

<body>
    <div class="menu-page">
        <form action="26studentSearchDeleteAct.php">
            <h1>| 教員情報削除</h1>
            <p>以下の内容を削除してもよろしいですか。</p>
            <table>
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


            $sql = 'SELECT StudentID,userTable.UserID,Email,LastName,FirstName FROM userTable inner join student on userTable.UserID = student.UserID WHERE userTable.UserID = ?;';
            $stmt = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
            $stmt->execute(array($userID)); //SQL文を実行
            $count = $stmt->rowCount();


            while ($row = $stmt->fetch(PDO::FETCH_BOTH)) {
                print '
                    <tr>
                    <th>学籍番号</th>
                    <td>' . $row['StudentID'] . '</td>
                    </tr>
                    <tr>
                    <th>氏名</th>
                    <td>' . $row['LastName'] . '</td>
                    <td>' . $row['FirstName'] . '</td>
                    </tr>
                    <th>メールアドレス</th>
                    <td>' . $row['Email'] . '</td>
                    </tr>';
                    
                }
                ?>
            </table>
            <div class=button-area>
                <form method="POST" action="./29teacherSearchDeleteAct.php"><button type="submit" class="menubutton"
                        name="userID" value="' . $row['UserID'] . '">削除</button></from>
                    <button class="menubutton" type="button" onclick="history.back()">戻る</button>
                </form>
            </div>
    </div>
</body>

</html>