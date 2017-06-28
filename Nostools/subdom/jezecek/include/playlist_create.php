<?php
	include $_SERVER['DOCUMENT_ROOT'] . "/subdom/jezecek/include/header.php";
	include $_SERVER['DOCUMENT_ROOT'] . "/subdom/jezecek/include/menu.php";
	
	
?>
<body style="background-color:#A9A9A9">
	<div class="container" style="width:50%;">
		<div class="row main">
			<div class="panel-heading">
	            <div class="panel-title text-center">
	                <h1 class="title">Create playlist</h1>
	                <hr />
					<div class="create playlist col-md-12">
						<form method="get" action="http://jezecek.nostools.cz/php/add_playlist.php">
							
							<label for="name">Enter the url of the video</label>
							<br>
							<?php
								create_playlist();
								echo "<br>";
							?>
							<button type="submit" name="submit_add" class="btn btn-primary btn-lg btn-block login-button" >Add songs</button>
						</form>
					</div>	
				</div>
			</div>			
		</div>
	</div>		