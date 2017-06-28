<?php
	include $_SERVER['DOCUMENT_ROOT'] . "/subdom/jezecek/include/header.php";
	include $_SERVER['DOCUMENT_ROOT'] . "/subdom/jezecek/include/menu.php";
	include $_SERVER['DOCUMENT_ROOT'] . "/subdom/jezecek/mp3file.class.php";
	include $_SERVER['DOCUMENT_ROOT'] . "/subdom/jezecek/functions.php";
	get_duration();
	
?>
<script>
var _player = document.getElementById("player"),
    _playlist = document.getElementById("player2");

// functions
function playlistItemClick(clickedElement) {
    var selected = _playlist.querySelector(".selected");
    if (selected) {
        selected.classList.remove("selected");
    }
    clickedElement.classList.add("selected");

    _player.src = clickedElement.getAttribute("source");
    _player.play();
}

function playNext() {
    var selected = _playlist.querySelector("audio");
    if (selected && selected.nextSibling) {
        playlistItemClick(selected.nextSibling);
    }
}

// event listeners
_stop.addEventListener("click", function () {
    _player.pause();
});
_player.addEventListener("ended", playNext);
_playlist.addEventListener("click", function (e) {
    if (e.target && e.target.nodeName === "LI") {
        playlistItemClick(e.target);
    }
});
</script>
<body style="background-color:#A9A9A9">
	<div class="container" style="width:60%;">
		<div class="row main">
			<div class="panel-heading">
	            <div class="panel-title text-center">
	               <h1 class="title">Listen</h1>
	               <hr />
				<ul id="playlist"><li data-ogg="http://www.lunerouge.org/sons/sf/LRWeird%201%20by%20Lionel%20Allorge.ogg">Space 1</li><li data-ogg="http://www.lunerouge.org/sons/sf/LRWeird%202%20by%20Lionel%20Allorge.ogg">Space 2</li><li data-ogg="http://www.lunerouge.org/sons/sf/LRWeird%203%20by%20Lionel%20Allorge.ogg">Space Lab</li></ul>
					
				<audio controls id="player2">
				<source src="http://jezecek.nostools.cz/music/cc.mp3" type="audio/mpeg">
				Your browser does not support the audio element.
				</audio>
	             </div>
	        </div>
		</div>
	</div>