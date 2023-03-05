<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>学生登録</title>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Righteous&family=Teko:wght@600&display=swap" rel="stylesheet">
    <link href="css/glovalnavigation.css" rel="stylesheet" type="text/css" media="all">
    <link href="css/kyoinregister.css" rel="stylesheet" type="text/css" media="all">
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
                            <li class="header-navListItem"><a href="/">新規作成</a></li>
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
                            <li class="header-navListItem"><a href="/">新規作成</a></li>
                            <li class="header-navListItem"><a href="10logout.php">ログアウト</a></li>
                        </ul>
                    </nav>';
                //教師ではないのでlogoutさせる
                $uri = './10logout.php';
                header("Location: " . $uri);
            }
            ?>
        </div>
    </header>
</head>

<body>
    <div class="menu-page">
        <div id="mypage">
            <h1>| 学生登録</h1>
            <p>登録する学生情報を入力してください。</p>
            <form action="16SRChack.php" method="POST">
                <p id="error">
                    <?php
                    $errorMsg = $_SESSION['errorMsg'] ?? '';
                    print "<p id = 'error'>" . $errorMsg . "</p>";
                    $errorMsg = '';

                    $error = $_SESSION['error'] ?? '';
                    $_SESSION['errorMsg'] = null;
                    $_SESSION['error'] = null;
                    if ($error) {
                        print '</p>
                <table>
                    <tr>
                        <th>ID</th>
                        <td><input class="text" size="25" type="text" name="userID" placeholder="ユーザID" value="' . $_SESSION['regstuserID'] . '"></td>
                    </tr>
                    <tr>
                        <th>氏名</th>
                        <td class="name">
                            <input class="text text-name" size="25" type="text" name="surname" placeholder="姓" value="' . $_SESSION['regstSurname'] . '">
                        </td>
                        <td class="name left">
                            <input class="text text-name" size="25" type="text" name="name" placeholder="名" value="' . $_SESSION['regstName'] . '">
                        </td>
                    </tr>
                    <tr>
                        <th>メールアドレス</th>
                        <td><input class="text" type="text" name="email" placeholder="メールアドレス" value="' . $_SESSION['regstEmail'] . '"></td>
                    </tr>
                    <tr>
                        <th>パスワード</th>
                        <td><input class="text" type="password" name="pass" placeholder="パスワード" ></td>
                    </tr>
                    <tr>
                        <th>パスワード再入力</th>
                        <td><input class="text" type="password" name="repass" placeholder="パスワード再入力"></td>
                    </tr>
                </table>';
                        $_SESSION['regstEmail'] = '';
                        $_SESSION['regstuserID'] = '';
                        $_SESSION['regstSurname'] = '';
                        $_SESSION['regstName'] = '';
                    } else {
                        print '</p>
                <table>
                    <tr>
                        <th>ID</th>
                        <td><input class="text" size="25" type="text" name="userID" placeholder="ユーザID"></td>
                    </tr>
                    <tr>
                        <th>氏名</th>
                        <td class="name">
                            <input class="text text-name" size="25" type="text" name="surname" placeholder="姓">
                        </td>
                        <td class="name left">
                            <input class="text text-name" size="25" type="text" name="name" placeholder="名">
                        </td>
                    </tr>
                    <tr>
                        <th>メールアドレス</th>
                        <td><input class="text" type="text" name="email" placeholder="メールアドレス"></td>
                    </tr>
                    <tr>
                        <th>パスワード</th>
                        <td><input class="text" type="password" name="pass" placeholder="パスワード"></td>
                    </tr>
                    <tr>
                        <th>パスワード再入力</th>
                        <td><input class="text" type="password" name="repass" placeholder="パスワード再入力"></td>
                    </tr>
                </table>';
                    }
                    $error = "";
                    ?>
                <div class="button-area">
                    <button class="menubutton" type="button" onclick="history.back()">戻る</button>
                    <input class="menubutton" type="submit" value="確認">
                </div>
            </form>
            <!--TODO  余裕があったらCSVでの入力を

               <h2>ファイル形式</h2>
            <p>学生ごとに学籍番号、姓、名、メールアドレス、パスワードを入力したCSVファイル</p>
            <p>例：00XX0000, 山田, 太郎, 00XX0000@jec.ac.jp, **********</p>
            
            
            <p id ="message"></p> 
            <form method="POST" action="" enctype="multipart/form-data">
                <table id ="csvtable">
                </table>
                <?php

                // $arr = [];
                // $arr_s = [];
                // if(isset($_FILES['usersCsv'])) {
                //     $tmpfile = $_FILES['usersCsv']['tmp_name'];
                //     if(is_uploaded_file($tmpfile)) {
                //         $fh = fopen($tmpfile, "r");
                //         while(($arr = fgetcsv($fh)) !== false) {
                //         array_push($arr_s, $arr);
                //         }
                //         foreach($arr_s as $value  ){
                //             print_r($arr_s[0][0]);
                //         }
                //         echo "</br>";
                //         /*
                //         * ここにCSVファイルのデータが格納された $arr_s を利用する処理を記述
                //         */
                //     }
                // } else {
                // echo "<p>ファイルを選択してください</p><br />\n";
                // }
                ?> -->
            <!-- <input type="file" id="csv_file" name="usersCsv" id="usersCsv" accept=".csv" />
            <input class="menubutton" type="submit" value="送信">
            </form> -->



        </div>


</body>

</html>

<script type="text/javascript" language="javascript">
    let fileInput = document.getElementById('csv_file');
    let message = document.getElementById('message');
    let fileReader = new FileReader();

    // ファイル変更時イベント
    fileInput.onchange = () => {
        message.innerHTML = "読み込み中..."

        let file = fileInput.files[0];
        fileReader.readAsText(file, "Shift_JIS");
    };

    // ファイル読み込み時
    let items = [];
    fileReader.onload = () => {
        // ファイル読み込み
        let fileResult = fileReader.result.split('\r\n');

        // 先頭行をヘッダとして格納
        let header = fileResult[0].split(',')
        // 先頭行の削除
        fileResult.shift();

        // CSVから情報を取得
        items = fileResult.map(item => {
            let datas = item.split(',');
            let result = {};
            for (const index in datas) {
                let key = header[index];
                result[key] = datas[index];
            }
            return result;
        });

        // テーブル初期化
        let tbody = document.querySelector('#csv_data_table tbody');
        tbody.innerHTML = "<div></div>";

        //　CSVの内容を表示
        let tbody_html = "";
        for (item of items) {
            tbody_html += `<tr>
        <td>${item.id}</td>
        <td>${item.title}</td>
        <td>${item.url}</td>
        <td>${item.category}</td>
        <td>${item.create_date}</td>
      </tr>
      `
        }
        tbody.innerHTML = tbody_html;

        message.innerHTML = items.length + "件のデータを読み込みました。"
    }

    // ファイル読み取り失敗時
    fileReader.onerror = () => {
        items = [];
        message.innerHTML = "ファイル読み取りに失敗しました。"
    }
</script>