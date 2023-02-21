<?php
//TODO　形式チェック、UPDATE
$userID = $_SESSION['userID'];
$dsn = 'sqlsrv:server=10.42.129.3;database=21jy0212';
$user = '21jy0212';
$password = '21jy0212';
$pdo = new PDO($dsn, $user, $password);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

session_start();





if ($_POST['lastname'] ?? '' != null) {
    $lastname = htmlspecialchars($_POST['lastname'], ENT_QUOTES);
} else {
    $_SESSION['errorMsg'] = "何も入力されていません";
    // print $_SESSION['errorMsg'];
    $uri = $_SERVER['HTTP_REFERER'];
    header("Location: " . $uri);

}
if ($_POST['firstname'] ?? '' != null) {
    $firstname = htmlspecialchars($_POST['firstname'], ENT_QUOTES);
} else {
    $_SESSION['errorMsg'] = "何も入力されていません";
    // print $_SESSION['errorMsg'];
    $uri = $_SERVER['HTTP_REFERER'];
    header("Location: " . $uri);

}
if ($_POST['email'] ?? '' != null) {
    $email = htmlspecialchars($_POST['email'], ENT_QUOTES);
} else {
    $_SESSION['errorMsg'] = "何も入力されていません";
    // print $_SESSION['errorMsg'];
    $uri = $_SERVER['HTTP_REFERER'];
    header("Location: " . $uri);

}

if (is_mail($email)) {



    // TODO 情報更新をさせる
    $sql = 'UPDATE userTable SET LastName = ?,FirstName =?,Email = ? WHERE UserID = ?;';
    $stmt = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
    $stmt->execute(array($lastname, $firstname, $email)); //SQL文を実行

    $_SESSION['errorMsg'] = "メールアドレスの形になっていません";
    $uri = "./13MyPage.php";
    header("Location: " . $uri);


} else {

    $_SESSION['errorMsg'] = "メールアドレスの形になっていません";
    $uri = $_SERVER['HTTP_REFERER'];
    header("Location: " . $uri);
}


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