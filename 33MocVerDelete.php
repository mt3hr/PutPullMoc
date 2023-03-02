<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>モックアップバージョン削除</title>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Righteous&family=Teko:wght@600&display=swap" rel="stylesheet">
    <link href="css/glovalnavigation.css" rel="stylesheet" type="text/css" media="all">
    <link href="css/studentsearch.css" rel="stylesheet" type="text/css" media="all">
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
            } else if ($_SESSION['position'] == "s"){
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
            }else{
                $uri = './10logout.php';
                header("Location: " . $uri);
            }
            ?>
        </div>
    </header>
</head>

<body>
    <div class="menu-page">
        <h1>| モックアップバージョン削除</h1>
        <p>以下の内容を削除してもよろしいですか。</p>

        <?php
        //TODOセッションログイン情報から自分のデータを持ってくる
        // https://cpoint-lab.co.jp/article/202012/18021/
        
        $userID = $_POST['userID'];
        $WMID = $_POST['WMID'];
        $VersionID = $_POST['VersionID'];
        $dsn = 'sqlsrv:server=10.42.129.3;database=21jygr01';
        $user = '21jygr01';
        $password = '21jygr01';
        $pdo = new PDO($dsn, $user, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


        $sql = 'SELECT UserID,WMID,WMName,VersionID FROM mockup WHERE UserID = ? AND WMID= ? AND VersionID=?;';
        $stmt = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
        $stmt->execute(array($userID, $WMID, $VersionID)); //SQL文を実行
        $count = $stmt->rowCount();


        while ($row = $stmt->fetch(PDO::FETCH_BOTH)) {
            print '<table>
                    <tr>
                    <th>モックアップ名</th>
                    <td>' . $row['WMName'] . '</td>
                    </tr>
                    
                    </table>
                    
                    <form method = "POST" action = "./33MocVerDeleteAct.php">
                    <input type="hidden" name="userID" value="' . $row['UserID'] . '">
                    <input type="hidden" name="WMID" value="' . $row['WMID'] . '">
                    <input type="hidden" name="WMName" value="' . $row['WMName'] . '">
                        <input type="hidden" name="VersionID" value="' . $row['VersionID'] . '">
                        <div class="button-area">
                        <button class="menubutton" type="button" onclick="history.back()">戻る</button>
                        <input class="menubutton" type="submit" value="削除">
                        </div>
                    </form>
                    
                    
                    ';
        }


        ?>


        </form>
    </div>
</body>

</html>