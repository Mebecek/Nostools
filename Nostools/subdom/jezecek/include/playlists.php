<?php
	include $_SERVER['DOCUMENT_ROOT'] . "/subdom/jezecek/include/header.php";
	include $_SERVER['DOCUMENT_ROOT'] . "/subdom/jezecek/include/menu.php";
	checkUser();
?>
<body style="background-color:#A9A9A9">
	<div class="container" style="width:40%;">
		<div class="row main">
			<div class="panel-heading">
	            <div class="panel-title text-center">
	                <h1 class="title">Playlists</h1>
	                <hr />
					<div class="create playlist col-md-12">
						<form method="post" action="http://jezecek.nostools.cz/php/create_playlist.php">
							
							<label for="name">Enter the name of your playlist</label>
							<br>
							<input type="text" class="form-control input-lg" placeholder="Name" name="name"/>
							<br>
							<label for="genre">Enter the genre of your playlist</label>
							<br>
							<input type="text" class="form-control input-lg" placeholder="Genre" name="genre"/>
							<br>
							<label for="url">Enter the number of songs</label>
							<br>
							<input type="text" class="form-control input-lg" placeholder="Number of songs" name="number_songs"/>
							<br>
							<button type="submit" name="submit_add" class="btn btn-primary btn-lg btn-block login-button" >Add songs</button>
						</form>
					</div>
	            </div>
						
	        </div>
		</div>
	</div>
	
<?php


?>	
	