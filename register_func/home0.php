<?php
require('load.php');
?>



<!DOCTYPE HTML>
<html lang="ja">
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>HOME</title>

<script src="countUp/countUp.js"></script>

<!-- Bootstrap読み込み（スタイリングのため） -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css">
<link rel="stylesheet" href="styles.css">

</head>
</head>
<body>
<div class="col-xs-6 col-xs-offset-3 container" >
	<div>
		<img class="center-block" width="150px" src="chipsLogo.png">
	</div>
<div class="row">
<ul class="number">
	<li class="blue"><?php echo $name; ?></li>
	<li class="orange"><?php echo $email; ?></li>
</ul>
</div>

<div class="number col-xs-6 col-xs-offset-3" onclick= recount() >
<h1 id="counter" >
		<?php echo $wallet; ?>
</h1>
<p>Chips</p>
</div>

</div>
<div class="container">
<form action="input.php" method="post">
    <input type="submit" class="btn btn-default" name="add" value="add" />
    <input type="submit" class="btn btn-default" name="remove" value="remove" />
</form>
<a href="logout.php?logout">
	<button type="submit" class="btn btn-default" name="login">ログアウト</button>
</a>

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
	var count = new CountUp("counter", 0, num,0,0.5,{
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
