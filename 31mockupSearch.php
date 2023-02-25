<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>メニュー</title>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Righteous&family=Teko:wght@600&display=swap" rel="stylesheet">
    <link href="css/glovalnavigation.css" rel="stylesheet" type="text/css" media="all">
    <link href="css/teachermenu.css" rel="stylesheet" type="text/css" media="all">
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
        <h1>| 保存モックアップ一覧</h1>

        <?php
        if ($_POST['userID'] ?? '' != null) {
            $userID = htmlspecialchars($_POST['userID'], ENT_QUOTES);
        } else {
            $userID = $_SESSION['userID'];
        }
        //UserNameを取ってくる
        
        $dsn = 'sqlsrv:server=10.42.129.3;database=21jygr01';
        $user = '21jygr01';
        $password = '21jygr01';
        $pdo = new PDO($dsn, $user, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = 'SELECT UserID,LastName,FirstName FROM userTable WHERE UserID = ? ;';
        $stmt = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
        $stmt->execute(array($userID)); //SQL文を実行
        while ($row = $stmt->fetch(PDO::FETCH_BOTH)) {

            print '<p>' . $row['LastName'] . $row['FirstName'] . 'さんのワークスペース</p>
                <table>
                    <tr>
                        <th>モックアップ名</th>
                        <th>最終編集日時</th>
                        <th></th>
                    </tr>';
        }
        // 最終編集日時の属性を作成し、RegisterDatetimeから書き換える。
        $sql = 'SELECT UserID,WMID,WMName,RegisterDatetime FROM mockup WHERE UserID = ? AND VersionID=1;';
        $stmt = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
        $stmt->execute(array($userID)); //SQL文を実行
        $count = $stmt->rowCount();
        if ($count != 0) {
            while ($row = $stmt->fetch(PDO::FETCH_BOTH)) {


                print '<tr>
                        <td><form method="POST" name="a_form" action="33mockupVerSearch.php">
                            <input type="hidden" name="userID" value="' . $row['UserID'] . '">
                            <input type="hidden" name="WMID" value="' . $row['WMID'] . '">
                            <input type="hidden" name="WMName" value="' . $row['WMName'] . '">
                            <input class="menubutton" type="submit" value="' . $row['WMName'] . '">
                            </form>
                        </td>
                    <td>' . $row['RegisterDatetime'] . '</td>
                    <td><form method="POST" name="a_form" action="31MockupDelete.php">
                            <input type="hidden" name="userID" value="' . $row['UserID'] . '">
                            <input type="hidden" name="WMID" value="' . $row['WMID'] . '">
                            <input type="hidden" name="WMName" value="' . $row['WMName'] . '">
                            <input class="menubutton" type="submit" value="削除">
                            </form>
                        </td>
                    </tr>';
            }
        } else {
            print "<p id='error'>検索結果０件</p>";
        }

        ?>


        </table>
    </div>

</body>

</html>