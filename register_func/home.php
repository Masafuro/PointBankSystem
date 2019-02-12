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
				<h1 class="word">CHIPS BANK</h1>
			</a>
	    </section>
		</div>


<div class="container" >
<ul class="number">
	<li class="white">ユーザー名</li>
	<li class="blue"><?php echo $name; ?></li>
	<li class="white">メールアドレス</li>
	<li class="orange"><?php echo $email; ?></li>
</ul>
</div>

<div class="container">
<div class="number counter center" onclick= recount() >
<div id="counter" >
		<?php echo $wallet; ?>
</div>
<p>Chips</p>
</div>
</div>

<div class="container center">

<a class="button button-primary" href="sender.php">振込</a>
<a class="button" href="logout.php?logout">ログアウト</a>

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
