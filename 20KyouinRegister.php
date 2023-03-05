<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>教員登録</title>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Righteous&family=Teko:wght@600&display=swap" rel="stylesheet">
    <link href="css/glovalnavigation.css" rel="stylesheet" type="text/css" media="all">
    <link href="css/kyoinregister.css" rel="stylesheet" type="text/css" media="all">
    <header class="header">
        <div class="header-inner">

            <!-- TODO ログイン時にuserの役職(学生、教師)をsessionに登録する。そこからメニュー分岐 -->
            <!-- 保存一覧は情報を渡さないか、自分を渡すかして、表示できるようにする -->
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
                            <li class="header-navListItem"><a href="31mockupSearch.php">保存一覧</a></li>
                            <li class="header-navListItem"><a href="/">新規作成</a></li>
                            <li class="header-navListItem"><a href="10logout.php">ログアウト</a></li>
                        </ul>
                    </nav>';
            } else {
                print
                    '<h1 class="header-logo">
                        <a href="12MenuS.php">PutPullMock</a>
                    </h1>
                    <nav class="header-nav">
                        <ul class="header-navList">
                            <li class="header-navListItem"><a id="current" href="12MenuS.php">メニュー</a></li>
                            <li class="header-navListItem"><a href="31mockupSearch.php">保存一覧</a></li>
                            <li class="header-navListItem"><a href="/">新規作成</a></li>
                            <li class="header-navListItem"><a href="10logout.php">ログアウト</a></li>
                        </ul>
                    </nav>';
                //教師ではないのでlogoutさせる
                $uri = './10logout.php';
                header("Location: " . $uri);
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
            <form action="20KRchack.php" method="POST">
                <p id="error">
                    <?php
                    $errorMsg = $_SESSION['errorMsg'] ?? '';
                    print "<p id = 'error'>" . $errorMsg . "</p>";
                    $error = true;
                    $error = $_SESSION['error'] ?? '';
                    $_SESSION['errorMsg']=null;
                    $_SESSION['error']=null;
                    if ($error) {
                        print '</p>
                <table>
                    <tr>
                        <th>ID</th>
                        <td><input class="text" size="25" type="text" name="userID" placeholder="ユーザID" value="' . $_SESSION['regstuserID'] . '"></td>
                    </tr>
                    <tr>
                        <th>氏名</th>
                        <td class="name">
                            <input class="text text-name" size="25" type="text" name="surname" placeholder="姓" value="' . $_SESSION['regstSurname'] . '">
                        </td>
                        <td class="name left">
                            <input class="text text-name" size="25" type="text" name="name" placeholder="名" value="' . $_SESSION['regstName'] . '">
                        </td>
                    </tr>
                    <tr>
                        <th>メールアドレス</th>
                        <td><input class="text" type="text" name="email" placeholder="メールアドレス" value="' . $_SESSION['regstEmail'] . '"></td>
                    </tr>
                    <tr>
                        <th>パスワード</th>
                        <td><input class="text" type="password" name="pass" placeholder="パスワード" ></td>
                    </tr>
                    <tr>
                        <th>パスワード再入力</th>
                        <td><input class="text" type="password" name="repass" placeholder="パスワード再入力"></td>
                    </tr>
                </table>';
                        $_SESSION['regstEmail'] = '';
                        $_SESSION['regstuserID'] = '';
                        $_SESSION['regstSurname'] = '';
                        $_SESSION['regstName'] = '';
                    } else {
                        print '</p>
                <table>
                    <tr>
                        <th>ID</th>
                        <td><input class="text" size="25" type="text" name="userID" placeholder="ユーザID"></td>
                    </tr>
                    <tr>
                        <th>氏名</th>
                        <td class="name">
                            <input class="text text-name" size="25" type="text" name="surname" placeholder="姓">
                        </td>
                        <td class="name left">
                            <input class="text text-name" size="25" type="text" name="name" placeholder="名">
                        </td>
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
                </table>';
                    }
                    ?>
                <div class="button-area">
                    <button class="menubutton" type="button" onclick="history.back()">戻る</button>
                    <input class="menubutton" type="submit" value="確認">
                </div>
            </form>
        </div>
</body>

</html>