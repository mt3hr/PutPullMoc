<?php


$uri = './index.php?wmid=' . $_POST['wmid'] . '&version=' . $_POST['version'];
header("Location: " . $uri);


?>