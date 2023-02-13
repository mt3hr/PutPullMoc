<?php

// $dsn = 'sqlsrv:server=10.42.129.3;database=21jy0212';
// $user = '21jy0212';
// $password = '21jy0212';
// $pdo = new PDO($dsn, $user, $password);
// $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

//     session_start();
//     $email= htmlspecialchars( $_POST['mail'], ENT_QUOTES);
//     $pass= htmlspecialchars( $_POST['pass'], ENT_QUOTES);
//     $sql="SELECT CustomerName,EMail,Pass FROM Customer WHERE EMail = ? AND Pass = ?";
//     $stmt = $pdo->prepare($sql,array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
//     $stmt->execute(array($email,$pass));   //SQL文を実行
//     $count = $stmt->rowCount();
session_start();
if($_POST['Email']??''!=null){
    $Email= htmlspecialchars($_POST['Email'] , ENT_QUOTES);
}else{
    $_SESSION['errorMsg'] = "何も入力されていません";
    // print $_SESSION['errorMsg'];
    $uri = $_SERVER['HTTP_REFERER']; 
    header("Location: ".$uri);

}


//TODO メール送信　
//メール内のlinkを踏んで飛べるようにする
//登録されているかチェックし、可否でメール内容を変える
//https://zenn.dev/syamozipc/articles/php_password_reset
//DATABASEにreset Torcken票が欲しいかも。
    if(is_mail($Email)){
        

            // //meil送信
            // mb_language("Japanese");
            // mb_internal_encoding("UTF-8");
        
            // $to = $Email;
            // $subject = "HTML MAIL";
            // $message = "<html><body><h1>This is HTML MAIL</h1></body></html>";
            // $headers = "From: from@example.com";
            // $headers .= "\r\n";
            // $headers .= "Content-type: text/html; charset=UTF-8";
            // mb_send_mail($to, $subject, $message, $headers); 
            
        
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