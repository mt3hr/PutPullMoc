<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>保存一覧</title>
    link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Righteous&family=Teko:wght@600&display=swap" rel="stylesheet">
    <link href="css/studentsearch.css" rel="stylesheet" type="text/css" media="all">
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
</head>
<!-- post ユーザーネーム、ユーザーID  -->

<body>
    <div class="menu-page">
        <h1>| モックアップバージョン一覧</h1>

        <?php

        print '<p>' . $_POST['WMName'] . '</p>
                <table>
                    <tr>
                        <th>バージョン</th>
                        <th>最終編集日時</th>
                        <th></th>
                    </tr>';
        $userID = $_POST['userID']; // 小路へ。userIDにWMIDを代入してるけどミス？
        $WMID = $_POST['WMID'];
        $dsn = 'sqlsrv:server=10.42.129.3;database=21jygr01';
        $user = '21jygr01';
        $password = '21jygr01';
        $pdo = new PDO($dsn, $user, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // 最終編集日時の属性を作成し、RegisterDatetimeから書き換える。
        $sql = 'SELECT WMID,WMName,RegisterDatetime,VersionID FROM mockup WHERE WMID = ? AND UserID = ?;';
        $stmt = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
        $stmt->execute(array($WMID, $userID)); //SQL文を実行
        $count = $stmt->rowCount();


        while ($row = $stmt->fetch(PDO::FETCH_BOTH)) {
            /* 小路へ。/にアクセスするように変更しました。
            print '<tr>
            <td><a href="33mockupVerSearch.ph?WMID="'.$row['WMID'].'"&WMName="'.$row['WMName'].'" >'.$row['WMName'].'</a></td>
            <td>'.$row['RegisterDatetime'].'</td>
            </tr>';
            */
            print '<tr>
                    <td><a href="/?wm_id=' . $row["WMID"] . '&version_id=' . $row["VersionID"] . '">' . $row["WMName"] . '</a></td>
                    <td>' . $row['RegisterDatetime'] . '</td>
                    </tr>';
        }


        ?>


        </table>
        <p id="error">検索結果０件</p>
    </div>

</body>

</html>