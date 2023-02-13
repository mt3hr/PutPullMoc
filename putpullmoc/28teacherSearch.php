
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>学生検索</title>
<header>

</header>
    <a href="11MenuK.html"><img src="./img/PutPullMoc.png" alt="メニュー"></a>
    <div id="nav">
        <table>
            <th><a href="11MenuK.html">メニュー</a></th>
            <th><a href="11MenuK.html">学生一覧</a></th>
            <th><a href="11MenuK.html">保存一覧</a></th>
            <th><a href="11MenuK.html">新規作成</a></th>
        </table>
        <button type="button" onclick="location.href='10login.html'">ログアウト</button>
    </div>
</head>
<body> 
    <h2>教員登録</h2>
    <p>登録する教員情報を入力してください。</p>
    
    
        <ul>
        <input type="text" value="性">
        
        
        <!-- 削除ボタンについて。　教員と生徒のもの両方に対応したphpを作る -->
        </ul>
        <table>
            <tr><th>学籍番号</th><th>姓</th><th>名</th><th>メールアドレス</th><th></th></tr>
            <tr><td>66jy1234</td><td>高須</td><td>幹也</td><td>takasuclinic@jec.ac.jp</td><td><button>課題確認</button><button>削除</button></td></tr>
            <tr><td>21jy0212</td><td>小路</td><td>悠矢</td><td>21jy0212@jec.ac.jp</td><td><button>課題確認</button><button>削除</button></td></tr>
        </table>
        <p id = "error">検索結果０件</p>
    

</body>
</html>