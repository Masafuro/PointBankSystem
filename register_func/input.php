<?php
require('load.php');

$state = "null";
    $newwallet = $wallet;
    if(isset($_POST['add'])) {
       //echo "登録ボタンが押下されました";
       $state = "add";
       $newwallet = $wallet + 1;
       $query = "UPDATE users SET wallet = $newwallet WHERE email= '$email' ";

    }
    else if(isset($_POST['remove'])) {
       //echo "削除ボタンが押下されました";
       $state = "remove";
       $newwallet = $wallet - 1;
       $query = "UPDATE users SET wallet = $newwallet WHERE email= '$email' ";

    }

require('DBwrite.php');

http_response_code( 301 ) ;
header( "Location: home.php" ) ;
exit ;


?>

<!--
<!DOCTYPE HTML>
<html lang="ja">
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>マイページ</title>
<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css">
</head>
</head>
<body>
<div class="col-xs-6 col-xs-offset-3">
  <div>
  	<img class="center-block" width="150px" src="chipsLogo.png">
  </div>

<ul>
	<li>状態：<?php echo $state; ?></li>
  <li>username：<?php echo $name; ?></li>
  <li>email：<?php echo $email; ?></li>
  <li>wallet：<?php echo $wallet; ?></li>
  <li>NW：<?php echo $newwallet; ?></li>
</ul>

<a href="home.php">もどる</a>
<a href="logout.php?logout">
	<button type="submit" class="btn btn-default" name="login">ログアウト</button>
</a>

</div>
</body>
</html>
-->
