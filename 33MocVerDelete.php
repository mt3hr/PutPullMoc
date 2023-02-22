<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>モックアップバージョン削除</title>
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
            <h1>| モックアップバージョン削除</h1>
            <p>以下の内容を削除してもよろしいですか。</p>

            <?php
            //TODOセッションログイン情報から自分のデータを持ってくる
            // https://cpoint-lab.co.jp/article/202012/18021/
            session_cache_limiter('none');
            session_start();
            $userID = $_POST['userID'];
            $WMID = $_POST['WMID'];
            $VersionID = $_POST['VersionID'];
            $dsn = 'sqlsrv:server=10.42.129.3;database=21jygr01';
            $user = '21jygr01';
            $password = '21jygr01';
            $pdo = new PDO($dsn, $user, $password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


            $sql = 'SELECT UserID,WMID,WMName,VersionID FROM mockup WHERE UserID = ?,WMID= ?,VersionID=?;';
            $stmt = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
            $stmt->execute(array($userID,$WMID,$VersionID)); //SQL文を実行
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
                        <input type="hidden" name="VersionID" value="' . $row['VersionID'] . '">
                        <input class="mypagebutton" type="submit" value="削除">
                    </from>
                    
                    <button class="menubutton" type="button" onclick="history.back()">戻る</button>
                    ';
            }


            ?>


        </form>
    </div>
</body>

</html>