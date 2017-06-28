<?php
	include $_SERVER['DOCUMENT_ROOT'] . "/subdom/jezecek/include/header.php";
	include $_SERVER['DOCUMENT_ROOT'] . "/subdom/jezecek/include/menu.php";
?>
<body style="background-color:#A9A9A9">
	<div class="container" style="width:50%;">
		<div class="row main">
			<div class="panel-heading">
	            <div class="panel-title text-center">
	               <h1 class="title">Search</h1>
	               <hr />
	             </div>
	        </div>
			<form method="post" action="http://jezecek.nostools.cz/php/search.php">
				<div id="custom-search-input">
					<div class="input-group col-md-12">
						<input type="text" class="form-control input-lg" placeholder="Search" name="search" />
						<span class="input-group-btn">
							<button class="btn btn-info btn-lg" type="submit" name="submit">
								<i class="glyphicon glyphicon-search"></i>
							</button>
						</span>
					</div>
				</div>
			</form>
		</div>
	</div>	