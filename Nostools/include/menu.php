<nav class="navbar navbar-inverse main-navigator">
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
								<li><a href="<?php echo $gamelink; ?>">Hlavní stránka</a></li>
								<li class="dropdown">
								<li><a href="<?php echo $menumarket; ?>">Tržiště</a></li>
								</li>
							  <li><a href="<?php echo $menuwarrant; ?>">Ručky</a></li>
							  <li><a href="<?php echo $menudownload; ?>">Stažení</a></li>
							</ul>
							<ul class="nav navbar-nav navbar-right">
								<?php
									$useracc = new User();
									if (!$useracc->is_loggedin())
									{
										echo "<li><a href=" . $menuregister . "><span class='glyphicon glyphicon-user'></span> Registrace</a></li>";
								
										echo "<li><a href=" . $menulogin ."><span class='glyphicon glyphicon-log-in'></span> Přihlášení</a></li>";
									} else {
										$menuname = Query::getInstance()->get('users', array('id', '=', $_SESSION['logged_id']));
										foreach ($menuname->results() as $usermenu)
										{
											echo "<li><a href=" . $menuregister . ">Vítej, " . $usermenu->nickname . "!</a></li>";
											echo "<li><a href=" . $menulogout ."><span class='glyphicon glyphicon-log-in'></span> Odhlásit</a></li>";
										}
									}
								?>
							</ul>
						</div>
					</div>
				</nav>