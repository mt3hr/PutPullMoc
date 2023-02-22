<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>新規生徒登録</title>
    <link href="css/menu.css" rel="stylesheet" type="text/css" media="all">

    <link href="css/mypage.css" rel="stylesheet" type="text/css" media="all">
    <header>

    </header>
    <div class="logo">
        <a href="11MenuK.php"><img src="./img/ppm.png" alt="メニュー"></a>
    </div>
    <?php
    session_start();
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
                <td>" . $_SESSION['regstMail'] . "</td>
            </tr>
            <tr>
                <th>パスワード</th>
                <td>******</td>
            </tr>"
                ?>
        </table>
        <button class="menubutton" type="button" onclick="history.back()">戻る</button>
        <form action="19SRDataInsert.php">
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