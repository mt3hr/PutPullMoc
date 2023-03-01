<?php


session_start();
if ($_POST['email'] ?? '' != null) {
    $email = htmlspecialchars($_POST['email'], ENT_QUOTES);
} else {
    $_SESSION['errorMsg'] = "何も入力されていません";
    // print $_SESSION['errorMsg'];
    $uri = $_SERVER['HTTP_REFERER'];
    header("Location: " . $uri);

}


//TODO メール送信　
//メール内のlinkを踏んで飛べるようにする
//登録されているかチェックし、可否でメール内容を変える
//https://zenn.dev/syamozipc/articles/php_password_reset
//DATABASEにreset Torcken票が欲しいかも。
if (is_mail($email)) {



    mb_language("japanese");
    mb_internal_encoding("UTF-8");

    $dsn = 'sqlsrv:server=10.42.129.3;database=21jygr01';
    $user = '21jygr01';
    $password = '21jygr01';
    $pdo = new PDO($dsn, $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


    $sql = "SELECT Email,token,ResetSentAt FROM passwordReset WHERE Email = ?";
    $stmt = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
    $stmt->execute(array($email)); //SQL文を実行
    $count = $stmt->rowCount();
    if ($count == 0) {
        $sql = "INSERT INTO passwordReset VALUES(?,?,?)";
        $stmt = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
        $token = bin2hex(random_bytes(32));
        $date = new DateTime(date("Y/m/d H:i:s"));
        $stringDate = $date->format('Y-m-d H:i:s');
        $stmt->execute(array($email, $token, $stringDate)); //SQL文を実行
        $url = "http://localhost/6PWreset3.php?token=" . $token;

        $to = $email;
        $subject = "putpullmoc パスワードリセット";
        $body = "{$to}様\r\n";
        $body .= "パスワードリセットの依頼を受け付けました。\r\n";
        $body .= "以下のURLをクリックしてパスワードの再設定を行って下さい。\r\n";
        $body .= "\r\nーパスワード再設定URLー\r\n";
        $body .= $url;
        mb_send_mail($to, $subject, $body, "From:21jy0100@jynet.jec.ac.jp");
        $uri = './5PWreset2.php';
        header("Location: " . $uri);

    } else {
        while ($row = $stmt->fetch(PDO::FETCH_BOTH)) {
            $timesent = new DateTime($row['ResetSentAt']);
            $nowTime = new DateTime(date("Y/m/d H:i:s"));
            $stringDate = $nowTime->format('Y-m-d H:i:s');
            $token = $row['token'];
        }
        //nowからsent1を引いて期間内だったら期限更新、外だったら期限、トークン更新
        // if ($nowTime->diff($timesent) < 3600 * 2) {
        //     $sql = "UPDATE passwordReset SET ResetSentAt=? WHERE Email =?";
        //     $stmt = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
        //     $stmt->execute(array($email, $stringDate)); //SQL文を実行


        //     $url = "http://localhost/6PWreset3.php?token={$token}";

        //     $to = $email;
        //     $subject = "putpullmoc パスワードリセット";
        //     $body = "{$to}様\r\n";
        //     $body .= "パスワードリセットの依頼を受け付けました。\r\n";
        //     $body .= "以下のURLをクリックしてパスワードの再設定を行って下さい。\r\n";
        //     $body .= "\r\nーパスワード再設定URLー\r\n";
        //     $body .= $url;
        //     mb_send_mail($to, $subject, $body, "From:21jy0100@jynet.jec.ac.jp");
        //     $uri = './5PWreset2.php';
        //     header("Location: " . $uri);

        // } else {
        $sql = "UPDATE passwordReset SET token=?,ResetSentAt=? WHERE Email =?";
        $stmt = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
        $token = bin2hex(random_bytes(32));
        $stmt->execute(array($token, $stringDate, $email)); //SQL文を実行
        $url = "http://localhost/6PWreset3.php?token=" . $token;

        $to = $email;
        $subject = "putpullmoc パスワードリセット";
        $body = "{$to}様\r\n";
        $body .= "パスワードリセットの依頼を受け付けました。\r\n";
        $body .= "以下のURLをクリックしてパスワードの再設定を行って下さい。\r\n";
        $body .= "\r\nーパスワード再設定URLー\r\n";
        $body .= $url;
        mb_send_mail($to, $subject, $body, "From:21jy0100@jynet.jec.ac.jp");
        $uri = './5PWreset2.php';
        header("Location: " . $uri);
        // }


    }




} else {

    $_SESSION['errorMsg'] = "メールアドレスの形になっていません";
}
$uri = $_SERVER['HTTP_REFERER'];
// header("Location: ".$uri);

//メールアドレス入力形式チェック　
function is_mail($str)
{
    if (preg_match('/^[a-z0-9._+^~-]+@[a-z0-9.-]+$/i', $str)) {
        return true;
    } else {
        return false;
    }
}
?>