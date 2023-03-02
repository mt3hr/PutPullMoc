<?php


session_start();
if ($_POST['pass'] ?? '' != '' && $_POST['newpass'] ?? '' != '') {
    $pass = htmlspecialchars($_POST['pass'], ENT_QUOTES);
    $newpass = htmlspecialchars($_POST['newpass'], ENT_QUOTES);
} else {
    $_SESSION['errorMsg'] = "何も入力されていません";
    // print $_SESSION['errorMsg'];
    $uri = $_SERVER['HTTP_REFERER'];
    header("Location: " . $uri);

}



if ($pass == $newpass) {
    if (is_matching($pass)) {
        $dsn = 'sqlsrv:server=10.42.129.3;database=21jygr01';
        $user = '21jygr01';
        $password = '21jygr01';
        $pdo = new PDO($dsn, $user, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


        $sql = "UPDATE userTable SET PassWord = ? WHERE UserID = ?";
        $stmt = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
        $stmt->execute(array(hash('sha256', $_POST["pass"]), $_POST["userID"])); //SQL文を実行

        //DELETE
        // $sql = "UPDATE userTable SET PassWord = ? WHERE UserID = ?";
        // $stmt = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
        // $stmt->execute(array(hash('sha256', $_POST["pass"]), $_POST["userID"])); //SQL文を実行

        $uri = './9PWreset5.php';

        header("Location: " . $uri);
    } else {
        $_SESSION['errorMsg'] = "パスワードは8文字以上50文字以内、英数字で入力してください";
        $uri = $_SERVER['HTTP_REFERER'];
        header("Location: " . $uri);
    }
} else {

    $_SESSION['errorMsg'] = "文字列が一致しません。再度入力して下さい";
    $uri = $_SERVER['HTTP_REFERER'];
    header("Location: " . $uri);
}


//英数８文字以上５０文字以内
function is_matching($str)
{
    if (preg_match('/\A[a-z\d]{8,50}+/i', $str)) {
        return true;
    } else {
        return false;
    }
}
?>