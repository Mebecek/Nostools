<?php

	$key = "RGAPI-8fe0d876-1a0e-44c7-98a8-7c112c3f5e33";
	$url = "https://eun1.api.riotgames.com/lol/static-data/v3/champions?locale=en_US&tags=all&dataById=false&api_key=RGAPI-8fe0d876-1a0e-44c7-98a8-7c112c3f5e33";
	//$url = "https://na1.api.riotgames.com/lol/static-data/v3/champions?champListData=image&dataById=true&api_key=" . $key;
	
	$ch = curl_init($url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);            
	$result = curl_exec($ch);
	$json = json_decode($result, TRUE);
	
	foreach ($json['data'] as $data)
	{
		$name = explode(".", $data['image']['full']);
		$chsrc = "http://ddragon.leagueoflegends.com/cdn/7.12.1/img/champion/" . $data['image']['full'];
		echo "<a href='champion.php?champion=" . $data['id'] . "'><img style='padding: 23px;' src='$chsrc'></a>";
		foreach ($data['spells'] as $lel)
		{
			$mg = "http://ddragon.leagueoflegends.com/cdn/7.13.1/img/spell/" . $lel['image']['full'];
			echo "<img style='padding: 23px; margin: 30px; border: 1px solid black;' src='$mg'>";
		}
		foreach ($data['skins'] as $skin)
		{			$mg = "http://ddragon.leagueoflegends.com/cdn/img/champion/splash/" . $name[0] . "_" . $skin['num'] . ".jpg";
			echo "<img style='padding: 23px; margin: 30px; border: 1px solid black;height: 300px;' src='$mg'>";
		}
		echo "<br>";
	}

?>