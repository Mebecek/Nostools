<?php
	include $_SERVER['DOCUMENT_ROOT'] . "/config.php";
	
	$redirect = new Query();
	$userek = new User();
	$redi = "http://nostools.cz/content/registration/";
	$token = new Token();
	
	if (isset($_POST['regsubmit']))
	{
		if (!empty($_POST['name']))
		{
			if (!empty($_POST['email']))
			{
				if (!empty($_POST['username']))
				{
					if (!empty($_POST['password']))
					{
						if (!empty($_POST['passconfirm']))
						{
							if (isset($_POST['gender']))
							{
								if (isset($_POST['getemails']))
								{
									if (isset($_POST['gamejob']))
									{
										if (isset($_POST['rules']))
										{
											if ($token->checkToken($_SESSION['csrf'], $_POST['csrf']))
											{
												$ifusername = Query::getInstance()->get('users', array('username', '=', $_POST['name']));
												if (!$ifusername->count())
												{
													$ifemail = Query::getInstance()->get('users', array('email', '=', $_POST['email']));
													if (!$ifemail->count())
													{
														$ifnickname = Query::getInstance()->get('users', array('nickname', '=', $_POST['username']));
														if (!$ifnickname->count())
														{
															if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) === false)
															{
																if (strlen($_POST['name']) >= 8 && strlen($_POST['name']) <= 16)
																{
																	if (strlen($_POST['username']) >= 4 && strlen($_POST['username']) <= 14)
																	{
																		if (strlen($_POST['password']) >= 8)
																		{
																			if (preg_match('/[A-Z]/', $_POST['password']))
																			{
																				if (preg_match('/[0-9]/', $_POST['password']))
																				{
																					if ($_POST['password'] == $_POST['passconfirm'])
																					{
																						if ($_POST['gender'] == "1" || $_POST['gender'] == 0)
																						{
																							if ($_POST['getemails'] == "0" || $_POST['getemails'] == "1")
																							{
																								if ($_POST['gamejob'] == "0" || $_POST['gamejob'] == "1" || $_POST['gamejob'] == "2" || $_POST['gamejob'] == "3")
																								{
																									$url = 'https://www.google.com/recaptcha/api/siteverify';
																									$privatekey = $key;
																									$something = file_get_contents($url."?secret=" . $privatekey . "&response=".$_POST['g-recaptcha-response']."&remoteip=". $_SERVER['REMOTE_ADDR']);
																									$data= json_decode($something);
																									if(isset($data->success) AND $data->success == true)
																									{
																										$userIns = Query::getInstance()->insert('users', array(
																											'username' => htmlspecialchars($_POST['name']),
																											'nickname' => htmlspecialchars($_POST['username']),
																											'email' => htmlspecialchars($_POST['email']),
																											'password' => $userek->password($_POST['password']),
																											'token' => md5(sha1($_POST['email']))
																										));
																										
																										if ($userIns)
																										{
																											$userSel = Query::getInstance()->get('users', array('email', '=', $_POST['email']));
																											
																											if ($userSel->count())
																											{
																												foreach ($userSel->results() as $user)
																												{
																														$userIns2 = Query::getInstance()->insert('users_info', array(
																														'user_id' => $user->id,
																														'ip' => $_SERVER['REMOTE_ADDR'],
																														'date' => date("Y/m/d"),
																														'gender' => $_POST['gender'],
																														'getemails' => $_POST['getemails'],
																														'class' => $_POST['gamejob']
																													));
																													if ($userIns2)
																													{
																														$mail = new Email();
																														$mail->sendEmail("Nostools - Registrace proběhla úspěšně!", $_POST['email'], "Nostools - Registrace", "Ahoj <strong>" . $_POST['username'] . "</strong>, tvoje registrace proběhla úspěšně. Pro aktivaci tvého účtu použí tento link <br><a href='http://nostools.cz/scripts/verify.php?email=" .$_POST['email'] . "&token=" . md5(sha1($_POST['email'])) . "'> http://nostools.cz/scripts/verify.php?email=" .$_POST['email'] . "&token=" . md5(sha1($_POST['email'])) . "</a>", "support@nostools.cz");
																													}
																													
																													if ($mail)
																													{
																														$_SESSION['login_true'] = "Vaše registrace proběhla v pořádku. dostanete email s potvrzením";
																														$redirect->redirect($redi);
																													}
																												}
																											}
																										}
																									} else {
																										$_SESSION['login_error'] = "Chybné ověření Google Recaptcha";
																										$redirect->redirect($redi);
																									}
																								} else {
																									$redirect->redirect($redi);
																								}
																							} else {
																								$redirect->redirect($redi);
																							}
																						} else {
																							$redirect->redirect($redi);
																						}
																					} else {
																						$_SESSION['login_error'] = "Heslo se musí shodovat s potvrzeným heslem";
																						$redirect->redirect($redi);
																					}
																				} else {
																					$_SESSION['login_error'] = "Heslo musí obsahovat minimálně jedno číslo";
																					$redirect->redirect($redi);
																				}
																			} else {
																				$_SESSION['login_error'] = "Heslo musí obsahovat minimálně jedno velké písmeno";
																				$redirect->redirect($redi);
																			}
																		} else {
																			$_SESSION['login_error'] = "Heslo musí obsahovat minimálně 8 znaků";
																			$redirect->redirect($redi);
																		}
																	} else {
																		$_SESSION['login_error'] = "Přezdívka nesmí být kratší než 4 znaky ani delší jak 14 znaků";
																		$redirect->redirect($redi);
																	}
																} else {
																	$_SESSION['login_error'] = "Přihlašovací jméno nesmí být kratší než 8 znaků ani delší jak 16 znaků";
																	$redirect->redirect($redi);
																}
															} else {
																$_SESSION['login_error'] = "Zadejte platnou emailovou adresu";
																$redirect->redirect($redi);
															}
														} else {
															$_SESSION['login_error'] = "Přezdívka je již používána";
															$redirect->redirect($redi);
														}
													} else {
														$_SESSION['login_error'] = "Email je již používán";
														$redirect->redirect($redi);
													}
												} else {	
													$_SESSION['login_error'] = "Přihlašovací jméno je již používáno";
													$redirect->redirect($redi);
												}
											}
										} else {
											$_SESSION['login_error'] = "Pro dokončení registrace musíte souhlasit s pravidly";
											$redirect->redirect($redi);
										}
									} else {
										$_SESSION['login_error'] = "Vyplňte povolání";
										$redirect->redirect($redi);
									}
								} else {
									$_SESSION['login_error'] = "Vyberte možnost pro dostávání emailů";
									$redirect->redirect($redi);
								}
							} else {
								$_SESSION['login_error'] = "Vyberte pohlaví";
								$redirect->redirect($redi);
							}
						} else {
							$_SESSION['login_error'] = "Zadejte potvrzení hesla";
							$redirect->redirect($redi);
						}
					} else {
						$_SESSION['login_error'] = "Zadejte heslo";
						$redirect->redirect($redi);
					}
				} else {
					$_SESSION['login_error'] = "Zadejte přezdívku";
					$redirect->redirect($redi);
				}
			} else {
				$_SESSION['login_error'] = "Zadejte email";
				$redirect->redirect($redi);
			}
		} else {
			$_SESSION['login_error'] = "Zadejte přihlašovací jméno";
			$redirect->redirect($redi);
		}
	} else {
		$redirect->redirect("http://nostools.cz/");
	}
?>