function auto_load()
{
	$.ajax({
	  url: "http://nostools.cz/scripts/online.php",
	  cache: false,
	  success: function(data)
	  {
		 $("#online-users-random").html(data);
	  } 
	});
	
	window.onbeforeunload = function () 
	{ 
		$.post( 
		  "http://nostools.cz/include/scripts/online.php",
		  { closed: "yes" },
		  function(data) 
		  {
		  }
	   );
	}
}

$(document).ready(function(){

auto_load();

});

setInterval(auto_load,5000);