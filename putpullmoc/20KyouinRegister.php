<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>新規教師登録</title>
    <link href="css/login.css" rel="stylesheet" type="text/css" media="all">
    <link href="css/menu.css" rel="stylesheet" type="text/css" media="all">
    <link href="css/mypage.css" rel="stylesheet" type="text/css" media="all">
    <header>

    </header>
    <div class="logo">
        <a href="11MenuK.html"><img src="./img/ppm.png" alt="メニュー"></a>
    </div>
    <nav>
        <a href="11MenuK.html">メニュー</a>
        <a href="11MenuK.html">学生一覧</a>
        <a href="11MenuK.html">保存一覧</a>
        <a href="11MenuK.html">新規作成</a>
        <a href="10logout.html">ログアウト</a>
        <div class="animation start-home"></div>
    </nav>
</head>

<body>
    <div class="menu-page">
        <h1>| 教員登録</h1>
        <p>登録する教員情報を入力してください。</p>
        <form action="22KyouinRegister.html">
            <table>

                <tr>
                    <th>氏名</th>
                    <td><input class="text" size="25" type="text" placeholder="姓"></td>
                    <td><input class="text" size="25" type="text" placeholder="名"></td>
                </tr>
                <tr>
                    <th>担当学科</th>
                    <td><select class="select" name="Department">
                            <option>情報処理科</option>
                            <option>情報システム開発科</option>
                            <option>高度情報処理科</option>
                        </select></td>
                </tr>
                <tr>
                    <th>メールアドレス</th>
                    <td><input class="text" type="text" placeholder="メールアドレス"></td>
                </tr>
                <tr>
                    <th>パスワード</th>
                    <td><input class="text" type="text" placeholder="パスワード"></td>
                </tr>
                <tr>
                    <th></th>
                    <td><input class="text" type="text" placeholder="パスワード再入力"></td>
                </tr>

            </table>
            <button class="menubutton" type="button" onclick="history.back()">戻る</button>
            <input class="menubutton" type="submit" value="確認">
        </form>
    </div>
</body>

</html>