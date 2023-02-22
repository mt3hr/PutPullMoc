<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>教員一覧</title>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
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

<body>
    <div class="menu-page">
        <h1>| 教員一覧</h1>
        <table>
            <tr>
                <th>姓</th>
                <th>名</th>
                <th>メールアドレス</th>
                <th></th>
                <th></th>
                <th></th>
            </tr>
            <?php

            
            $userID = $_SESSION['userID'];
            $dsn = 'sqlsrv:server=10.42.129.3;database=21jygr01';
            $user = '21jygr01';
            $password = '21jygr01';
            $pdo = new PDO($dsn, $user, $password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


            $sql = 'SELECT userTable.UserID,Email,LastName,FirstName FROM userTable INNER JOIN teacher ON userTable.UserID = teacher.UserID;';
            $stmt = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
            $stmt->execute(array($userID)); //SQL文を実行
            $count = $stmt->rowCount();


            while ($row = $stmt->fetch(PDO::FETCH_BOTH)) {


                print '<tr>
                    <td>' . $row['LastName'] . '</td>
                    <td>' . $row['FirstName'] . '</td>
                    <td>' . $row['Email'] . '</td>
                    <td>
                        <form method="POST" action="./13MyPage.php">
                            <input type="hidden" name="userID" value="' . $row['userID'] . '">
                            <input class="mypagebutton" type="submit" value="情報編集">
                        </form>
                    </td>
                    <td>
                        <form method="POST" action="/31mockupSearch.html">
                            <input type="hidden" name="userID" value="' . $row['userID'] . '>"
                            <input class="mypagebutton" type="submit" value="課題確認">
                        </form>
                        <form method="POST" action="/29teacherSearchDelete.html">
                            <input type="hidden" name="userID" value="' . $row['UserID'] . '>
                            <input class="mypagebutton" type="submit" value="削除">
                        </form>
                    </td>
                    </tr>';
            }
            ?>

            <tr>
                <td>21jy0212</td>
                <td>小路</td>
                <td>悠矢</td>
                <td>21jy0212@jec.ac.jp</td>
                <td><button class="menubutton">課題確認</button><button class="menubutton">削除</button></td>
            </tr>
            <tr>
                <td>21jy0212</td>
                <td>小路</td>
                <td>悠矢</td>
                <td>21jy0212@jec.ac.jp</td>
                <td><button class="menubutton">課題確認</button><button class="menubutton">削除</button></td>
            </tr>
        </table>
        <p id="error">検索結果０件</p>
    </div>

</body>

</html>