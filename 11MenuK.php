<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>メニュー</title>
    <link href="css/menu.css" rel="stylesheet" type="text/css" media="all">
    <header>

    </header>
    <div class="logo">
        <a href="11MenuK.php"><img src="./img/ppm.png" alt="メニュー"></a>
    </div>
    <!-- TODO ログイン時にuserの役職(学生、教師)をsessionに登録する。そこからメニュー分岐 -->
    <!-- 保存一覧は情報を渡さないか、自分を渡すかして、表示できるようにする -->
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
        <h1>| メニュー</h1>
        <div class="flex">
            <div class="item">
                <form method="POST" action="./24studentSearch.php">
                    <input class="menubutton" type="submit" name="submit" value="学生一覧">
                    <p>学生の検索、課題の閲覧、学生情報の削除</p>
                </form>
            </div>

            <div class="item">
                <form method="POST" action="./28teacherSearch.php">
                    <input class="menubutton" type="submit" name="submit" value="教員一覧">
                    <p>教員情報の閲覧、削除</p>
                </form>
            </div>

            <div class="item">
                <form method="POST" action="./16StudentRegister.php">
                    <input class="menubutton" type="submit" name="submit" value="学生登録">
                    <p>学生新規登録</p>
                </form>
            </div>

            <div class="item">
                <form method="POST" action="./20KyouinRegister.php">
                    <input class="menubutton" type="submit" name="submit" value="教員登録">
                    <p>教員新規登録</p>
                </form>
            </div>

            <div class="item">
                <form method="POST" action="./31mockupSearch.php">
                    <input class="menubutton" type="submit" name="submit" value="保存一覧">
                    <?php
                    session_start();
                    $userID = $_SESSION['userID'];
                    print '<input type="hidden" name="userID" value="' . $userID . '">';
                    ?>
                    <p>保存済みモックアップ</p>
                </form>
            </div>

            <div class="item">
                <form method="POST" action="./index.php">
                    <input class="menubutton" type="submit" name="submit" value="新規作成">
                    <p>モックアップ新規作成</p>
                </form>
            </div>

            <div class="item">
                <form method="POST" action="./13MyPage.php">
                    <input class="menubutton" type="submit" name="submit" value="マイページ">
                    <p>登録情報の閲覧、編集</p>
                </form>
            </div>

            <div class="item">
                <form method="POST" action="./10logout.php">
                    <input class="menubutton" type="submit" name="submit" value="ログアウト">
                </form>
            </div>
        </div>
    </div>
</body>

</html>