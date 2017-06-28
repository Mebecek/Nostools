<?php
    include $_SERVER['DOCUMENT_ROOT'] . "/subdom/jezecek/functions.php";
?>
<nav class="navbar menu navbar-inverse" style="border-radius:0px;">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#"><?php $site; ?></a>
    </div>
	 
    <ul class="nav navbar-nav">
      <li class="active"><a href="http://jezecek.nostools.cz/">Home</a></li>
      <li><a href="http://jezecek.nostools.cz/include/about.php">About</a></li>
      <li><a href="http://jezecek.nostools.cz/include/help.php">Help</a></li> 
	  <li><a href="http://jezecek.nostools.cz/include/charts.php">Charts</a></li>
	  <li><a href="http://jezecek.nostools.cz/include/playlists.php">Playlists</a></li>
	  <li><a href="http://jezecek.nostools.cz/include/listen.php">Listen</a></li>
	  <li><a href="http://jezecek.nostools.cz/include/search.php">Search</a></li>
	  <li><a href="http://jezecek.nostools.cz/include/events.php">Events</a></li>
    </ul>
    <?php
        checkUserLogged();
    ?>
  </div>
</nav>

	