<?php
	session_start();
	include $_SERVER['DOCUMENT_ROOT'] . "/subdom/jezecek/include/header.php";
	include $_SERVER['DOCUMENT_ROOT'] . "/subdom/jezecek/include/menu.php";
	if(isset($_SESSION['username'])) {
		echo "You are logged in as: " . $_SESSION['username']; 
	}
?>
<body style="background-color:#A9A9A9">
			<div class="container" style="width:40%;">
				<div class="row main">
					<div class="panel-heading">
					   <div class="panel-title text-center">
							<h1 class="title">Add artist</h1>
							<hr />
						</div>
					</div> 
					<div class="main-login main-center">
					<form class="form-horizontal" method="post" action="http://jezecek.nostools.cz/php/add_artist.php">
						
						<div class="form-group">
							<label for="name" class="cols-sm-2 control-label">Name</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="name" id="name"  placeholder="Enter the name"/>
								</div>
							</div>
						</div>

						<div class="form-group">
							<label for="year" class="cols-sm-2 control-label">Year of found</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="year" id="email"  placeholder="Enter the year of found" />
								</div>
							</div>
						</div>

						<div class="form-group">
							<label for="genre" class="cols-sm-2 control-label">Genre</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="genre" id="password"  placeholder="Enter the genre"/>
								</div>
							</div>
						</div>

						<div class="form-group">
							<label for="info" class="cols-sm-2 control-label">Inforamtions</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="info" id="confirm"  placeholder="Informations"/>
								</div>
							</div>
						</div>

						<div class="form-group ">
							<button type="submit" name="submit" class="btn btn-primary btn-lg btn-block login-button" >Submit</button>
						</div>
					</form>
				</div>
			</div>
		</div>		