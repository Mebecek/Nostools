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
			?>
				<div class="market">
					<h4 class="nopadmar">Vyhledávání</h4>
					<hr>
					<input class="form-control textinsearch" placeholder="Vyhledat příspěvek..." type="text">
					<div class="select-style">
					  <select>
						<option value="none" selected>Seřadit podle</option>
						<option value="new">Nejnovější</option>
						<option value="old">Nejstarší</option>
					  </select>
					</div>
					<input class="btn btn-danger btn-lg btn-block login-button" value="Vyhledat" type="submit">
				</div>
			</div>
			
			<div class="col-md-9">
				<div class="defdiv">
				<?php
					$basic->checkErrors();
				?>
				</div>
				<?php
					$offer->showNewOffer();
				?>
				<div class="bg-testimonial drop-shad">
					<div class="portlet-title">
						<div class="caption caption-red">
							<i class="glyphicon glyphicon-pencil"></i>
							<span class="caption-subject text-uppercase"> Nejnovější nabídky</span>
						</div>
						<div class="actions">
							<a href="javascript:;" class="btn btn-red btn-circle">
								<i class="glyphicon glyphicon-trash"></i>
							</a>
						</div>
					</div>
					<?php
						include $_SERVER['DOCUMENT_ROOT'] . "/include/post/showallposts.php";
					?>
					<center>
						<?php $pagination->getPagi(); ?>
					</center>
				</div>
			</div>
		</div>
	</div>
</div>
<script src="http://nostools.cz/js/fileinput.js"></script>
<script src="http://nostools.cz/js/online.js"></script>
<script> 

	$(document).ready(function()
	{	
		$("#regbut").click(function()
		{
			$("#show").show();
			$("#showarticle").hide();
		});
		
		$("#hide").click(function()
		{
			$("#show").hide();
			$("#showarticle").show();
		});
		
		$(".showimg").click(function(){
			$(this).parents(".images-gallery").find("div.images-con").show()
			$(this).parents(".images-gallery").find(".hideimg").show()
			$(this).parents(".images-gallery").find(".showimg").hide()
		});
		
		$(".hideimg").click(function(){
			$(this).parents(".images-gallery").find("div.images-con").hide()
			$(this).parents(".images-gallery").find(".showimg").show()
			$(this).parents(".images-gallery").find(".hideimg").hide()
		});
	});
	
</script>
<?php
	include $_SERVER['DOCUMENT_ROOT'] . "/include/footer.php";
?>