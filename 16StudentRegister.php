</html>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>マイページ</title>
    <link href="css/menu.css" rel="stylesheet" type="text/css" media="all">
    <link href="css/mypage.css" rel="stylesheet" type="text/css" media="all">
    <header>

    </header>
    <div class="logo">
        <a href="11MenuK.php"><img src="./img/ppm.png" alt="メニュー"></a>
    </div>
    <?php
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
        <h1>| マイページ</h1>
        <div id="mypage">
            <h1>| 学生登録</h1>
            <p>登録する学生情報を入力してください。</p>
            <form action="16KRchack.php" method="POST">
                <table>

                    <tr>
                        <th>氏名</th>
                        <td><input class="text" size="25" type="text" name="surname" placeholder="姓"></td>
                        <td><input class="text" size="25" type="text" name="name" placeholder="名"></td>
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

                </table>
                <?php
                session_start();
                $errorMsg = $_SESSION['errorMsg'] ?? '';
                print "<p id='error'>" . $errorMsg . "</p>";
                $_SESSION['errorMsg'] = null;
                ?>

                <input class="menubutton" type="submit" value="確認">
                <button class="menubutton" type="button" onclick="history.back()">戻る</button>
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
            <input type="file" id="csv_file" name="usersCsv" id="usersCsv" accept=".csv" />
            <input class="menubutton" type="submit" value="送信">
            </form>



        </div>

    </div>
    <button class="menubutton" type="button" onclick="history.back()">戻る</button>
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