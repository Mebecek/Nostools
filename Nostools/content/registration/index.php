<?php
	session_start();
	include $_SERVER['DOCUMENT_ROOT'] . "/include/header.php";
	
	$user = new User();
	$basic = new Basic();
	$token = new Token();
	
	if ($user->is_loggedin())
	{
		$user->redirect("http://nostools.cz/");
	}
	
	$_SESSION['csrf'] = $token->generateToken();
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
				<div data-role="page" id="regone" class="main-register main-center">
					<form id="registrationform" class="form-horizontal" action="http://nostools.cz/scripts/register.php" method="post">
						<div class="form-group">
							<label for="name" class="cols-sm-2 control-label">Přihlašovací jméno</label>
							<div class="cols-sm-10">
								<div class="input-group reg-inputs">
									<input type="text" autocomplete="off" class="form-control" name="name" id="register-username"  placeholder="Enter your Username"/>
								</div>
								<ul id="register-username-check" class="check dot">
									<li><strong>8-16</strong> znaků</li>
								</ul>
							</div>
						</div>

						<div class="form-group">
							<label for="email" class="cols-sm-2 control-label">Email</label>
							<div class="cols-sm-10">
								<div class="input-group reg-inputs">
									<input type="text" autocomplete="off" class="form-control" name="email" id="register-email"  placeholder="Enter your Email"/>
								</div>
								<ul id="register-email-check" class="check dot">
									<li>Zadejte platný email - je potřeba k ověření účtu</li>
								</ul>
							</div>
						</div>

						<div class="form-group">
							<label for="username" class="cols-sm-2 control-label">Přezdívka</label>
							<div class="cols-sm-10">
								<div class="input-group reg-inputs">
									<input type="text" autocomplete="off" class="form-control" name="username" id="register-username2"  placeholder="Enter your Nickname"/>
								</div>
								<ul id="register-username2-check" class="check dot">
									<li>Vyplňte svojí přezdívku ze hry Nostale pro lepší identifikaci</li>
									<li><strong>4-14</strong> znaků</li>
								</ul>
							</div>
						</div>

						<div class="form-group">
							<label for="password" class="cols-sm-2 control-label">Heslo</label>
							<div class="cols-sm-10">
								<div class="input-group reg-inputs">
									<input type="password" class="form-control" name="password" id="register-password"  placeholder="Enter your Password"/>
								</div>
								<ul id="register-password-check" class="check dot">
									<li><strong>minimálně 8</strong> znaků</li>
									<li>Heslo musí obsahovat <strong>minimálně</strong> jedno velké <strong>písmeno</strong> a <strong>číslo</strong></li>
								</ul>
							</div>
						</div>

						<div class="form-group">
							<label for="confirm" class="cols-sm-2 control-label">Potvrzení hesla</label>
							<div class="cols-sm-10">
								<div class="input-group reg-inputs">
									<input type="password" class="form-control" name="passconfirm" id="register-confirm"  placeholder="Confirm your Password"/>
								</div>
								<ul id="register-confirm-check" class="check dot">
								</ul>
							</div>
						</div>

						<div class="g-recaptcha" data-sitekey="<?php echo $key2; ?>"></div>
						
						<div class="form-group ">
							<button id="regbut" class="btn btn-danger btn-lg btn-block login-button">Pokračovat</button>
						</div>
						<div class="login-register">
				            <a href="<?php echo $gamelink; ?>content/login/">Přihlášení</a>
				         </div>
				</div>
				<div data-role="page" id="regtwo" class="main-register main-center">
						
						<div class="form-group">
							<label for="name" class="cols-sm-2 control-label">Pohlaví</label>
							<div class="cols-sm-10">
								<div class="input-group reg-inputs">
									<div class="ckbox">
										<input checked type="radio" name="gender" id="checkbox1" value="0">
										<label for="checkbox1"></label><span class="gendermar">Muž</span>
									</div>
									<div class="ckbox">
										<input type="radio" name="gender" id="checkbox2" value="1">
										<label for="checkbox2"></label><span class="gendermar">Žena</span>
									</div>
								</div>
							</div>
						</div>

						<div class="form-group">
							<label for="username" class="cols-sm-2 control-label">Dostávat zprávy na email</label>
							<div class="cols-sm-10">
								<div class="input-group reg-inputs">
									<div class="ckbox">
										<input checked type="radio" name="getemails" id="checkbox3" value="0">
										<label for="checkbox3"></label><span class="gendermar">Ne</span>
									</div>
									<div class="ckbox">
										<input type="radio" name="getemails" id="checkbox4" value="1">
										<label for="checkbox4"></label><span class="gendermar">Ano</span>
									</div>
								</div>
							</div>
						</div>

						<div class="form-group">
							<label for="password" class="cols-sm-2 control-label">Povolání</label>
							<div class="cols-sm-10">
								<div class="input-group reg-inputs">
									<div class="ckbox">
										<input checked type="radio" name="gamejob" id="checkbox5" value="0">
										<label for="checkbox5"></label><span class="gendermar">Dobrodruh</span>
									</div>
									<div class="ckbox">
										<input type="radio" name="gamejob" id="checkbox6" value="1">
										<label for="checkbox6"></label><span class="gendermar">Válečník</span>
									</div>
									<div class="ckbox">
										<input type="radio" name="gamejob" id="checkbox7" value="2">
										<label for="checkbox7"></label><span class="gendermar">Lukostřelec</span>
									</div>
									<div class="ckbox">
										<input type="radio" name="gamejob" id="checkbox8" value="3">
										<label for="checkbox8"></label><span class="gendermar">Mág</span>
									</div>
								</div>
							</div>
						</div>

						<div class="form-group">
							<div class="cols-sm-10">
								<div class="input-group reg-inputs">
									<div class="ckbox">
										<input type="checkbox" name="rules" id="checkbox9" value="true">
										<label for="checkbox9"></label><span class="gendermar">Souhlasím s <a href="<?php echo $gamelink; ?>/content/registration/rules.php" target="_blank" title="Pravidla">pravidly</a></span>
									</div>
								</div>
							</div>
						</div>

						<div class="form-group">
							<input type="hidden" name="csrf" value="<?php echo $_SESSION['csrf']; ?>"/>
							<button id="backbut" class="btn btn-danger btn-lg btn-block login-button">Zpět</button>
							<button type="submit" name="regsubmit" id="regbut" class="btn btn-danger btn-lg btn-block login-button">Dokončit registraci</button>
						</div>
						<div class="login-register">
				            <a href="<?php echo $gamelink; ?>content/login/">Přihlášení</a>
				         </div>
					</form>
				</div>
			</div>
		</div>
		<script>
			$(document).ready(function() {
				$("#regone").show();
				$("#regtwo").hide();
				
				$("#regbut").click(function() {
					event.preventDefault();
					$("#regone").hide();
					$("#regtwo").fadeIn(1000);
				});
				
				$("#backbut").click(function() {
					event.preventDefault();
					$("#regtwo").hide();
					$("#regone").fadeIn(1000);
				});
				
				$("input").focus(function(){
					$(this).parents(".form-group").find("ul.check").show()
				});
				$("input").focusout(function(){
					$(this).parents(".form-group").find("ul.check").hide()
				});
			});
			
		</script>
	</body>
</html>