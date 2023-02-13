
<!-- TODO 入力内容チェックをする -->

            <?php
            if($_POST['pass']??''!=null){
                $pass= htmlspecialchars($_POST['pass'] , ENT_QUOTES);
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

            if(is_pass($pass)){
                if(is_mail($email)){


                    $uri = './22KyouinRegister'; 
                    header("Location: ".$uri);
                }else{
                    $_SESSION['errorMsg'] += "メールアドレスの形式が間違っています";
                    // print $_SESSION['errorMsg'];
                    $uri = $_SERVER['HTTP_REFERER']; 
                    header("Location: ".$uri);
                }
            }else{
                $_SESSION['errorMsg'] += "パスワードの形式が間違っています。英数字8文字から50文字以内で入力してください。";
                    // print $_SESSION['errorMsg'];
                    $uri = $_SERVER['HTTP_REFERER']; 
                    header("Location: ".$uri);
            }
            function is_pass($str) {
                if (preg_match('/\A[a-z\d]{8,50}+/i', $str)) {
                    return true;
                } else {
                    return false;
                }
            }
            function is_mail($str) {
                if (preg_match('/^[a-z0-9._+^~-]+@[a-z0-9.-]+$/i', $str)) {
                    return true;
                } else {
                    return false;
                }
            }
            ?>
        