<!-- TODO 入力内容チェックをする -->

<?php
session_start();
$_errorCode = false;
if ($_POST['userID'] ?? '' != null) {
    $userID = htmlspecialchars($_POST['userID'], ENT_QUOTES);
} else {
    $_SESSION['errorMsg'] .= "姓、";
    // print $_SESSION['errorMsg'];
    $_errorCode = true;
}
if ($_POST['surname'] ?? '' != null) {
    $surname = htmlspecialchars($_POST['surname'], ENT_QUOTES);
} else {
    $_SESSION['errorMsg'] .= "姓、";
    // print $_SESSION['errorMsg'];
    $_errorCode = true;
}
if ($_POST['name'] ?? '' != null) {
    $name = htmlspecialchars($_POST['name'], ENT_QUOTES);
} else {
    $_SESSION['errorMsg'] .= "名、";
    // print $_SESSION['errorMsg'];
    $_errorCode = true;
}
if ($_POST['Email'] ?? '' != null) {
    $Email = htmlspecialchars($_POST['Email'], ENT_QUOTES);
} else {
    $_SESSION['errorMsg'] .= "メールアドレス、";
    // print $_SESSION['errorMsg'];
    $_errorCode = true;


}

if ($_POST['pass'] ?? '' != null) {
    $pass = htmlspecialchars($_POST['pass'], ENT_QUOTES);
} else {
    $_SESSION['errorMsg'] .= "パスワード、";
    // print $_SESSION['errorMsg'];
    $_errorCode = true;
}
if ($_POST['repass'] ?? '' != null) {
    $repass = htmlspecialchars($_POST['repass'], ENT_QUOTES);
} else {
    $_SESSION['errorMsg'] .= "パスワード（再入力）、";
    // print $_SESSION['errorMsg'];
    $_errorCode = true;
}

if ($_errorCode == ture) {
    $_SESSION['errorMsg'] .= "が入力されていません";

    $uri = $_SERVER['HTTP_REFERER'];
    header("Location: " . $uri);
} else {
    $dsn = 'sqlsrv:server=10.42.129.3;database=21jygr01';
    $user = '21jygr01';
    $password = '21jygr01';
    $pdo = new PDO($dsn, $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    session_start();
    $sql = "SELECT UserID FROM userTable WHERE UserID = ? ";
    $stmt = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
    $stmt->execute(array($userID)); //SQL文を実行
    $count = $stmt->rowCount();
    if ($count != 0) {
        print 'そのユーザIDは、既に登録されています。';
        $uri = $_SERVER['HTTP_REFERER'];
        header("Location: " . $uri);
    } else {

        $email = htmlspecialchars($_POST['mail'], ENT_QUOTES);
        $pass = htmlspecialchars($_POST['pass'], ENT_QUOTES);
        $sql = "SELECT UserID,E FROM userTable WHERE Email = ? ";
        $stmt = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
        $stmt->execute(array($email, $pass)); //SQL文を実行
        $count = $stmt->rowCount();



        if (is_pass($pass)) {
            if (is_mail($email)) {
                while ($row = $stmt->fetch(PDO::FETCH_BOTH)) {
                    if ($count == 0) {
                        $_SESSION['regstuserID'] = $userID;
                        $_SESSION['regstSurname'] = $surname;
                        $_SESSION['regstName'] = $name;
                        $_SESSION['regstMail'] = $Email;
                        $_SESSION['regstPass'] = $pass;

                        $uri = './22KyouinRegister.php';
                        header("Location: " . $uri);
                    } else {
                        print 'そのメールアドレスは、既に登録されています。';
                        $uri = $_SERVER['HTTP_REFERER'];
                        header("Location: " . $uri);
                    }
                }


            } else {
                $_SESSION['errorMsg'] += "メールアドレスの形式が、間違っています。";
                // print $_SESSION['errorMsg'];
                $uri = $_SERVER['HTTP_REFERER'];
                header("Location: " . $uri);
            }
        } else {
            $_SESSION['errorMsg'] += "パスワードの形式が間違っています。英数字8文字から50文字以内で入力してください。";
            // print $_SESSION['errorMsg'];
            $uri = $_SERVER['HTTP_REFERER'];
            header("Location: " . $uri);
        }
    }
}




function is_password($str)
{
    if (preg_match('/\A[a-z\d]{8,50}+/i', $str)) {
        return true;
    } else {
        return false;
    }
}
function is_mail($str)
{
    if (preg_match('/^[a-z0-9._+^~-]+@[a-z0-9.-]+$/i', $str)) {
        return true;
    } else {
        return false;
    }
}
?>