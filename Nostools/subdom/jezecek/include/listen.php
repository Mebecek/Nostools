<?php
	include $_SERVER['DOCUMENT_ROOT'] . "/subdom/jezecek/include/header.php";
	include $_SERVER['DOCUMENT_ROOT'] . "/subdom/jezecek/include/menu.php";
	include $_SERVER['DOCUMENT_ROOT'] . "/subdom/jezecek/mp3file.class.php";
	
?>
<body style="background-color:#A9A9A9">
	<div class="container" style="width:60%;">
		<div class="row main">
		<div class="panel-heading">
	            <div class="panel-title text-center">
	               <h1 class="title">Listen</h1>
	               <hr />
			<audio id="audio" preload="auto" tabindex="0" controls="" onended="http://jezecek.nostools.cz/js/playlist.js">
  				<source src="http://jezecek.nostools.cz/music/cc.mp3">
 				 Your Fallback goes here
			</audio>
			<ul id="playlist">
        		<li class="active">
            		<a href="http://jezecek.nostools.cz/music/cc.mp3">
               		 cc
            		</a>
       			</li>
       			<li>
            		<a href="http://jezecek.nostools.cz/music/gg.mp3">
                	gg
            		</a>
        		</li>
    			</ul>	
		    </div>
	        </div>
		</div>
	</div>