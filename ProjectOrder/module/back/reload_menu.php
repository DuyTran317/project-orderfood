<?php
	require('Pusher.php');
	$options = array(
	'cluster' => 'ap1',
    'encrypted' => true
	);
 	$pusher = new Pusher(
    '161363aaa8197830a033',
    '46f2ba3b258f514f6fc7',
    '577033',
    $options
	);
	$data['name'] = 'Load Menu';
	$data['message'] = 'Cap Nhat ';
	$pusher->trigger('hihi', 'loadmenu', $data);
	//reload chi tiet
	$options = array(
	'cluster' => 'ap1',
    'encrypted' => true
	);
 	$pusher = new Pusher(
    '161363aaa8197830a033',
    '46f2ba3b258f514f6fc7',
    '577033',
    $options
	);
	$data['name'] = 'Load Menu';
	$data['message'] = 'Cap Nhat ';
	$pusher->trigger('hihi', 'loadchitiet', $data);
	
?>
<script>
	window.location="?mod=ds_food";
</script>
