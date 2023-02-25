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
        <h1>| 学生登録</h1>
        <p>以下の内容で登録してもよろしいですか。</p>
        <table>
            <?php

            print "<tr>
                <th>氏名</th>
                <td>" . $_POST['surname'] . "</td>
                <td>" . $_POST['name'] . "</td>
            </tr>
            <tr>
                <th>メールアドレス</th>
                <td>" . $_POST['email'] . "</td>
            </tr>
            <tr>
                <th>パスワード</th>
                <td>******</td>
            </tr>"
                ?>
        </table>
        <button class="menubutton" type="button" onclick="history.back()">戻る</button>
        <form action="11MenuK.html">
            <input class="menubutton" type="submit" value="確認">
        </form>
        <?php
        //     $csv_file =$_FILES['usersCsv'];
        //     print $_FILES['usersCsv']['name'];
        //     // for( $count = 0;  $_FILES['usersCsv'] ; $count++ );
        
        //     $aryHoge = explode("\n", $csv_file);
        //     print '<p>'.$count.'件のデータが見つかりました。</p>';
        //     // 1行ずつ読み込む
        //     print '<table>';
        //     $aryCsv = [];
        //     foreach($csv_file as $key => $value){
        
        //     }
        //    var_dump($csv_file);
        //     print '</table>';
        //     // ファイルを閉じる
        ?>


        <button class="menubutton" type="button" onclick="history.back()">戻る</button>
        <form method="POST" action=""><input class="menubutton" type="submit" value="登録"></form>
    </div>
</body>

</html>