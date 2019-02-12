<?php
// start to add data

    session_start();
    //include_once 'dbconnect.php';
    include 'dbconnect.php';

    if(!isset($_SESSION['user'])) {
    	header("Location: index.php");
    }

    $result = $mysqli->query($query);
    $result = $mysqli->query($query);

    if (!$result) {
    	print('クエリーが失敗しました。' . $mysqli->error);
    	$mysqli->close();
    	exit();
    }

    // ユーザー情報の取り出し
    // データベースの切断
    $mysqli->close();

// end to add data

 ?>
