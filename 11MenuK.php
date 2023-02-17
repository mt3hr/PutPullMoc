<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>メニュー</title>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Righteous&family=Teko:wght@600&display=swap" rel="stylesheet">
    <link href="css/glovalnavigation.css" rel="stylesheet" type="text/css" media="all">
    <link href="css/teachermenu.css" rel="stylesheet" type="text/css" media="all">
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
        <h1>| メニュー</h1>
        <div class="menulist-right">
            <div class="menuitem">
                <form method="POST" action="./24studentSearch.php">
                    <div class="icon">
                        <img src="img/teacherListIcon.png">
                    </div>
                    <input class="menubutton" type="submit" name="submit" value="学生一覧">
                    <p>学生の検索、課題の閲覧、学生情報の削除</p>
                </form>
            </div>

            <div class="menuitem">
                <div class="icon">
                    <img src="img/teacherListIcon.png">
                </div>
                <form method="POST" action="./28teacherSearch.php">
                    <input class="menubutton" type="submit" name="submit" value="教員一覧">
                    <p>教員情報の閲覧、削除</p>
                </form>
            </div>

            <div class="menuitem-right">
                <div class="icon">
                    <img src="img/mypageIcon.png">
                </div>
                <form method="POST" action="./13MyPage.php">
                    <input class="menubutton" type="submit" name="submit" value="マイページ">
                    <p>登録情報の閲覧、編集</p>
                </form>
            </div>
        </div>
        <div class="menulist">
            <div class="menuitem">
                <div class="icon">
                    <img src="img/studentRegisterIcon.png">
                </div>
                <form method="POST" action="./16StudentRegister.php">
                    <input class="menubutton" type="submit" name="submit" value="学生登録">
                    <p>学生新規登録</p>
                </form>
            </div>

            <div class="menuitem">
                <div class="icon">
                    <img src="img/teachearRegisterIcon.png">
                </div>
                <form method="POST" action="./20KyouinRegister.php">
                    <input class="menubutton" type="submit" name="submit" value="教員登録">
                    <p>教員新規登録</p>
                </form>
            </div>
        </div>
        <div class="menulist">
            <div class="menuitem">
                <div class="icon">
                    <img src="img/openProjectIcon.png">
                </div>
                <form method="POST" action="./31mockupSearch.php">
                    <input class="menubutton" type="submit" name="submit" value="保存一覧">
                    <?php
                    $userID = $_SESSION['userID'];
                    print '<input type="hidden" name="userID" value="' . $userID . '">';
                    ?>
                    <p>保存済みモックアップ</p>
                </form>
            </div>

            <div class="menuitem">
                <div class="icon">
                    <img src="img/newProjectIcon.png">
                </div>
                <form method="POST" action="./index.php">
                    <input class="menubutton" type="submit" name="submit" value="新規作成">
                    <p>モックアップ新規作成</p>
                </form>
            </div>
        </div>
    </div>
    </div>
</body>

</html>