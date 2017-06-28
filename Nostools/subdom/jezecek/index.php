<?php
  session_start();
	include $_SERVER['DOCUMENT_ROOT'] . "/subdom/jezecek/include/header.php";
	include $_SERVER['DOCUMENT_ROOT'] . "/subdom/jezecek/include/menu.php"; 

	
?>
<body style="background-color:#A9A9A9;">
<div class="container" style="width:65%;">
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
    
      <!-- Wrapper for slides -->
      <div class="carousel-inner" style="width:100%;">
      
        <div class="item active">
          <img src="http://jezecek.nostools.cz/images/poison.png" style="width:100%;">
           <div class="carousel-caption">
            <h4><a href="#">Create your own playlists</a></h4>
            <p>Our site allows you to create your own playlists. You can also rate others playlists.</p>  
          </div>
        </div><!-- End Item -->
 
         <div class="item">
          <img src="http://jezecek.nostools.cz/images/carousel_cover.png" style="width:100%;">
           <div class="carousel-caption">
            <h4><a href="#">Rate artists, songs and albums</a></h4>
            <p>You can rate artists, songs and albums. Support your favorites by rating, so they can appear in our "Playlist of the month"</p> 
          </div>
        </div><!-- End Item -->
        
        <div class="item">
          <img src="http://jezecek.nostools.cz/images/carousel2.png" style="width:100%;">
           <div class="carousel-caption">
            <h4><a href="#">Listen to your favourite music</a></h4>
            <p>You can listen your favourite songs in your site, just search in our database! </p> 
          </div>
        </div><!-- End Item -->
        
        <div class="item">
          <img src="http://jezecek.nostools.cz/images/carousel3b.png" style="width:100%;">
           <div class="carousel-caption">
            <h4><a href="#">Check news from the world of metal</a></h4>
            <p>Check daily news from the world all around the world!</p>
          </div>
        </div><!-- End Item -->
                
      </div><!-- End Carousel Inner -->
	  
	
	<!-- Controls -->
      <div class="carousel-controls">
          <a class="left carousel-control" href="#myCarousel" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left"></span>
          </a>
          <a class="right carousel-control" href="#myCarousel" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right"></span>
          </a>
      </div>
	  
    </div>
	<!-- End Carousel -->
	
	<!-- news, top charted -->
	<?php include $_SERVER['DOCUMENT_ROOT'] . "/subdom/jezecek/include/sidebar.php"; ?>
	
</div>
	<!--- footer -->
	

