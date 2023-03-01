<?php
mb_language("japanese");
mb_internal_encoding("UTF-8");

$to = $_POST["to"];
$subject = $_POST["subject"];
$body = "こんにちわ、{$to}様\r\n";
$body .= $_POST["body"];
$body .= "\r\n21jyxxxxより";

mb_send_mail($to, $subject, $body, "From:21jygr01@jynet2.jec.ac.jp");

?>
<!DOCTYPE html>
<html lang=ja>

<head>
	<meta charset="UTF-8">
	<title>送信確認</title>
</head>

<body>
	<h1>メール送信</h1>
	<p>メールを送りました。 ご確認ください。</p>
	<a href="mail_form.php">メール入力に戻る</a>
</body>

</html>