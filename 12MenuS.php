
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>メニュー</title>
<header>

</header>
    <a href="11MenuK.html"><img src="./img/PutPullMoc.png" alt="メニュー"></a>
    <div id="nav">
        <table>
            <th><a href="11MenuK.html">メニュー</a></th>
            <th><a href="11MenuK.html">保存一覧</a></th>
            <th><a href="11MenuK.html">新規作成</a></th>
        </table>

    </div>
    <button type="button" onclick="location.href='10login.html'">ログアウト</button>
</head>
<body>
    
    <h2>メニュー</h2>
    <form method="POST" action="/1login.html">
        <p><input type="submit" name="submit" value="保存一覧"></p>
    </form>

    <form method="POST" action="/1login.html">
        <p><input type="submit" name="submit" value="新規作成"></p>
        </form>

    <form method="POST" action="/10logout.html">
        <p><input type="submit" name="submit" value="ログアウト"></p>
        </form>

</body>
</html>