<?php
ob_start();
// ここから、register.phpと同様
session_start();
if( isset($_SESSION['user']) != "") {
	header("Location: home.php");
}
include_once 'dbconnect.php';
// ここまで、register.phpと同様

if(isset($_POST['login'])) {

	$email = $mysqli->real_escape_string($_POST['email']);
	$password = $mysqli->real_escape_string($_POST['password']);

	// クエリの実行
	$query = "SELECT * FROM users WHERE email='$email'";
	$result = $mysqli->query($query);
	if (!$result) {
		print('クエリーが失敗しました。' . $mysqli->error);
		$mysqli->close();
		exit();
	}

	// パスワード(暗号化済み）とユーザーIDの取り出し
	while ($row = $result->fetch_assoc()) {
		$db_hashed_pwd = $row['password'];
		$user_id = $row['user_id'];
	}

	// データベースの切断
	$result->close();

	// ハッシュ化されたパスワードがマッチするかどうかを確認
	if (password_verify($password, $db_hashed_pwd)) {

		$_SESSION['user'] = $user_id;

		header("Location: home.php");
		exit;
	} else { ?>
		<div class="alert alert-danger" role="alert">メールアドレスとパスワードが一致しません。</div>
	<?php }
}

?>



<!DOCTYPE HTML>
<html lang="ja">
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>INDEX</title>
<link rel="stylesheet" href="styles.css">
<!-- Bootstrap読み込み（スタイリングのため） -->
<link rel="stylesheet" href="css/skeleton.css">
<link rel="stylesheet" href="css/normalize.css">
<link rel="stylesheet" href="css/custom.css">
<link rel="stylesheet" href="styles.css">

</head>
</head>
<body>

	<div class="container">
	    <section class="header">
				<a href="description.php">
				<img width="150px" src="chipsLogo.png">
				<h1 class="word">CHIPS BANK</h1>
			</a>
	    </section>
	</div>

	<div class="container">
		<form method="post">
				<div class="center form-group number">
					<input type="email"  class="form-control" name="email" placeholder="メールアドレス" required/>
				</div>
			<div class="center form-group number">
				<input type="password" class="form-control" name="password" placeholder="パスワード" required/>
			</div>
			<div class="row">
				<div class="center">
					<button type="submit" class="button button-primary" name="login">ログイン</button>
				</div>
			</div>
			<div class="row">
				<div class="center">
					<a class="button" href="register.php">新規登録</a>
					<a class="button" href="description.php">ChipsBANKとは</a>
				</div>
			</div>
		</form>
	</div>



</body>
</html>
