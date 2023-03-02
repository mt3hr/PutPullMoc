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
        <h1>| メニュー</h1>
        <div class="menulist-right">
            <div class="menuitem">
                <a href="./24studentSearch.php">
                    <div class="icon">
                        <img src="img/studentListIcon.png">
                    </div>
                    <h3 class="menubutton">学生一覧<h3>
                            <p>学生の検索、課題の閲覧、学生情報の削除</p>
                </a>
            </div>

            <div class="menuitem">
                <a href="./28teacherSearch.php">
                    <div class="icon">
                        <img src="img/teacherListIcon.png">
                    </div>
                    <h3 class="menubutton">教員一覧<h3>
                            <p>教員情報の閲覧、削除</p>
                </a>
            </div>

            <div class="menuitem-right">
                <a href="./13MyPage.php">
                    <div class="icon">
                        <img src="img/mypageIcon.png">
                    </div>
                    <h3 class="menubutton">マイページ<h3>
                            <p>登録情報の閲覧、編集</p>
                </a>
            </div>
        </div>
        <div class="menulist">
            <div class="menuitem">
                <a href="./16StudentRegister.php">
                    <div class="icon">
                        <img src="img/studentRegisterIcon.png">
                    </div>
                    <h3 class="menubutton">学生登録<h3>
                            <p>学生新規登録</p>
                </a>
            </div>

            <div class="menuitem">
                <a href="./20KyouinRegister.php">
                    <div class="icon">
                        <img src="img/teachearRegisterIcon.png">
                    </div>
                    <h3 class="menubutton">教員登録<h3>
                            <p>教員新規登録</p>
                </a>
            </div>
        </div>
        <div class="menulist">
            <div class="menuitem">
                <?php
                $userID = $_SESSION['userID'];
                print '<a href="./31mockupSearch.php?userID=' . $userID . '">';
                ?>

                <div class="icon">
                    <img src="img/openProjectIcon.png">
                </div>
                <h3 class="menubutton">保存一覧<h3>


                        <p>保存済みモックアップ</p>
                        </a>
            </div>

            <div class="menuitem">
                <a href="./index.php">
                    <div class="icon">
                        <img src="img/newProjectIcon.png">
                    </div>
                    <h3 class="menubutton">新規作成<h3>
                            <p>モックアップ新規作成</p>
                </a>
            </div>
        </div>
    </div>
    </div>
</body>

</html>