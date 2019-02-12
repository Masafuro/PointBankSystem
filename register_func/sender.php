<?php
require('load.php');
require('send.php');

ChromePhp::log('sender.php online.');

?>



<!DOCTYPE HTML>
<html lang="ja">
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>振込</title>

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
	<form method="post" action="" onsubmit="return submitChk()">
		<ul class="number center">
			<li class="white">振込先ユーザー名</li>
		<div class="center form-group number">
			<input type="address"  class="form-control" name="address" placeholder="ユーザー名" required/>
		</div>
		<li class="white">振込量</li>
		<div class="center form-group number">
			<input type="amount" class="form-control" name="amount" placeholder="振込量" required/>
		</div>
	</ul>

		<div class="row">
			<div class="center">
				<a class="button" href="home.php">戻る</a>
				<button type="submit" class="button button-primary" name="send">振込する</button>
			</div>
		</div>
	</form>
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


    function submitChk () {
        var flag = confirm ( "振込してもよろしいですか？");
        return flag;
    }

</script>

</body>
</html>
