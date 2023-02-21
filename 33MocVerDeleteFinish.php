<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>新規教師登録</title>
    <header>

    </header>
    <a href="11MenuK.html"><img src="./img/PutPullMoc.png" alt="メニュー"></a>
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
    <h2>教員登録</h2>
    <p>削除しました。</p>
    <form action="28teacherSearch.php">
        <input type="submit" value="戻る">
    </form>
</body>

</html>