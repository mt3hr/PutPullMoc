<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>登録情報変更</title>
    <link href="css/login.css" rel="stylesheet" type="text/css" media="all">
    <link href="css/menu.css" rel="stylesheet" type="text/css" media="all">
    <link href="css/mypage.css" rel="stylesheet" type="text/css" media="all">
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
        <h1>| マイページ</h1>
        <div id="mypage">
            <form method="POST" action="/1login.php">
                <table>
                <?php
                //TODOセッションログイン情報から自分のデータを持ってくる 
                session_cache_limiter('none');
                session_start();
                    $userID=$_SESSION['userID'];
                    $dsn = 'sqlsrv:server=10.42.129.3;database=21jygr01';
                    $user = '21jygr01';
                    $password = '21jygr01';
                    $pdo = new PDO($dsn, $user, $password);
                    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    
                   
                    $sql='SELECT UserID,Email,LastName,FirstName FROM userTable WHERE UserID = ?;';
                    $stmt = $pdo->prepare($sql,array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
                    $stmt->execute(array($userID));   //SQL文を実行
                    $count = $stmt->rowCount();
                
                    
                    while ($row = $stmt->fetch(PDO::FETCH_BOTH)) {
                        
                        //hidden=userID text=lastname,firstname,email
                        print '<form method="POST" action="/14MyPageChangeAct.php">
                        <input type=”hidden” hidden name = "userID" value="'.$row['UserID'].'">
                        <tr>
                        <th>氏名</th>
                        <td><input class="text" size="50" type="text" name = "lastname" value="'.$row['LastName'].'"> <input class="text" size="50" type="text" name = "lastname" value="'.$row['FirstName'].'"></td>
                        <td>
                            <input class="mypagebutton" type="submit" value="編集">
                        </td>
                        </tr>
                        <tr>
                           <th>メールアドレス</th>
                           <td><input class="text" size="50" type="text" name="email" value="'.$row['Email'].'"></td>
                           <td>
                              <form method="POST" action="/10logout.php"><input class="mypagebutton" type="submit" value="ログアウト"></form>
                          </td>
                        </tr>
                        </form>';
                    }
                        
                    
                ?>
                    
                    

                </table>
                <button class="menubutton" type="button" onclick="history.back()">戻る</button>
                <input class="menubutton" type="submit" value="更新">
            </form>
        </div>
    </div>
</body>

</html>