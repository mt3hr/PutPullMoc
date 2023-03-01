<!DOCTYPE html>
<html>
<?php

session_cache_limiter('none');
session_start();
$userID = $_SESSION['userID'];
$dsn = 'sqlsrv:server=10.42.129.3;database=21jygr01';
$user = '21jygr01';
$password = '21jygr01';
$pdo = new PDO($dsn, $user, $password);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

?>

<head>
    <meta charset="UTF-8">
    <title>学生一覧</title>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Righteous&family=Teko:wght@600&display=swap" rel="stylesheet">
    <link href="css/glovalnavigation.css" rel="stylesheet" type="text/css" media="all">
    <link href="css/studentsearch.css" rel="stylesheet" type="text/css" media="all">
    <header class="header">
        <div class="header-inner">

            <!-- TODO ログイン時にuserの役職(学生、教師)をsessionに登録する。そこからメニュー分岐 -->
            <!-- 保存一覧は情報を渡さないか、自分を渡すかして、表示できるようにする -->
            <?php
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
        <h1>| 学生検索</h1>
        <div class="search-option">
        <p class="paperpad">検索する学生情報を入力してください。</p>
        <ul>
            <form action="24KyouinRegister.php">
                <li>
                    <p>名前で検索
                    </p>
                    <input class="text" type="text" value="氏名"><input class="searchbutton" type="submit" class="menubutton" value="検索">
                </li>
            </form>
            
        </ul>
        </div>
        <table>
            <tr>
                <th>学籍番号</th>
                <th>姓</th>
                <th>名</th>
                <th>メールアドレス</th>
                <th></th>
                <th></th>
                <th></th>
            </tr>
            <?php
            $sql = 'SELECT userTable.UserID,Email,LastName,FirstName FROM userTable INNER JOIN student ON userTable.UserID = student.UserID;';
            $stmt = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
            $stmt->execute(array($userID)); //SQL文を実行
            $count = $stmt->rowCount();

            if($count != 0){
                while ($row = $stmt->fetch(PDO::FETCH_BOTH)) {

                    print '<tr>
                        <td>' . $row['UserID'] . '</td>
                        <td>' . $row['LastName'] . '</td><td> ' . $row['FirstName'] . '</td>
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
                        <form method="POST" action="./26studentSearchDelete.php">
                            <input class="menubutton" type="hidden" name="userID" value="' . $row['UserID'] . '">
                            <input class="menubutton" type="submit" value="削除">
                        </form>
                        </td>
                        </tr>';
                }
            }else{
                
                
                    session_start();
                    $errorMsg = $_SESSION['errorMsg'] ?? '';
                    print "<p id = 'error'> 検索結果0件</p>";
                    $_SESSION['errorMsg'] = null;
                
                
            }

            ?>


        </table>
        
    </div>

</body>

</html>