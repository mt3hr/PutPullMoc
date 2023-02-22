<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>教員一覧</title>
    <link href="css/login.css" rel="stylesheet" type="text/css" media="all">
    <link href="css/menu.css" rel="stylesheet" type="text/css" media="all">
    <header>

    </header>
    <div class="logo">
        <a href="11MenuK.php"><img src="./img/ppm.png" alt="メニュー"></a>
    </div>
    <nav>
        <a href="11MenuK.php">メニュー</a>
        <a href="24studentSearch.php">学生一覧</a>
        <a href="31mockupSearch.php">保存一覧</a>
        <a href="/">新規作成</a>
        <a href="10logout.php">ログアウト</a>
        <div class="animation start-home"></div>
    </nav>
</head>
<!-- post ユーザーネーム、ユーザーID  -->

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
            //アラートで削除するか確認取りたい
            while ($row = $stmt->fetch(PDO::FETCH_BOTH)) {


                print '<tr>
                        <td><form method="POST" name="a_form" action="33mockupVerSearch.php">
                            <input type="hidden" name="userID" value="' . $row['UserID'] . '">
                            <input type="hidden" name="WMID" value="' . $row['WMID'] . '">
                            <input type="hidden" name="WMName" value="' . $row['WMName'] . '">
                            <a href="#" onclick="document.a_form.submit();">' . $row['WMName'] . '</a>
                            </form>
                        </td>
                    <td>' . $row['RegisterDatetime'] . '</td>
                    <td><form method="POST" name="a_form" action="31MockupDelete.php">
                            <input type="hidden" name="userID" value="' . $row['UserID'] . '">
                            <input type="hidden" name="WMID" value="' . $row['WMID'] . '">
                            <input type="hidden" name="WMName" value="' . $row['WMName'] . '">
                            <a href="#" onclick="document.a_form.submit();">削除</a>
                            </form>
                        </td>
                    </tr>';
            }
        }else{
            print "<p id='error'>検索結果０件</p>";
        }

        ?>


        </table>
    </div>

</body>

</html>