<script src="../lib/pusher.min.js"></script>
<?php
include("Pusher.php");
//Func send singal to server
	function sendPusher($key, $secret, $app_id, $channel, $event)
	{
		$options = array(
		'cluster' => 'ap1',
		'useTLS' => true,
		'encrypted' => true
		);
		$pusher = new Pusher(
		$key,
		$secret,
		$app_id,
		$options
		);
		$pusher->trigger($channel, $event, @$data);
	}
	function sendPusher2($key, $secret, $app_id, $channel, $event, $num_table)
	{
		
		$options = array(
		'cluster' => 'ap1',
		'useTLS' => true,
		'encrypted' => true
		);
		$pusher = new Pusher(
		$key,
		$secret,
		 $app_id,
		 $options
		);
		$data['name'] = $num_table;
		$pusher->trigger($channel, $event, @$data);
	}
//	aaaaaaa
function getPusher(string $key, string $channel, string $event)
	{ 
?>
  	<script type="text/javascript">
    Pusher.logToConsole = true;
    var pusher = new Pusher('<?= $key ?>', {
      cluster: 'ap1',
	  forceTLS: true,
      encrypted: true
    });
    var channel = pusher.subscribe('<?= $channel ?>');
    channel.bind('<?= $event ?>', function () {
		 window.location.reload();
    });
</script>
	
<?php
}
//	reload trang menu theo ban
function getPusher2($key, $channel, $event, $name)
	{ 
?>
  	<script type="text/javascript">
    Pusher.logToConsole = true;
    var pusher = new Pusher('<?= $key ?>', {
      cluster: 'ap1',
	  forceTLS: true,
      encrypted: true
    });
    var channel = pusher.subscribe('<?= $channel ?>');
    channel.bind('<?= $event ?>', function (data) {
		if(data.name == <?= $name?>){
		window.location.reload();
		}
    });
</script>
	
<?php
	 }
?>
