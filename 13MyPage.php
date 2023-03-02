<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>マイページ</title>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Righteous&family=Teko:wght@600&display=swap" rel="stylesheet">
    <link href="css/glovalnavigation.css" rel="stylesheet" type="text/css" media="all">
    <link href="css/mypage.css" rel="stylesheet" type="text/css" media="all">
    <header class="header">
        <div class="header-inner">

            <!-- TODO ログイン時にuserの役職(学生、教師)をsessionに登録する。そこからメニュー分岐 -->
            <!-- 保存一覧は情報を渡さないか、自分を渡すかして、表示できるようにする -->
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
                            <li class="header-navListItem"><a href="31mockupSearch.php">保存一覧</a></li>
                            <li class="header-navListItem"><a href="11MenuK.php">新規作成</a></li>
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
        <h1>| 登録情報</h1>
        <div id="mypage">
            <table>
                <?php
                //TODOセッションログイン情報から自分のデータを持ってくる
                
                if ($_POST['userID'] ?? '' != null) {
                    $userID = htmlspecialchars($_POST['userID'], ENT_QUOTES);
                } else {
                    if ($_SESSION['MPuserID'] ?? '' != null) {
                        $userID = htmlspecialchars($_SESSION['MPuserID'], ENT_QUOTES);
                        $_SESSION['MPuserID'] = null;
                    } else {
                        $userID = $_SESSION['userID'];
                    }
                }
                if ($_SESSION['message'] ?? '' != null) {
                    print '<p>' . $_SESSION['message'] . '</p>';
                    $_SESSION['message'] = null;
                }
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


                    print '<tr>
                        <th>氏名</th>
                        <td>' . $row['LastName'] . ' ' . $row['FirstName'] . '</td>
                        <td>
                            <form method="POST" action="./14MyPageChange.php">
                                <input class="mypagebutton" type="hidden" name="userID" value="' . $userID . '">
                               <input class="mypagebutton" type="submit" value="編集">
                            </form>
                        </td>
                        <td>
                        <input type=”hidden” hidden name = "userID"value="' . $row['UserID'] . '">
                        </td>
                        </tr>
                        <tr>
                           <th>メールアドレス</th>
                           <td>' . $row['Email'] . '</td>
                           <td>
                              <form method="POST" action="/10logout.php"><input class="mypagebutton" type="submit" value="ログアウト"></form>
                          </td>
                        </tr>';
                }
                ?>
            </table>
        </div>
        <div class="button-area">
            <button class="mypagebutton" type="button" onclick="history.back()">戻る</button>
        </div>
    </div>
</body>

</html>