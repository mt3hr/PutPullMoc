<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>新規教員登録</title>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Righteous&family=Teko:wght@600&display=swap" rel="stylesheet">
    <link href="css/kyoinregister.css" rel="stylesheet" type="text/css" media="all">
    <link href="css/glovalnavigation.css" rel="stylesheet" type="text/css" media="all">
    <header class="header">
        <div class="header-inner">
            <?php
            session_start();
            if ($_SESSION['position'] == "t") {
                print
                    '<h1 class="header-logo">
                        <a href="11MenuK.php">PutPullMock</a>
                    </h1>
                    <nav class="header-nav">
                        <ul class="header-navList">
                            <li class="header-navListItem"><a id="current" href="11MenuK.php">メニュー</a></li>
                            <li class="header-navListItem"><a href="24studentSearch.php"">学生一覧</a></li>
                            <li class="header-navListItem"><a href="1MenuK.php">保存一覧</a></li>
                            <li class="header-navListItem"><a href="11MenuK.php">新規作成</a></li>
                            <li class="header-navListItem"><a href="10logout.php">ログアウト</a></li>
                        </ul>
                    </nav>';
            } else {
                print
                    '<h1 class="header-logo">
                        <a href="11MenuS.php">PutPullMock</a>
                    </h1>
                    <nav class="header-nav">
                        <ul class="header-navList">
                            <li class="header-navListItem"><a id="current" href="11MenuS.php">メニュー</a></li>
                            <li class="header-navListItem"><a href="1MenuK.php">保存一覧</a></li>
                            <li class="header-navListItem"><a href="11MenuK.php">新規作成</a></li>
                            <li class="header-navListItem"><a href="10logout.php">ログアウト</a></li>
                        </ul>
                    </nav>';
            }
            ?>
        </div>
    </header>
</head>

<body>
    <div class="menu-page">
        <h1>| 教員登録</h1>
        <div class="paper">
            <p>登録する教員情報を入力してください。</p>
            <form action="22KRchack.php" method="POST">
                <table>
                    <tr>
                        <td colspan="3">登録する教員情報を入力してください。</td>
                    </tr>
                    <tr>
                        <th>氏名：</th>
                        <td class="name"><input class="text-name" size="25" type="text" name="surname" placeholder="姓"></td>
                        <td class="name left"><input class="text-name" size="25" type="text" name="name" placeholder="名"></td>
                    </tr>
                    <tr>
                        <th>メールアドレス：</th>
                        <td><input class="text" type="text" name="email" placeholder="メールアドレス"></td>
                    </tr>
                    <tr>
                        <th>パスワード：</th>
                        <td><input class="text" type="password" name="pass" placeholder="パスワード"></td>
                    </tr>
                    <tr>
                        <th></th>
                        <td><input class="text" type="password" name="repass" placeholder="パスワード再入力"></td>
                    </tr>

                </table>
        </div>
        <?php
        session_start();
        $errorMsg = $_SESSION['errorMsg'] ?? '';
        print "<p id='error'>" . $errorMsg . "</p>";
        $_SESSION['errorMsg'] = null;
        ?>

        <div class="button-area">
            <button class="menubutton" type="button" onclick="history.back()">戻る</button>
            <input class="menubutton" type="submit" value="確認">
        </div>
        </form>
    </div>
</body>

</html>