<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>メニュー</title>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Righteous&family=Teko:wght@600&display=swap" rel="stylesheet">
    <link href="css/glovalnavigation.css" rel="stylesheet" type="text/css" media="all">
    <link href="css/teachermenu.css" rel="stylesheet" type="text/css" media="all">
    <link href="css/menu.css" rel="stylesheet" type="text/css" media="all">
    <link href="css/mypage.css" rel="stylesheet" type="text/css" media="all">
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
                            <li class="header-navListItem"><a href="11MenuK.php">新規作成</a></li>
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
        <h1>| 生徒登録</h1>
        <p>以下の内容で登録してもよろしいですか。</p>
        <table>
            <?php
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
                <td>" . $_SESSION['regstEmail'] . "</td>
            </tr>
            <tr>
                <th>パスワード</th>
                <td>******</td>
            </tr>"
                ?>
        </table>

        <form action="19SRDataInsert.php" method="post">
            <?php
            print '<input type="hidden" name="userid" value="' . $_SESSION['regstuserID'] . '">
            <input type="hidden" name="surname" value="' . $_SESSION['regstSurname'] . '">
            <input type="hidden" name="name" value="' . $_SESSION['regstName'] . '">
            <input type="hidden" name="email" value="' . $_SESSION['regstEmail'] . '">
            <input type="hidden" name="pass" value="' . $_SESSION['regstPass'] . '">
            '
                ?>
            <button class="mypagebutton" type="button" onclick="history.back()">戻る</button>
            <input class="mypagebutton" type="submit" value="確認">
        </form>
    </div>
</body>

</html>