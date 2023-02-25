<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>モックアップバージョン削除</title>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Righteous&family=Teko:wght@600&display=swap" rel="stylesheet">
    <link href="css/studentsearch.css" rel="stylesheet" type="text/css" media="all">
    <link href="css/glovalnavigation.css" rel="stylesheet" type="text/css" media="all">
    <header class="header">
        <div class="header-inner">
            <?php
            session_cache_limiter('none');
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
        <h1>モックアップバージョン削除</h2>
        <p>削除しました。</p>
        <form action="33mockupVerSearch.php" method = "POST">
        <?php
            $userID = $_SESSION['mocUserID'];
            $WMID=$_SESSION['WMID'];
            $VersionID = $_SESSION['VersionID'];
            $VersionID = $_SESSION['WMName'];
            print '<input type="hidden" name="userID" value="' . $row['UserID'] . '">
                            <input type="hidden" name="WMID" value="' . $row['WMID'] . '">
                            <input type="hidden" name="VersionID" value="' . $row['VersionID'] . '">
                            <input type="hidden" name="WMName" value="' . $row['WMName'] . '"><input class="menubutton"  type="hidden" name="userId" value="'.$userID.'">';
            ?>
            <input class="menubutton" type="submit" value="戻る">
        </form>
    </div>
</body>

</html>