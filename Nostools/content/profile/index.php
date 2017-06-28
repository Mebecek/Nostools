<?php
	include $_SERVER['DOCUMENT_ROOT'] . "/include/header.php";
	
	$offer = new Offer();
	$basic = new Basic();
	$token = new Token();
	$pagination = new Pagination("market", $marketpp);
	
	$_SESSION['csrf'] = $token->generateToken();
	
	include $_SERVER['DOCUMENT_ROOT'] . "/include/main-menu.php";
?>
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
			?>
			</div>
			
			<div class="col-md-9">
				<div class="defdiv">
				<?php
					$basic->checkErrors();
				?>
				</div>
				<div class="bg-testimonial drop-shad">
					<div class="portlet-title">
						<div class="caption caption-red">
							<i class="glyphicon glyphicon-cog"></i>
							<span class="caption-subject text-uppercase"> Nastavení</span>
						</div>
					</div>
					
					<ul class="nav nav-tabs">
						<li class="active">
							<a href="#portlet_tab3" data-toggle="tab">Účet</a>
						</li>
						<li>
							<a href="#portlet_tab2" data-toggle="tab">Log</a>
						</li>
					</ul>
				
					<div class="tab-content settings">
						<div class="tab-pane" id="portlet_tab3">
							<p>
								V panelu nastavení si můžete volně upravit nastavení účtu, jak změnu hesla tak i změnu emailu a dalších údajů zadaných při registraci.
							</p>
							<div class="row">
								<div class="col-md-6 profileset">
									<div class="form-group">
										<label for="name" class="cols-sm-2 control-label">Staré heslo</label>
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
										<label for="name" class="cols-sm-2 control-label">Nové heslo</label>
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
										<label for="name" class="cols-sm-2 control-label">Nové heslo znovu</label>
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
										<input type="submit" name="changemail" id="regbut" class="btn btn-danger btn-lg btn-block login-button" value="Změnit"/>
									</div>
								</div>
								<div class="col-md-6 profileset">
									<div class="form-group">
										<label for="name" class="cols-sm-2 control-label">Email</label>
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
										<label for="name" class="cols-sm-2 control-label">Nový email</label>
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
										<label for="name" class="cols-sm-2 control-label">Nový email znovu</label>
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
										<input type="submit" name="changemail" id="regbut" class="btn btn-danger btn-lg btn-block login-button" value="Změnit"/>
									</div>
								</div>
							</div>
							<hr>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<div class="table-responsive">
											<table class="table table-stripped">
												<tbody>
												  <tr>
													<th>Pohlaví</th>
													<td>
														<div class="ckbox">
															<input checked type="radio" name="gender" id="checkbox1" value="0">
															<label for="checkbox1"></label><span class="gendermar">Muž</span>
														</div>
														<div class="ckbox">
															<input type="radio" name="gender" id="checkbox2" value="1">
															<label for="checkbox2"></label><span class="gendermar">Žena</span>
														</div>
													</td>
												  </tr>
												  <tr>
													<th>Dostávat zprávy na email</th>
													<td>
														<div class="ckbox">
															<input checked type="radio" name="getemails" id="checkbox3" value="0">
															<label for="checkbox3"></label><span class="gendermar">Ne</span>
														</div>
														<div class="ckbox">
															<input type="radio" name="getemails" id="checkbox4" value="1">
															<label for="checkbox4"></label><span class="gendermar">Ano</span>
														</div>
													</td>
												  </tr>
												  <tr>
													<th>Povolání</th>
													<td>
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
													</td>
												  </tr>
												</tbody>
											</table>
										</div>
									</div>
								</div>
								<div class="form-group">
									<input type="submit" name="changemail" id="regbut" class="btn btn-danger btn-lg btn-block login-button" value="Změnit"/>
								</div>
							</div>
						</div>
						
						<div class="tab-pane" id="portlet_tab2">
							<p>
							Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passage..
							</p>
						</div>
						
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script src="http://nostools.cz/js/online.js"></script>
<?php
	include $_SERVER['DOCUMENT_ROOT'] . "/include/footer.php";
?>