<?php
	$lel = $_GET['champion'];
	$url = "https://eun1.api.riotgames.com/lol/static-data/v3/champions/$lel?locale=en_US&tags=all&api_key=RGAPI-8fe0d876-1a0e-44c7-98a8-7c112c3f5e33";	
	$ch = curl_init($url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);            
	$result = curl_exec($ch);
	$json = json_decode($result, TRUE);
	

		$name = explode(".", $json['image']['full']);
		$img = "http://ddragon.leagueoflegends.com/cdn/img/champion/splash/" . $name[0] . "_0.jpg";
		echo "<div style='position: absolute; z-index: -1000;'><img src='$img' alt='$name[0]'/></div>";

			echo "<div style='background-color: rgba(0, 0, 0, 0.5); padding: 10px; width: 296px; position: absolute; top: 581px; left: 857px;'>";
			foreach ($json['spells'] as $tralala)
			{
				$skill = "http://ddragon.leagueoflegends.com/cdn/6.24.1/img/spell/" . $tralala['image']['full'];
				echo "<img style='padding: 5px;' src='$skill'>";
			}
			echo "</div>";
	