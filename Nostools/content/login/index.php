<?php
	include $_SERVER['DOCUMENT_ROOT'] . "/include/header.php";
	
	$basic = new Basic();
	$user = new User();
	$token = new Token();
	
	$_SESSION['csrf'] = $token->generateToken();
	
	if ($user->is_loggedin())
	{
		$user->redirect("http://nostools.cz/");
	}
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
	            </div>
				<div class="registration_errors">
				<?php
					
					$basic->checkErrors();
					
				?>
				</div>
				<div class="main-register main-center">
					<form action="http://nostools.cz/scripts/login.php" class="form-horizontal" method="post">
						
						<div class="form-group">
							<label for="name" class="cols-sm-2 control-label">Přihlašovací jméno</label>
							<div class="cols-sm-10">
								<div class="input-group reg-inputs">
									<input type="text" autocomplete="off" class="form-control" name="name" id="register-username"  placeholder="Enter your Username"/>
								</div>
							</div>
						</div>

						<div class="form-group">
							<label for="email" class="cols-sm-2 control-label">Heslo</label>
							<div class="cols-sm-10">
								<div style="margin-bottom: 25px;" class="input-group reg-inputs">
									<input type="password" autocomplete="off" class="form-control" name="password" id="register-email"  placeholder="Enter your Password"/>
								</div>
							</div>
							<center>
								<div class='g-recaptcha' data-sitekey="<?php echo $key2; ?>"></div>
							</center>
						</div>
						<input type="hidden" name="csrf" value="<?php echo $_SESSION['csrf']; ?>"/>
						<div class="form-group ">
							<button type="submit" id="regbut" name="logbutton" class="btn btn-danger btn-lg btn-block login-button">Přihlásit</button>
						</div>
						</form>
						<div class="login-register">
				            <a href="http://nostools.cz/content/registration/">Registrace</a>
				         </div>
					</form>
				</div>
			</div>
		</div>
	</body>
</html>