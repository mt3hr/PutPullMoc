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
        <a href="11MenuK.html"><img src="./img/ppm.png" alt="メニュー"></a>
    </div>
    <nav>
        <a href="11MenuK.html">メニュー</a>
        <a href="11MenuK.html">学生一覧</a>
        <a href="11MenuK.html">保存一覧</a>
        <a href="11MenuK.html">新規作成</a>
        <a href="10logout.html">ログアウト</a>
        <div class="animation start-home"></div>
    </nav>
</head>
<!-- post ユーザーネーム、ユーザーID  -->
<body>
    <div class="menu-page">
        <h1>| 保存モックアップ一覧</h1>
        
            <?php
            
            session_cache_limiter('none');
            session_start();
            print '<p>'.$_POST['userName'].'さんのワークスペース</p>
                <table>
                    <tr>
                        <th>モックアップ名</th>
                        <th>最終編集日時</th>
                        <th></th>
                    </tr>';
                $userID=$_POST['userID'];
                $dsn = 'sqlsrv:server=10.42.129.3;database=21jygr01';
                $user = '21jygr01';
                $password = '21jygr01';
                $pdo = new PDO($dsn, $user, $password);
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                
                // 最終編集日時の属性を作成し、RegisterDatetimeから書き換える。
                $sql='SELECT WMID,WMName,RegisterDatetime FROM mockup WHERE UserID = ?;';
                $stmt = $pdo->prepare($sql,array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
                $stmt->execute(array($userID));   //SQL文を実行
                $count = $stmt->rowCount();
            
                
                while ($row = $stmt->fetch(PDO::FETCH_BOTH)) {
                    
                    
                    print '<tr>
                        <td><form method="POST" name="a_form" action="33mockupVerSearch.php">
                        <input type="hidden" name="WMID" value="'.$row['WMID'].'">
                        <input type="hidden" name="WMName" value="'.$row['WMName'].'">
                        <a href="#" onclick="document.a_form.submit();">'.$row['WMName'].'</a>
                    </form>
                    <td>'.$row['RegisterDatetime'].'</td>
                    
                    </tr>';
                }
                    
                
            ?>
            
            
        </table>
        <p id="error">検索結果０件</p>
    </div>

</body>

</html>