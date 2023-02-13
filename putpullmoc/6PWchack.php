<?php


session_start();
if($_POST['pass']??''!=''&&$_POST['newpass']??''!=''){
    $pass= htmlspecialchars($_POST['pass'] , ENT_QUOTES);
    $newpass= htmlspecialchars($_POST['newpass'] , ENT_QUOTES);
}else{
    $_SESSION['errorMsg'] = "何も入力されていません";
    // print $_SESSION['errorMsg'];
    $uri = $_SERVER['HTTP_REFERER']; 
    header("Location: ".$uri);

}



    if($pass == $newpass){
       if(is_matching($pass)){
            $uri ='./9PWreset5.php'; 
            print '成功';
            header("Location: ".$uri);
        }else{
            $_SESSION['errorMsg'] = "パスワードは8文字以上50文字以内、英数字で入力してください";
            $uri = $_SERVER['HTTP_REFERER']; 
            header("Location: ".$uri);
        }
    }else{
        
         $_SESSION['errorMsg'] = "文字列が一致しません。再度入力して下さい";
         $uri = $_SERVER['HTTP_REFERER']; 
         header("Location: ".$uri);
    }
    

    //英数８文字以上５０文字以内
    function is_matching($str) {
        if (preg_match('/\A[a-z\d]{8,50}+/i', $str)) {
            return true;
        } else {
            return false;
        }
    }
?>