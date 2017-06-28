<?php
	include $_SERVER['DOCUMENT_ROOT'] . "/config.php";
	
	$offer = new Offer();
	
	$submit = "Přidat nový příspěvek";
	$submitname = "addpost";
?>
<div id="showarticle" class="portlet portlet-bordered drop-shad">
	<a id="regbut" style="padding: 10px;" class="btn btn-danger btn-lg btn-block login-button nopadmar">Vytvořit nový příspěvek</a>
</div>
<div id="show" class="portlet portlet-bordered drop-shad">
	<form method="post" enctype="multipart/form-data" action="http://nostools.cz/scripts/offers/makeoffer.php">
		<div class="portlet-title">
			<div class="caption caption-red">
				<i class="glyphicon glyphicon-cog"></i>
				<span class="caption-subject text-uppercase"> Nabídka</span>
			</div>
			<div class="actions">
				<a id="hide" class="btn btn-red btn-circle">
					<i class="glyphicon glyphicon-remove"></i>
				</a>
			</div>
			<ul class="nav nav-tabs">
					<li active>
						<a href="#tab1" data-toggle="tab">Post</a>
					</li>
					<li>
						<a href="#tab2" data-toggle="tab">Příloha</a>
					</li>
				</ul>
		</div>
		<div class="portlet">
			<div class="portlet-body">
				<div class="tab-content">
					<div class="tab-pane active" id="tab1">
						<input type="hidden" name="csrf" value="<?php echo $_SESSION['csrf']; ?>"/>
						<?php
							if(isset($_GET['edit']))
							{
								foreach ($offer->getEditOffer($_GET['edit'])->results() as $edit)
								{
									$title = $edit->title;
									$text = $edit->content;
									$submit = "Upravit příspěvek";
									$submitname = "editpost";
								}
							}
						?>
						<input type="text" class="form-control" name="title" value="<?php echo $title; ?>" placeholder="Nadpis příspěvku..." />
						<textarea name="content" class="form-control" rows="7" id="marketitle" placeholder="Sem napište text příspěvku..."><?php echo $text; ?></textarea>
					</div>
					<div class="tab-pane" id="tab2">
						<h4>Přílohy</h4>
						<input type="file" name="file-1[]" id="file-1" class="inputfile inputfile-1" data-multiple-caption="{count} vybráno" multiple="true" />
						<label for="file-1"><svg xmlns="http://www.w3.org/2000/svg" width="200" height="17" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/></svg> <span>Vyberte soubor&hellip;</span></label>
					</div>
				</div>
			</div>
		</div>
		<div class="add-testimonial">
			<input id="regbut" type="submit" style="padding: 10px;" name="<?php echo $submitname; ?>" value="<?php echo $submit; ?>" class="btn btn-danger btn-lg btn-block login-button nopadmar" />
		</div>
	</form>
</div>