<?php
	include $_SERVER['DOCUMENT_ROOT'] . "/config.php";
	
	$offer = new Offer();
	$user = new User();
	$token = new Token();
	$pagination = new Pagination("market", $marketpp);
	
	if ($offer->getOffers()->count() == 0)
	{
		echo "<center><h4 style='margin-top: 30px; margin-bottom: 30px;'>Nebyly nalezeny žádné příspěvky...</h4></center>";
	}
	
	foreach ($pagination->getDataPerPage()->results() as $data)
	{
		foreach ($user->getInfo($data->user_id)->results() as $author)
		{
				
?>
	<form method="post" action="http://nostools.cz/scripts/offers/offeraction.php">
		<input type="hidden" name="offerid" value="<?php echo $data->id; ?>">
		<input type="hidden" name="csrf" value="<?php echo $_SESSION['csrf']; ?>">
		<div id="tb-testimonial" class="testimonial testimonial-default">
			<div class="testimonial-section drop-shad">
				<?php
					if ($offer->is_owner($data->user_id))
					{
				?>			
						<div class='actions'>
							<button onclick="return confirm('Opravdu chcete vymazat příspěvek?');" type='submit' name='deleteoffer' class='btn btn-red btn-circle'>
								<i class='glyphicon glyphicon-trash'></i>
							</button>
							<button type='submit' name='editoffer' class='btn btn-red btn-circle'>
								<i class='glyphicon glyphicon-edit'></i>
							</button>
						</div>
				<?php
					}
					echo htmlspecialchars($data->preview) . "... <a href=''>zobrazit celý článek</a>"; 
				?>
				<?php
				if ($offer->getOffersImages($data->id)->count() != 0)
				{
					foreach ($offer->getOffersImages($data->id)->results() as $images)
					{
						$image = unserialize($images->images);
				?>
				<div class="images-gallery">
					<center>
						<span class="showimg">Zobrazit přílohu</span>
						<span class="hideimg">Skrýt přílohu</span>
					</center>
						<div class="images-con">
						<?php
							for ($x = 0; $x < count($image); $x++)
							{
								echo "<a data-lightbox='" . $data->id . "' href='http://nostools.cz/users/profiles/" . strtolower($author->nickname) . "/posts/images/" . $data->id . "/" . $image[$x] ."'><img height='80px' width='80px' alt='' src='http://nostools.cz/users/profiles/" . strtolower($author->nickname) . "/posts/images/" . $data->id . "/" . $image[$x] ."' /></a>";
							}
							?>
						</div>
				</div>
				<?php
					}
				}
				?>
			</div>
			<div class="testimonial-desc">
				<img src="http://nostools.cz/images/keni.png" alt="" />
				<div class="testimonial-writer">
					<div class="testimonial-writer-name"><?php echo $author->nickname; ?></div>
					<div class="testimonial-writer-designation">
						<span class="label label-danger">
							<?php echo $data->date; ?>
						</span>
					</div>
					<a href="#" class="testimonial-writer-company">Upraveno <?php echo $data->edit; ?></a>
				</div>
			</div>
		</div>
	</form>
<?php
		}
	}
?>