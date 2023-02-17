<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>新規教師登録</title>
    <link href="css/login.css" rel="stylesheet" type="text/css" media="all">
    <link href="css/menu.css" rel="stylesheet" type="text/css" media="all">
    <link href="css/mypage.css" rel="stylesheet" type="text/css" media="all">
    <header>

    </header>
    <div class="logo">
        <a href="11MenuK.php"><img src="./img/ppm.png" alt="メニュー"></a>
    </div>
    <nav>
        <a href="11MenuK.php">メニュー</a>
        <a href="24studentSearch.php">学生一覧</a>
        <a href="31mockupSearch.php">保存一覧</a>
        <a href="/">新規作成</a>
        <a href="10logout.php">ログアウト</a>
        <div class="animation start-home"></div>
    </nav>
</head>

<body>
    <div class="menu-page">
        <h1>| 教員登録</h1>
        <p>登録する教員情報を入力してください。</p>
        <form action="22KRchack.php" method="POST">
            <table>

                <tr>
                    <th>氏名</th>
                    <td><input class="text" size="25" type="text" name="surname" placeholder="姓"></td>
                    <td><input class="text" size="25" type="text" name="name" placeholder="名"></td>
                </tr>
                <tr>
                    <th>メールアドレス</th>
                    <td><input class="text" type="text" name="email" placeholder="メールアドレス"></td>
                </tr>
                <tr>
                    <th>パスワード</th>
                    <td><input class="text" type="password" name="pass" placeholder="パスワード"></td>
                </tr>
                <tr>
                    <th>パスワード再入力</th>
                    <td><input class="text" type="password" name="repass" placeholder="パスワード再入力"></td>
                </tr>

            </table>
            <?php
            session_start();
            $errorMsg = $_SESSION['errorMsg'] ?? '';
            print "<p id='error'>" . $errorMsg . "</p>";
            $_SESSION['errorMsg'] = null;
            ?>

            <input class="menubutton" type="submit" value="確認">
            <button class="menubutton" type="button" onclick="history.back()">戻る</button>
        </form>
    </div>
</body>

</html>