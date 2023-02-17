<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>新規生徒登録</title>
    <link href="css/menu.css" rel="stylesheet" type="text/css" media="all">
    <header>

    </header>
    <div class="logo">
        <a href="11MenuK.html"><img src="./img/ppm.png" alt="メニュー"></a>
    </div>
    <?php
        if($_SESSION['position'] == "t"){
            print '<nav><a href="11MenuK.php">メニュー</a>
            <a href="24studentSearch.php">学生一覧</a>
            <a href="11MenuK.php">保存一覧</a>
            <a href="11MenuK.php">新規作成</a>
            <a href="10logout.php">ログアウト</a>
            <div class="animation start-home"></div>
            </nav>';
        }else{
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
        <h1>| 学生登録</h1>
        <p>以下の内容で登録してもよろしいですか。</p>
        <table>
            <?php

            print "<tr>
                <th>氏名</th>
                <td>".$_POST['surname']."</td>
                <td>".$_POST['name']."</td>
            </tr>
            <tr>
                <th>メールアドレス</th>
                <td>".$_POST['email']."</td>
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