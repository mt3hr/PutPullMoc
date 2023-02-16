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

<body>
    <div class="menu-page">
        <h1>| 教員一覧</h1>
        <p>検索する学生情報を入力してください。</p>


        <ul>
            <form action="24KyouinRegister.php">
                <li>
                    <p>名前で検索
                    </p>
                    <input class="text" type="text" value="氏名"><input type="submit" class="menubutton" value="検索">
                </li>
            </form>
            <form action="24KyouinRegister.php">
                <li>
                    <p>年度別絞り込み</p>
                </li>
            </form>
        </ul>
        <table>
            <tr>
                <th>姓</th>
                <th>名</th>
                <th>メールアドレス</th>
                <th></th>
            </tr>
            <?php
            
            session_cache_limiter('none');
            session_start();
                $userID=$_SESSION['userID'];
                $dsn = 'sqlsrv:server=10.42.129.3;database=21jygr01';
                $user = '21jygr01';
                $password = '21jygr01';
                $pdo = new PDO($dsn, $user, $password);
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                
                
                $sql='SELECT UserID,Email,LastName,FirstName FROM userTable INNER JOIN teacher ON userTable.UserID = teacher.UserID;';
                $stmt = $pdo->prepare($sql,array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
                $stmt->execute(array($userID));   //SQL文を実行
                $count = $stmt->rowCount();
            
                
                while ($row = $stmt->fetch(PDO::FETCH_BOTH)) {
                    
                    
                    print '<tr>
                    <td>'.$row['LastName'].'</td>
                    <td>'.$row['FirstName'].'</td>
                    <td>'.$row['Email'].'</td>
                    <td>
                        <form method="POST" action="/31mockupSearch.php"><input type="hidden" name="userID" value="'.$row['UserID'].'>"<input class="mypagebutton" type="submit" value="課題確認"></form>
                        <form method="POST" action="/26studentSearch.php"><input type="hidden" name="userID" value="'.$row['UserID'].'><input class="mypagebutton" type="submit" value="削除"></form>
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