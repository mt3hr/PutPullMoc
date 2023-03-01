<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>メニュー</title>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Righteous&family=Teko:wght@600&display=swap" rel="stylesheet">
    <link href="css/glovalnavigation.css" rel="stylesheet" type="text/css" media="all">
    <link href="css/teachermenu.css" rel="stylesheet" type="text/css" media="all">
    <link href="css/menu.css" rel="stylesheet" type="text/css" media="all">
    <link href="css/mypage.css" rel="stylesheet" type="text/css" media="all">
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

            if($count != 0){
                while ($row = $stmt->fetch(PDO::FETCH_BOTH)) {


                    print '<tr>
                        <td>' . $row['LastName'] . '</td>
                        <td>' . $row['FirstName'] . '</td>
                        <td>' . $row['Email'] . '</td>
                        <td>
                            <form method="POST" action="./13MyPage.php">
                                <input type="hidden" name="userID" value="' . $row['UserID'] . '">
                                <input class="menubutton" type="submit" value="情報編集">
                            </form>
                        </td>
                        <td>
                            <form method="POST" action="./31mockupSearch.php">
                                <input type="hidden" name="userID" value="' . $row['UserID'] . '">
                                <input class="menubutton" type="submit" value="課題確認">
                            </form>
                        </td>
                        <td>
                        <form method="POST" action="./29teacherSearchDelete.php">
                            <input class="menubutton" type="hidden" name="userID" value="' . $row['UserID'] . '">
                            <input class="menubutton" type="submit" value="削除">
                        </form>
                        </td>
                        </tr>
                        ';
                }
                print '</table>';
            }else{
                
                
                session_start();
                $errorMsg = $_SESSION['errorMsg'] ?? '';
                print "<p id = 'error'> 検索結果0件</p>";
                $_SESSION['errorMsg'] = null;
            
            
            }
            

            ?>
        
            
        
        
    </div>

</body>

</html>