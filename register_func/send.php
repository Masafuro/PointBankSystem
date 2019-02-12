<?php

ob_start();
session_start();

header('Expires:-1');
header('Cache-Control:');
header('Pragma:');

include_once 'dbconnect.php';

include 'ChromePhp.php';

if(isset($_POST['send'])) {

  ChromePhp::log('ISSET');

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



  header('Location: home.php');

}



?>
