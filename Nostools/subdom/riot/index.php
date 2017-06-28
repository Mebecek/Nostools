<form method="post">
	<select name="region">
		<option value="eun1" selected>EUNE</option>
		<option value="euw1">EUW</option>
		<option value="na1">NA</option>
		<option value="kr">KR</option>
	</select>
	<input type="text" name="data" placeholder="Summoner" />
	<input type="submit" name="submit" value="Vyhledat"/><br>
</form>
<a href="http://riot.nostools.cz/nasa.php"><button>ZOBRAZIT VŠECHNY ŽAMPIONY</button></a>
<?php
	$region = "eun1";

	if (isset($_POST['submit']))
	{
		$region = $_POST['region'];
		$name = str_replace(' ','', $_POST['data']);
		
		$key = "RGAPI-8fe0d876-1a0e-44c7-98a8-7c112c3f5e33";
		$ranked = "UNRANKED";
		$lp = "";
		$url = "https://" . $region . ".api.riotgames.com/lol/summoner/v3/summoners/by-name/" . $name . "?api_key=" . $key;
		$icons = "http://ddragon.leagueoflegends.com/cdn/6.24.1/data/en_US/profileicon.json";

		$ch = curl_init($url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);            
		$result = curl_exec($ch);
		
		$object = json_decode($result, TRUE);
		
		$league = "https://" . $region . ".api.riotgames.com/lol/league/v3/leagues/by-summoner/" . $object['id'] . "/?api_key=" . $key;
		
		$avatar = "http://avatar.leagueoflegends.com/" . $region . "/" . $object['name'] . ".png";
		
		echo "<img src='$avatar'>" . "<br>";
		echo $object['name'] . "<br>";
		
		$ch2 = curl_init($league);
		curl_setopt($ch2, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch2, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch2, CURLOPT_SSL_VERIFYHOST, false);            
		$result2 = curl_exec($ch2);
		
		$object2 = json_decode($result2, TRUE);
		
		//var_dump($object2);
		
		foreach ($object2 as $data)
		{
			if ($data['status_code'] != 403)
			{
				$tier = $data['tier'];
				
				foreach ($data['entries'] as $entry) 
				{
					if ($entry['playerOrTeamId'] == $object['id'])
					{
						$rank = $entry['rank'];
						$lp = $entry['leaguePoints'];
						$wins = $entry['wins'];
						$loses = $entry['losses'];
						echo $tier . " " . $rank . "(" . $lp . "LP)" . " " . "Wins: " . $wins . " " . "Losses: " . $loses . "<br>";
						$math = ($wins / ($wins + $loses)) * 100;
						echo "<div style='width: 100px; height: 20px; background-color: gray;'><div style='width: " . $math . "%; height: 20px; background-color: green;'></div></div>";
					}
				}
			}
		}
	}
	
	/*foreach($items as $item)
	{
		$lel = "http://ddragon.leagueoflegends.com/cdn/6.24.1/img/profileicon/" . $item['image']['full'];
		echo "<img style='padding: 5px;' src='$lel'>";
	}*/
?>