<?php
//  TODO サーバー用意しだいconnection記述
//
//]

$dsn = 'sqlsrv:server=10.42.129.3;database=21jygr01';
$user = '21jygr01';
$password = '21jygr01';
$pdo = new PDO($dsn, $user, $password);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    session_start();
    $email= htmlspecialchars( $_POST['mail'], ENT_QUOTES);
    $pass= htmlspecialchars( $_POST['pass'], ENT_QUOTES);
    $sql="SELECT UserID,Email,PassWord FROM userTable WHERE Email = ? AND PassWord = ?";
    $stmt = $pdo->prepare($sql,array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
    $stmt->execute(array($email,$pass));   //SQL文を実行
    $count = $stmt->rowCount();

    if($count == 0){
        $_SESSION['errorMsg'] = "メールアドレスまたはパスワードが間違っています。";
        $uri = $_SERVER['HTTP_REFERER']; 
    header("Location: ".$uri);
    
    }else{
        $_SESSION['login'] = 1;
        while ($row = $stmt->fetch(PDO::FETCH_BOTH)) {
            $_SESSION['email']=$row['E-mail'];
            $_SESSION['userID']=$row['UserID'];
            $session_time = 1440/24*60*7;
        }
        $uri = './11MenuK.php';
        header("Location: ".$uri);
        
    }
    // 

?>