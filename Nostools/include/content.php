<?php
	include $_SERVER['DOCUMENT_ROOT'] . "/include/main-menu.php";
	
	$server = new Status();
?>
			<div id="fb-root"></div>
			<div class="header-img">
			</div>
			<div class="container main-container">
				<?php
					include $_SERVER['DOCUMENT_ROOT'] . "/include/title.php";
				?>
				<div class="main-border">
					<?php
						include $_SERVER['DOCUMENT_ROOT'] . "/include/menu.php";
					?>
					<div class="row profile">
						<div class="col-md-3">
						<?php
							include $_SERVER['DOCUMENT_ROOT'] . "/include/online.php";
							include $_SERVER['DOCUMENT_ROOT'] . "/include/profile-menu.php";
							include $_SERVER['DOCUMENT_ROOT'] . "/include/like.php";
							//include $_SERVER['DOCUMENT_ROOT'] . "/include/donate.php";
						?>
							<div class="highscore-table drop-shad">
								<div class="table-responsive">
									<table>
										<tr>
											<td>Server</td>
											<td>Status</td>
										</tr>
										<tr>
											<td>NosTools</td>
											<td>
											<?php
												$server->serverStatus("89.203.249.78", 4001);
											?>
											</td>
										</tr>
										<tr>
											<td>Asoidric</td>
											<td>
											<?php
												$server->serverStatus("89.203.250.101", 4006);
											?>
											</td>
										</tr>
										<tr>
											<td>ExtremeNos</td>
											<td>
											<?php
												$server->serverStatus("46.36.35.99", 4006);
											?>
											</td>
										</tr>
								  </table>
								</div>
							</div>
						</div>
							<div class="col-md-9">
								<div class="row">
									<div id="transition-timer-carousel" class="carousel slide transition-timer-carousel drop-shad" data-ride="carousel">
										<ol class="carousel-indicators">
											<li data-target="#transition-timer-carousel" data-slide-to="0" class="active"></li>
											<li data-target="#transition-timer-carousel" data-slide-to="1"></li>
											<li data-target="#transition-timer-carousel" data-slide-to="2"></li>
										</ol>
										<div class="carousel-inner">
											<div class="item active">
												<img src="http://nostools.cz/images/slider3.png" />
												<div class="carousel-caption">
													<h1 class="carousel-caption-header"><a title="#" href="#">Příjmáme návrhy!</a></h1>
													<p class="carousel-caption-text hidden-sm hidden-xs">
														Všechny návrhy, poznámky nám zasílejte na email nostaleaquaprague@seznam.cz
													</p>
												</div>
											</div>
											
											<div class="item">
												<img src="http://nostools.cz/images/slider2.png" />
												<div class="carousel-caption">
													<h1 class="carousel-caption-header"><a title="#" href="#">Systém nabídek</a></h1>
													<p class="carousel-caption-text hidden-sm hidden-xs">
														Dalším připravovaným projektem bude systém nabídek...
													</p>
												</div>
											</div>
											
											<div class="item">
												<img src="http://nostools.cz/images/slider1.png" />
												<div class="carousel-caption">
													<h1 class="carousel-caption-header"><a title="#" href="#">Systém ruček</a></h1>
													<p class="carousel-caption-text hidden-sm hidden-xs">
														Nový systém pochval a ruček se připravuje...
													</p>
												</div>
											</div>
										</div>
										
										
										<a class="left carousel-control" href="#transition-timer-carousel" data-slide="prev">
											<span class="glyphicon glyphicon-chevron-left"></span>
										</a>
										<a class="right carousel-control" href="#transition-timer-carousel" data-slide="next">
											<span class="glyphicon glyphicon-chevron-right"></span>
										</a>
										<hr class="transition-timer-carousel-progress-bar animate" />
									</div>
								</div>
							</div>
							<div class="col-md-9 news-mainpage">
								<div class="profile-content drop-shad">
									<h2>Novinky</h2>
									<hr>
									Aktuální verzí stránky je 1.0 ve, které není přidané téměř vůbec nic. Připravujeme systém pro přidání nabídek a systém ruček, který bude sloužit jako vizitka jednotlivých hráčů, kteří budou stránku využívat.Nýní je to možné, příjmáme návrhy od vás, které si průběžne pročítáme a zvažujeme jejich realizaci. Vaše návrhy, připomínky posílejte na emailovou adresu <a href="mailto:support@nostools.cz?subject=Návrh či připomínka">support@nostools.cz</a>
									<h3>NosTools herní server</h3>
									Původně měl web sloužit jako stránka pro obchodující hráče Nostale, ale změnila se ve web zprostředkující informace a věci příslušné k vlastnímu serveru, které již nyní běží na VPS a je volně dosupný. Zaregistrujte se, stáhněte si <a href="<?php echo $menudownload; ?>" title="Launcher">Launcher</a> a můžete se připojit do hry!
									
									<strong>
										<table>
											<tr>
												<td style="padding: 5px">EXP RATE</td>
												<td style="padding: 5px">15x</td>
											</tr>
											<tr>
												<td style="padding: 5px">DROP RATE</td>
												<td style="padding: 5px">1x</td>
											</tr>
											<tr>
												<td style="padding: 5px">GOLD RATE</td>
												<td style="padding: 5px">30x</td>
											</tr>
										</table>
									</strong>
									<!--<h3>Může mě stránka okrást?</h3>
									Web neslouží k účelu okrádat uživatele. Jak je v podmínkách uvedeno nedoporučeno nezadávat přihlašovací údaje od svého herního účtu.
									<h3>Je možné ovlivnit vývoj stránky?</h3>-->
									
									<h3>Proč navštěvovat tuto stránku?</h3>
									Obchodujete s osobou a nevíte jestli se na ní můžete spolehnout, nás systém ruček, který se připravuje vám nabízí rychlý přehled všech registrovaných hráčů.-->
								</div>
							</div>
					</div>
				</div>
			</div>
			<script src="http://nostools.cz/js/online.js"></script>
			<script>(function(d, s, id) {
			  var js, fjs = d.getElementsByTagName(s)[0];
			  if (d.getElementById(id)) return;
			  js = d.createElement(s); js.id = id;
			  js.src = "//connect.facebook.net/cs_CZ/sdk.js#xfbml=1&version=v2.7";
			  fjs.parentNode.insertBefore(js, fjs);
			}(document, 'script', 'facebook-jssdk'));
			</script>
<?php
	include $_SERVER['DOCUMENT_ROOT'] . "/include/footer.php";
?>