<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>学生情報削除</title>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Righteous&family=Teko:wght@600&display=swap" rel="stylesheet">
    <link href="css/studentregister.css" rel="stylesheet" type="text/css" media="all">
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
        <h1>| 学生情報削除</h1>
        <div class="paper">
            <p>削除しました。</p>
        </div>
        <div class="button-area">
            <form action="24studentSearch.php">
                <input class="menubutton" type="submit" value="戻る">
            </form>
        </div>
    </div>
</body>

</html>