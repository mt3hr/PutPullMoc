
<?php
//TODO　形式チェック、UPDATE
    $userID=$_SESSION['userID'];
    $dsn = 'sqlsrv:server=10.42.129.3;database=21jy0212';
    $user = '21jy0212';
    $password = '21jy0212';
    $pdo = new PDO($dsn, $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    session_start();
    $sql='SELECT UserID,E-mail,LastName,FirstName FROM user WHERE UserID = ?;'
    $stmt = $pdo->prepare($sql,array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
    $stmt->execute(array($userID));   //SQL文を実行
    $count = $stmt->rowCount();

    
    while ($row = $stmt->fetch(PDO::FETCH_BOTH)) {
        
    }
    if($_POST['lastname']??''!=null){
        $lastname= htmlspecialchars($_POST['lastname'] , ENT_QUOTES);
    }else{
        $_SESSION['errorMsg'] = "何も入力されていません";
        // print $_SESSION['errorMsg'];
        $uri = $_SERVER['HTTP_REFERER']; 
        header("Location: ".$uri);
    
    }
    if($_POST['firstname']??''!=null){
        $firstname= htmlspecialchars($_POST['firstname'] , ENT_QUOTES);
    }else{
        $_SESSION['errorMsg'] = "何も入力されていません";
        // print $_SESSION['errorMsg'];
        $uri = $_SERVER['HTTP_REFERER']; 
        header("Location: ".$uri);
    
    }
    if($_POST['email']??''!=null){
        $email= htmlspecialchars($_POST['email'] , ENT_QUOTES);
    }else{
        $_SESSION['errorMsg'] = "何も入力されていません";
        // print $_SESSION['errorMsg'];
        $uri = $_SERVER['HTTP_REFERER']; 
        header("Location: ".$uri);
    
    }

    if(is_mail($Email)){


        
        
    
    $uri = './5PWreset2.php';
    header("Location: ".$uri);

}else{
    
        $_SESSION['errorMsg'] = "メールアドレスの形になっていません";
}
$uri = $_SERVER['HTTP_REFERER']; 
// header("Location: ".$uri);

//メールアドレス入力形式チェック　
function is_mail($str) {
    if (preg_match('/^[a-z0-9._+^~-]+@[a-z0-9.-]+$/i', $str)) {
        return true;
    } else {
        return false;
    }
}

        
    
?>
                