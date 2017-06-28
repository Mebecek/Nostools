<?php
	include $_SERVER['DOCUMENT_ROOT'] . "/config.php";
	include $_SERVER['DOCUMENT_ROOT'] . "/include/header.php";
?>
<body onload="loadingloader()" class="blacky">
<div id="preload">
	<div class="loading"></div>
</div>
<nav class="navbar navbar-inverse top-menu">
  <div class="container-fluid">
	<div class="navbar-header">
	  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
		<span class="sr-only">Toggle navigation</span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
	  </button>
	  <a class="navbar-brand" href="<?php echo $gamelink; ?>"><?php echo $gamename; ?></a>
	</div>

	<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	  <ul class="nav navbar-nav">
		<li><a href="<?php echo $menuhelp; ?>">Help</a></li>
		<li><a href="<?php echo $menusupport; ?>">Support</a></li>
	  </ul>
	</div>
  </div>
</nav>
<?php
	include $_SERVER['DOCUMENT_ROOT'] . "/include/footer.php";
?>