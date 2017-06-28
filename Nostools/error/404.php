<?php
	include $_SERVER['DOCUMENT_ROOT'] . "/include/header.php";
?>
<body onload="loadingloader()" class="register-bg">
<div id="preload">
	<div class="loading"></div>
</div>
<div class="container">
	<div class="row main">
		<div class="panel-heading">
		   <div class="panel-title text-center">
				<a id="register-header" href="<?php echo $gamelink; ?>" title="<?php echo $gamename; ?>"><h1 class="title"><?php echo $gamename; ?></h1></a>
				<hr />
			</div>
			<div class="main-register main-center rules">
				<center>
					<h2>Whoops...</h2>
					<img id="error" src="./img/404.png" alt="Stránka nenalezena" />
					<p id="errortxt">Stránka kterou se snažíš najít neexistuje. Něco je špatně, nemyslíš?</p>
				</center>
			</div>
		</div>
	</div>
</div>
</body>
</html>