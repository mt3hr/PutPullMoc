<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>メニュー</title>
    <link href="css/menu.css" rel="stylesheet" type="text/css" media="all">
    <header>

    </header>
    <div class="logo">
        <a href="11MenuK.php"><img src="./img/ppm.png" alt="メニュー"></a>
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
        <h1>| メニュー</h1>
        <div class="flex">
            

            <div class="item">
                <form method="POST" action="./31mockupSearch.php">
                    <input class="menubutton" type="submit" name="submit" value="保存一覧">
                    <?php
                    session_start();
                    $userID=$_SESSION['userID'];
                    ptint '<input type="hidden" name="userID" value="'.$userID.'">';
                    ?>
                    <p>保存済みモックアップ</p>
                </form>
            </div>

            <div class="item">
                <form method="POST" action="./index.php">
                    <input class="menubutton" type="submit" name="submit" value="新規作成">
                    <p>モックアップ新規作成</p>
                </form>
            </div>


            <div class="item">
                <form method="POST" action="./10logout.php">
                    <input class="menubutton" type="submit" name="submit" value="ログアウト">
                </form>
            </div>
        </div>
    </div>
</body>

</html>

<script>
    $(function () {
        var menu = $('#nav'),
            offset = menu.offset();
        $(window).scroll(function () {
            if ($(window).scrollTop() > offset.top) {
                menu.addClass('fixed');
            } else {
                menu.removeClass('fixed');
            }
        });
    });
</script>