<head>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<style>
		.couponcode:hover .coupontooltip {
			display: block;
		}


		.coupontooltip {
			display: none;
			background: #C8C8C8;
			margin-left: 28px;
			padding: 10px;
			position: absolute;
			z-index: 1000;
			border-radius: 5px;
		}
		
		.couponcode {
			width: 64px;
			min-height: 64px;
		}
		
		h5 {
			padding: 0;
			margin: 0;
		}
	</style>
</head>
<?php

	$key = "RGAPI-8fe0d876-1a0e-44c7-98a8-7c112c3f5e33";
	$url = "https://eun1.api.riotgames.com/lol/static-data/v3/items?itemListData=all&tags=all&api_key=" . $key;
	
	$ch = curl_init($url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);            
	$result = curl_exec($ch);
	$json = json_decode($result, TRUE);

	foreach ($json['data'] as $data)
	{
		if ($data['maps'][11] == true && $data['gold']['base'] != 0 && $data['gold']['purchasable'] == true && !empty($data['tags']))
		{
			$chsrc = "http://ddragon.leagueoflegends.com/cdn/7.12.1/img/item/" . $data['image']['full'];
			$img = "<img style='margin: 5px;' src='$chsrc'>";
			echo "<div class='couponcode'>" . $img . "
					 <span class='coupontooltip'><h5>" . $data['name'] . "</h5><br>Cost: " . $data['gold']['total'] . "<br>" . $data['sanitizedDescription'] . "<br>" . $data['plaintext'] . "</span>
				 </div>";
            

			/*foreach ($data['tags'] as $tags)
			{
				echo "[" . $tags . "] ";
			}
            echo "<br>";*/
		}
	}

?>
<script>
		var tooltip = document.querySelectorAll('.coupontooltip');

		document.addEventListener('mousemove', fn, false);

		function fn(e) {
			for (var i=tooltip.length; i--;) {
				tooltip[i].style.left = e.pageX + 'px';
				tooltip[i].style.top = e.pageY + 'px';
			}
		}
	</script>