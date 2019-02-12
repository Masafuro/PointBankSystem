<?php
session_start();

header('Expires:-1');
header('Cache-Control:');
header('Pragma:');


//include_once 'dbconnect.php';
include 'dbconnect.php';

if(!isset($_SESSION['user'])) {
	header("Location: index.php");
}

// ユーザーIDからユーザー名を取り出す
$query = "SELECT * FROM users WHERE user_id=".$_SESSION['user']."";
$result = $mysqli->query($query);

if (!$result) {
	print('クエリーが失敗しました。' . $mysqli->error);
	$mysqli->close();
	exit();
}

// ユーザー情報の取り出し
while ($row = $result->fetch_assoc()) {
	$name = $row['username'];
	$email = $row['email'];
	$wallet = $row['wallet'];
}

$query = "SELECT * FROM users WHERE username='gdp'";
$result = $mysqli->query($query);

if (!$result) {
	print('クエリーが失敗しました。' . $mysqli->error);
	$mysqli->close();
	exit();
}

// ユーザー情報の取り出し
while ($row = $result->fetch_assoc()) {
	$gdp = $row['wallet'];
}



// データベースの切断
$result->close();

?>
