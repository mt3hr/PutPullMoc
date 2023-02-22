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
    <?php
    if ($_SESSION['position'] == "t") {
        print '<nav><a href="11MenuK.php">メニュー</a>
            <a href="24studentSearch.php">学生一覧</a>
            <a href="11MenuK.php">保存一覧</a>
            <a href="11MenuK.php">新規作成</a>
            <a href="10logout.php">ログアウト</a>
            <div class="animation start-home"></div>
            </nav>';
    } else {
        print '<nav><a href="11MenuK.php">メニュー</a>
            <a href="11MenuK.php">保存一覧</a>
            <a href="11MenuK.php">新規作成</a>
            <a href="10logout.php">ログアウト</a>
            <div class="animation start-home"></div>
            </nav>';
    }

    ?>
</head>

<body>
    <div class="menu-page">
        <h1>| 教員登録</h1>
        <p>以下の内容で登録してもよろしいですか。</p>
        <table>
            <?php
            $_SESSION['regstuserID'] = $userID;
            $_SESSION['regstSurname'] = $surname;
            $_SESSION['regstName'] = $name;
            $_SESSION['regstMail'] = $Email;
            $_SESSION['regstPass'] = $pass;
            print "
            <tr>
                <th>ユーザID</th>
                
                <td>" . $_SESSION['regstuserID'] . "</td>
            </tr>
            <tr>
                <th>氏名</th>
                <td>" . $_SESSION['regstSurname'] . "</td>
                <td>" . $_SESSION['regstName'] . "</td>
            </tr>
            <tr>
                <th>メールアドレス</th>
                <td>" . $_SESSION['regstMail'] . "</td>
            </tr>
            <tr>
                <th>パスワード</th>
                <td>******</td>
            </tr>"
                ?>
        </table>
        <div class="button-area">
            <!-- 小路とさいとうさんへ。buttonからinputに変更があったようなのでCSS再適用が必要かもしれないです。 -->
            <!-- もともとあったコード→ <button class="menubutton" type="button" onclick="history.back()">戻る</button> -->
            <button class="menubutton" type="button" onclick="history.back()">戻る</button>

            <form action="22KRDataInsert.php">
                <?php
                print '<input type="hidden" name="userid" value="' . $_SESSION['regstuesrID'] . '">
            <input type="hidden" name="surname" value="' . $_SESSION['regstSurname'] . '">
            <input type="hidden" name="name" value="' . $_SESSION['regstName'] . '">
            <input type="hidden" name="email" value="' . $_POST['regstEmail'] . '">
            <input type="hidden" name="pass" value="' . $_POST['regstPass'] . '">
            '
                    ?>

                <input class="menubutton" type="submit" value="確認">
            </form>
        </div>
</body>

</html>