<?php
	include $_SERVER['DOCUMENT_ROOT'] . "/config.php";

	$select = Query::getInstance()->get('users', array('id', '=', $_SESSION['logged_id']));
	foreach ($select->results() as $results)
	{
		$name = $results->nickname;
	}
	$selectinfo = Query::getInstance()->get('users_info', array('user_id', '=', $_SESSION['logged_id']));
	foreach ($selectinfo->results() as $results)
	{
		$gender = $results->gender;
	}
	
	if (isset($_SESSION['logged_id']))
	{
?>
<div class="profile-sidebar">
	<div class="profile-userpic">
		<?php
			if ($gender == 0)
			{
				echo "<img id='profileimg' src='http://nostools.cz/images/default/man.jpg' width='150px' class='img-responsive' alt=''>";
			} else {
				echo "<img id='profileimg' src='http://nostools.cz/images/default/woman.jpg' width='150px' class='img-responsive' alt=''>";
			}
		?>
	</div>
	<div class="profile-usertitle">
		<div class="profile-usertitle-name">
			<?php echo $name; ?>
		</div>
		<div class="profile-usertitle-job">
			<span class="label label-danger">
				Developer
			</span>
		</div>
	</div>
	<div class="profile-userbuttons">
		<!-- random -->
	</div>
	<div class="profile-usermenu">
		<ul class="nav">
			<li class="active">
				<a href="#"><i class="glyphicon glyphicon-home"></i>Profil </a>
			</li>
			<li>
				<a href="#"><i class="glyphicon glyphicon-user"></i>Nastavení </a>
			</li>
			<li>
				<a href="#" target="_blank"><i class="glyphicon glyphicon-star"></i>Ocenění </a>
			</li>
			<li>
				<a href="#"><i class="glyphicon glyphicon-flag"></i>Nápověda </a>
			</li>
		</ul>
	</div>
</div>
<?php
	} else {
?>
<div class="profile-ad-fb drop-shad">
		<div class="fb-page" data-href="https://www.facebook.com/Nostale-PVP-566188906843541/" data-tabs="timeline" data-small-header="true" data-adapt-container-width="true" data-hide-cover="true" data-show-facepile="true"><blockquote cite="https://www.facebook.com/Nostale-PVP-566188906843541/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/Nostale-PVP-566188906843541/">Nostale PVP</a></blockquote></div>
</div>
<?php
	}
?>