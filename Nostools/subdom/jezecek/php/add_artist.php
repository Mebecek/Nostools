<?php
	include $_SERVER['DOCUMENT_ROOT'] . "/subdom/jezecek/include/header.php";
	include $_SERVER['DOCUMENT_ROOT'] . "/subdom/jezecek/include/menu.php";
	include $_SERVER['DOCUMENT_ROOT'] . "/subdom/jezecek/include/add_artist.php";
	
	if (isset($_POST['submit']) AND (!empty($_POST['name'])) AND (!empty($_POST['year'])) AND (!empty($_POST['genre'])) AND (!empty($_POST['info']))) {
		$name = $_POST['name'];
		$year = $_POST['year'];
		$genre = $_POST['genre'];
		$info = $_POST['info'];
		
		$select = $db->prepare("SELECT * FROM artists WHERE name = :name");
		$select->bindParam(':name', $name);
		$select->execute();
		$count = $select->rowCount();
		
		if($count == 0) {
			$sql = $db->prepare("INSERT INTO artists(id,name,year,info,genre) VALUES ('', :name, :year, :info, :genre)");
			$sql->bindParam(':name', $name);
			$sql->bindParam(':year', $year);
			$sql->bindParam(':info', $info);
			$sql->bindParam(':genre', $genre);
			$sql->execute();
			?>
			<div class="echo" style="text-align:center;">
			<?php
				echo "Artist added.";
		}
		else {
			echo "Artist is already in database.";
			echo "<br>";
			echo "<a href='http://jezecek.nostools.cz/admin/add_artist_form.php'>Try again</a>";	
		}
	}
	else {
		echo "Fill all fields.";
		echo "<br>";
		echo "<a href='http://jezecek.nostools.cz/admin/add_artist_form.php'>Try again</a>";	
	}
?>
</div>