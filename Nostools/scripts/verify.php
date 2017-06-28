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
				<?php
					
					$user = new User();
					$user->verify();
					
				?>
				</center>
			</div>
		</div>
	</div>
</div>
</body>
</html>