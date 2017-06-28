<!DOCTYPE html>
<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script>
	$(document).ready(function() {
		e.
		$("#console").keyup(function(e) {
			if (e.keyCode == 13)
			{
				var console = $("#console").val();
				
				$.ajax({
					type:'POST',
					url:'reg.php',
					data:{console:console},
					success:function()
					{
						alert("y");
					}
					alert("y");
				});
			}
		});
	});
	/*$("#show").append("<img src='data:image/png;base64,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' height='10px'>" + $("#console").val() + "<br/>");*/
</script>
<div style="width: 350px; height: 150px;">
	<div id="show" style="padding: 5px; width: 100%; height: 80%; overflow-y: scroll; border: 1px solid #a09d9d;">
	</div>
	<div style="width: 100%; height: 20%;">
		<input id="console" style="padding: 5px; width: 100%; height: 20px; border-width: 1px; border: 1px solid #a09d9d;" type="text" name="console" />
	</div>
</div>