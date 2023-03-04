<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>教員情報削除</title>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Righteous&family=Teko:wght@600&display=swap" rel="stylesheet">
    <link href="css/glovalnavigation.css" rel="stylesheet" type="text/css" media="all">
    <link href="css/kyoinregister.css" rel="stylesheet" type="text/css" media="all">
    <header class="header">
        <div class="header-inner">

            <!-- TODO ログイン時にuserの役職(学生、教師)をsessionに登録する。そこからメニュー分岐 -->
            <!-- 保存一覧は情報を渡さないか、自分を渡すかして、表示できるようにする -->
            <?php
            session_cache_limiter('none');
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
            <h1>| 教員情報削除</h1>
            <p>以下の内容を削除してもよろしいですか。</p>
            <table>
                <?php
                //TODOセッションログイン情報から自分のデータを持ってくる
                
                $userID = $_POST['userID'];
                $dsn = 'sqlsrv:server=10.42.129.3;database=21jygr01';
                $user = '21jygr01';
                $password = '21jygr01';
                $pdo = new PDO($dsn, $user, $password);
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


                $sql = 'SELECT userTable.UserID,Email,LastName,FirstName FROM userTable WHERE userTable.UserID = ?;';
                $stmt = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
                $stmt->execute(array($userID)); //SQL文を実行
                $count = $stmt->rowCount();


                while ($row = $stmt->fetch(PDO::FETCH_BOTH)) {
                    print '
                    <tr>
                    <th>氏名</th>
                    <td>' . $row['LastName'] . '</td>
                    <td>' . $row['FirstName'] . '</td>
                    </tr>
                    <tr>
                    <th>メールアドレス</th>
                    <td>' . $row['Email'] . '</td>
                    </tr>';

                }
                ?>
            </table>
            <div class=button-area>
                <?php
                print '<form method="POST" action="./29teacherSearchDeleteAct.php">
                <button class="menubutton" type="button" onclick="history.back()">戻る</button>
                <button type="submit" class="menubutton"
                        name="userID" value="' . $userID . '">削除</button></from>
                    
                </form>';
                ?>
            </div>
    </div>
</body>

</html>