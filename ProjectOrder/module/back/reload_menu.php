<?php
	sendPusher('161363aaa8197830a033', '46f2ba3b258f514f6fc7', '577033', 'Reload', 'loadmenu');	
	sendPusher('161363aaa8197830a033', '46f2ba3b258f514f6fc7', '577033', 'Reload', 'loadchitiet');	
	$cid = takeGet('cid');
?>
<script>
	window.location="?mod=ds_food&cid=<?=$cid?>";
</script>
