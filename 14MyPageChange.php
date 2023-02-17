<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>登録情報変更</title>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Righteous&family=Teko:wght@600&display=swap" rel="stylesheet">
    <link href="css/glovalnavigation.css" rel="stylesheet" type="text/css" media="all">
    <link href="css/mypage.css" rel="stylesheet" type="text/css" media="all">
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
</head>

<body>
    <div class="menu-page">
        <h1>| マイページ</h1>
        <div id="mypage">
            <form method="POST" action="/1login.php">
                <table>
                    <?php
                    //TODOセッションログイン情報から自分のデータを持ってくる 
                    session_cache_limiter('none');
                    session_start();
                    $userID = $_SESSION['userID'];
                    $dsn = 'sqlsrv:server=10.42.129.3;database=21jygr01';
                    $user = '21jygr01';
                    $password = '21jygr01';
                    $pdo = new PDO($dsn, $user, $password);
                    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


                    $sql = 'SELECT UserID,Email,LastName,FirstName FROM userTable WHERE UserID = ?;';
                    $stmt = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
                    $stmt->execute(array($userID)); //SQL文を実行
                    $count = $stmt->rowCount();


                    while ($row = $stmt->fetch(PDO::FETCH_BOTH)) {

                        //hidden=userID text=lastname,firstname,email
                        print '<form method="POST" action="/14MyPageChangeAct.php">
                        <input type=”hidden” hidden name = "userID" value="' . $row['UserID'] . '">
                        <tr>
                        <th>氏名</th>
                        <td><input class="text" size="50" type="text" name = "lastname" value="' . $row['LastName'] . '"> <input class="text" size="50" type="text" name = "lastname" value="' . $row['FirstName'] . '"></td>
                        </tr>
                        <tr>
                           <th>メールアドレス</th>
                           <td><input class="text" size="50" type="text" name="email" value="' . $row['Email'] . '"></td>
                        </tr>
                        </form>';
                    }
                    ?>
                </table>
                <div class="button-area">
                    <button class="mypagebutton" type="button" onclick="history.back()">戻る</button>
                    <input class="mypagebutton" type="submit" value="更新">
                </div>
            </form>
        </div>
    </div>
</body>

</html>