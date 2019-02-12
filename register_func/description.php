<!DOCTYPE HTML>
<html lang="ja">
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>DESCRIPTION</title>

<script src="countUp/countUp.js"></script>

<link rel="stylesheet" href="css/skeleton.css">
<link rel="stylesheet" href="css/normalize.css">
<link rel="stylesheet" href="css/custom.css">

<link rel="stylesheet" href="styles.css">

</head>

<body>
	<div class="container">
	    <section class="header button-primary">
				<a href="index.php">
				<img width="150px" src="chipsLogo.png">
				<h1 class="word">CHIPS BANK</h1>
				</a>
				</section>
		</div>

<div class="container center">
  <ul>
    <ol>1chipsに対して古川企画は1時間の労働供与を保証します。</ol>
    <ol>ユーザーが求めれば、古川企画は仕事を用意しchipsを支払います。</ol>
  </ul>
	<a class="button" href="index.php">ログインまたは会員登録</a>

</div>



<script>
var gdp = '<?php echo $gdp; ?>';
var num = gdp;
var count = new CountUp("counter", 0, num,0,0.5,{
                      useEasing: false,
                      useGrouping: false,
											separator: '.',
											decimal: ','
});

count.start();

function recount(){
  var gdp = '<?php echo $gdp; ?>';
  var num = gdp;
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
