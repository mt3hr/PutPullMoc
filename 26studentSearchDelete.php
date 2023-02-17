<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>新規教師登録</title>
    <link href="css/menu.css" rel="stylesheet" type="text/css" media="all">
    <link href="css/mypage.css" rel="stylesheet" type="text/css" media="all">
    <header>

    </header>
    <div class="logo">
        <a href="11MenuK.php"><img src="./img/ppm.png" alt="メニュー"></a>
    </div>
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
            <h1>| 学生情報削除</h1>
            <p>以下の内容を削除してもよろしいですか。</p>

            <?php
            //TODOセッションログイン情報から自分のデータを持ってくる
            // https://cpoint-lab.co.jp/article/202012/18021/
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
                print '<table>
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
                    </tr>
                    </table>
                    
                    <form method = "POST" action = "./26studentSearchDeleteAct.php"><button type="submit" class="menubutton" name="userID" value="' . $row['UserID'] . '">削除</button></from>
                    
                    <button class="menubutton" type="button" onclick="history.back()">戻る</button>
                    ';
            }


            ?>


        </form>
    </div>
</body>

</html>