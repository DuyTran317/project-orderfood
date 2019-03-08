<?php
require('module/front/Pusher.php');
//Func send singal to server
	function sendPusher($key, $secret, $app_id, $channel, $event)
	{
		
		$options = array(
		'cluster' => 'ap1',
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

	<script src="../lib/pusher.min.js"></script>
  	<script type="text/javascript">
    Pusher.logToConsole = true;
    var pusher = new Pusher('<?= $key ?>', {
      cluster: 'ap1',
      encrypted: true
    });
    var channel = pusher.subscribe('<?= $channel ?>');
    // chanel trùng voi chanel trong send.php
    channel.bind('<?= $event ?>', function () {
		
        //code xử lý khi có dữ liệu từ pusher
		 window.location.reload();
        // kết thúc code xử lý thông báo
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
      encrypted: true
    });
    var channel = pusher.subscribe('<?= $channel ?>');
    // chanel trùng voi chanel trong send.php
    channel.bind('<?= $event ?>', function (data) {

        //code xử lý khi có dữ liệu từ pusher

		if(data.name == <?= $name?>){
		window.location.reload();
		}
        // kết thúc code xử lý thông báo
    });
</script>
	
<?php
	 }
?>
