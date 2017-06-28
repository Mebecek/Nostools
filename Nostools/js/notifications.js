<script type="text/javascript">

/*var articles = 
[
	["Game v1.0","http://game.aquaprague.cz/"],
	["Reffer a friend!","http://game.aquaprague.cz/content/refer-a-friend/"]
];


setTimeout(function()
{ 
	var x = Math.floor((Math.random() * 10) + 1);
	var title = articles[x][0];
	var desc = 'Most popular article.';
	var url = articles[x][1];
	notifyBrowser(title,desc,url);
}, 200000);



document.addEventListener('DOMContentLoaded', function () 
{  
	if (Notification.permission !== "granted")
	{
		Notification.requestPermission();
	}

	document.querySelector("#notificationButton").addEventListener("click", function(e)
	{
		var x = Math.floor((Math.random() * 10) + 1);
		var title = articles[x][0];
		var desc = 'Most popular article.';
		var url = articles[x][1];
		notifyBrowser(title,desc,url);
		e.preventDefault();
	});
});

function notifyBrowser(title,desc,url) 
{
	if (!Notification) 
	{
		console.log('Desktop notifications not available in your browser..'); 
		return;
	}
	
	if (Notification.permission !== "granted")
	{
		Notification.requestPermission();
	} else {
		var notification = new Notification(title, {
		icon:'https://cdn2.iconfinder.com/data/icons/app-icons-2/100/icon_66244-512.png',
		body: desc,
	});

	notification.onclick = function () 
	{
		window.open(url);      
	};

	notification.onclose = function () 
	{
		console.log('Notification closed');
	};

	}
}

	if(window.Notification && Notification.permission !== "denied") 
	{
		Notification.requestPermission(function(status)
		{
			var n = new Notification('Refer a friend!',
			{ 
				body: 'Invite friends to recieve free coins.',
				icon: 'https://cdn2.iconfinder.com/data/icons/app-icons-2/100/icon_66244-512.png'
			}); 
		});
	}*/
</script>