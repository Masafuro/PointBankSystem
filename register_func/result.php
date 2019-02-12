<?php

ob_start();
session_start();

header('Expires:-1');
header('Cache-Control:');
header('Pragma:');

include_once 'dbconnect.php';

include 'ChromePhp.php';
ChromePhp::log('result!');


if(isset($_POST['send'])) {

  ChromePhp::log('ISSET_SEND');

  $address = $mysqli->real_escape_string($_POST['address']);
  $amount = $mysqli->real_escape_string($_POST['amount']);

	// 書き換えクエリの実行
	$query = "UPDATE users SET wallet = wallet + $amount WHERE username='$address'";
	$result = $mysqli->query($query);
	if (!$result) {
		print('クエリーが失敗しました。ERROR1' . $mysqli->error);
		$mysqli->close();
		exit();
	}



  $query = "UPDATE users SET wallet = wallet - $amount WHERE username='$name'";
  $result = $mysqli->query($query);
  if (!$result) {
    print('クエリーが失敗しました。ERROR2' . $mysqli->error);
    $mysqli->close();
    exit();
  }

  $query = "UPDATE users SET wallet = wallet + $amount WHERE username='gdp'";
  $result = $mysqli->query($query);
  if (!$result) {
    print('クエリーが失敗しました。ERROR3' . $mysqli->error);
    $mysqli->close();
    exit();
  }

  $query = "SELECT * FROM users WHERE user_id=".$_SESSION['user']."";
  $result = $mysqli->query($query);
  if (!$result) {
  	print('クエリーが失敗しました。ERROR4' . $mysqli->error);
  	$mysqli->close();
  	exit();
  }

  // ユーザー情報の取り出し
  while ($row = $result->fetch_assoc()) {
  	$name = $row['username'];
  	$email = $row['email'];
  	$wallet = $row['wallet'];

  }


  $mysqli->close();

}

?>

<!DOCTYPE HTML>
<html lang="ja">
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>振込完了</title>

<script src="countUp/countUp.js"></script>

<link rel="stylesheet" href="css/skeleton.css">
<link rel="stylesheet" href="css/normalize.css">
<link rel="stylesheet" href="css/custom.css">

<link rel="stylesheet" href="styles.css">

</head>
</head>
<body>
	<div class="container">
	    <section class="header button-primary">
				<a href="description.php">
				<img width="150px" src="chipsLogo.png">
			</a>
			<h1 class="word">送る</h1>
	    </section>
		</div>


<div class="container">
<div class="number counter center" onclick= recount() >
<div id="counter" >
		<?php echo $wallet; ?>
</div>
<p>Chips</p>
</div>
</div>

<div class="container">
  <h3> 以下の通り振込が完了しました。</h3>
	<ul class="number center">
		<li class="white">振込先ユーザー名</li>
    <li class="white"><?php $address ?></li>

		<li class="white">振込量</li>
    <li class="white"><?php $amount ?></li>

	</ul>

		<div class="row">
			<div class="center">
				<a class="button" href="home.php">戻る</a>
			</div>
		</div>
</div>

<script>
var num = '<?php echo $wallet; ?>';
var count = new CountUp("counter", 0, num,0,0.5,{
                      useEasing: false,
                      useGrouping: false,
											separator: '.',
											decimal: ','
});

count.start();

function recount(){
	var num = '<?php echo $wallet; ?>';
	var count = new CountUp("counter", 0, num,0,1.0,{
	                      useEasing: false,
	                      useGrouping: false,
												separator: '.',
												decimal: ','
	});

	count.start();
}



</script>

</body>
</html>
