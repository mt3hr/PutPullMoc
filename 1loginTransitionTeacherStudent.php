<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>ログイン</title>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Righteous&family=Teko:wght@600&display=swap" rel="stylesheet">
    <link href="css/login.css" rel="stylesheet" type="text/css" media="all">
</head>

<?php
session_start();
if ($_SESSION['position'] == "t") {
    $uri = './11MenuK.php';
    header("Location: " . $uri);
} else if ($_SESSION['position'] == "s") {
    $uri = './12MenuS.php';
    header("Location: " . $uri);
}
?>

<body>
</body>

</html>