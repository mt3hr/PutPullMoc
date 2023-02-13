<?php
    session_cache_limiter('none');
    session_start();
        $userID=$_SESSION['userID'];
        $dsn = 'sqlsrv:server=10.42.129.3;database=21jygr01';
        $user = '21jygr01';
        $password = '21jygr01';
        $pdo = new PDO($dsn, $user, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        
        $sql='SELECT HTMLWithID FROM mockup WHERE UserID = ? AND WMID = ? AND VersionID = ?;';
        $stmt = $pdo->prepare($sql,array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
        $stmt->execute(array($userID,$_POST['wmid'],$_POST['version']));   //SQL文を実行
        $count = $stmt->rowCount();
        if($count!=0){
            while ($row = $stmt->fetch(PDO::FETCH_BOTH)) {
                print $row['HTMLWithID'];
            }
        }else{
            $_SESSION['errorMsg']="データが見つかりません。";
        }

?>