<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>モックアップバージョン一覧</title>
    <link href="css/login.css" rel="stylesheet" type="text/css" media="all">
    <link href="css/menu.css" rel="stylesheet" type="text/css" media="all">
    <header>

    </header>
    <div class="logo">
        <a href="11MenuK.php"><img src="./img/ppm.png" alt="メニュー"></a>
    </div>
    <?php
    session_cache_limiter('none');
    session_start();
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
<!-- post ユーザーネーム、ユーザーID  -->

<body>
    <div class="menu-page">
        <h1>| 保存モックアップバージョン一覧</h1>

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

        if ($count != 0) {
            while ($row = $stmt->fetch(PDO::FETCH_BOTH)) {
                
                print '<tr>
                    <td><a href="/?wm_id=' . $row["WMID"] . '&version_id=' . $row["VersionID"] . '">' . $row["WMName"] . '</a></td>
                    <td>' . $row["VersionID"] . '</td>
                    <td><form method="POST" name="a_form" action="33MockupDelete.php">
                            <input type="hidden" name="userID" value="' . $row['UserID'] . '">
                            <input type="hidden" name="WMID" value="' . $row['WMID'] . '">
                            <input type="hidden" name="VersionID" value="' . $row['VersionID'] . '">
                            <a href="#" onclick="document.a_form.submit();">削除</a>
                            </form>
                        </td>
                    </tr>';
            }
        } else {
            print "<p id='error'>検索結果０件</p>";
        }


        ?>


        </table>
        <p id="error">検索結果０件</p>
    </div>

</body>

</html>