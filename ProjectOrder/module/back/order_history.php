<script>
	$( function() {
	$( "#datepicker" ).datepicker({
	  showOn: "button",
	  buttonImage: "jquery/jquery-ui-1.12.1.custom/images/calendar.gif",
	  buttonImageOnly: true,
	  buttonText: "Select date",
	  
	  //Tùy chỉnh tháng
	  changeMonth:true,
	  monthNamesShort: [ "Tháng 1", "Tháng 2", "Tháng 3", "Tháng 4", "Tháng 5", "Tháng 6", "Tháng 7", "Tháng 8", "Tháng 9", "Tháng 10", "Tháng 11", "Tháng 12" ],
	  
	  //Tùy chỉnh năm
	  changeYear:true,
	  yearRange: "c-100:c",
	  
	  //Date Format
	  dateFormat: "dd-mm-yy",
	  
	});
	
	} );
</script>
<script src="lib/notice.js"></script>

<?php
	if(! isset($_SESSION['admin_id']))
	{
		header("location:?mod=dangnhap");
	}
	
	//Khởi tạo
	$datefrom = date("Y-m-d 00:00:00");
	$dateto = date("Y-m-d 23:59:59");	
	
	if(isset($_POST['date_pick']))
	{
		$date_pick=$_POST['date_pick'];
		
		//Chuyen format $date_pick tu dd/mm/yyyy -> yyyy-mm-dd
		$d= substr($date_pick,0,2);
		$m= substr($date_pick,3,2);
		$y= substr($date_pick,6,4);
		
		$date_pickfrom="{$y}-{$m}-{$d} 00:00:00";
		$date_pickto="{$y}-{$m}-{$d} 23:59:59";		
	}
?>
<!--Reload Page-->
<!--<meta http-equiv="refresh" content="number;url=http://localhost/project-orderfood/ProjectOrder/admin.php?mod=home">
<script src="lib/pusher.min.js"></script>
  <script type="text/javascript">
    Pusher.logToConsole = true;
    var pusher = new Pusher('161363aaa8197830a033', {
      cluster: 'ap1',
      encrypted: true
    });
    var channel = pusher.subscribe('Reload');
    // chanel trùng voi chanel trong send.php
    channel.bind('notices', function () {
		 window.location.reload();
        // kết thúc code xử lý thông báo
    });
</script>-->
<style>
    table.dataTable{
        border-collapse:collapse;
    }
</style>
<body style="background-image:url(img/front/pexels-photo-326333.jpeg); background-size: cover; font-family: 'Anton', sans-serif;">
<div class="container">
    <div class="row"  style="background-color: #FFF; margin-top: 5%; border-radius: 20px; padding: 20px;">
        <a href="?mod=home" style="font-size:36px; color: black"><i class="fas fa-arrow-left"></i></a>
        <div style="clear:right"></div>
        <div style="padding-bottom:25px; padding-top:25px" class="col-md-12 col-sm-12 col-xs-12">
            <!--<p style="text-align:center"><a href="?mod=home"><button class="btn btn-success">Làm Mới</button></a></p>-->
            <h2 style=" text-align:center;">Lịch Sử Đặt Món</h2>
        </div>
        <div class="table-responsive"></div>
        
        <ul>
            	<h4>Tìm theo ngày</h4>
                <form action="" method="post">
                <input type="text" name="date_pick" id="datepicker" readonly
                value="<?php if(isset($date_pick)) echo $date_pick;?>" >
                <button type="submit">Chọn</button>
                </form>	
        </ul>
        
        <table class="col-md-12 col-sm-12 col-xs-12 table-bordered" id="datatable" style=" margin-top:15px; overflow-x: scroll">
            <thead>
            <tr style="font-size:20px">
                <td align="center">Số Bàn</td>
                <td align="center">Giờ Đặt</td>
                <td align="center">Trạng Thái</td>
                <td align="center"></td>
            </tr>
            </thead>
            	<?php
					if(isset($_POST['date_pick']))
					{
					$sql="select * from `of_order` where `date` >='{$date_pickfrom}' and `date` <='{$date_pickto}' order by `date` desc";
					}
					if(!isset($_POST['date_pick']))
					{
					$sql="select * from `of_order` where `date` >='{$datefrom}' and `date` <='{$dateto}' order by `date` desc";	
					}
					$rs = mysqli_query($link,$sql);
					while($r=mysqli_fetch_assoc($rs)){
				?>
                <tr>
                    <td align="center" style="color:#906">
                       Bàn <?=$r['num_table']?>
                    </td>
                    <td align="center">&nbsp;&nbsp;
                        <span style=" font-size: 18px;"><?=date('H:i',strtotime($r['date']))?></span>
                    </td>
                    <td align="center">
                        <?php
							if($r['active']==2)echo "Đang Chờ";
							if($r['active']==1)echo "Đã Hoàn Thành";
						?>
                    </td>
                    <td align="center">
                        <a data-toggle="modal" data-target="#<?=$r['id']?>" >Chi Tiết</a>
                        
                        <!-- Modal -->
                        <div class="modal fade" id="<?=$r['id']?>" role="dialog">
                            <div class="modal-dialog" style="width: 24%">
                                
                                <?php
                                    $sql="select `num_table` from `of_order` where `id`={$r['id']}";	
                                    $kq=mysqli_query($link,$sql);	
                                    $k=mysqli_fetch_assoc($kq);
                                ?>
                                
                                <!-- Modal content-->
                                <div class="modal-content" style="border-radius: 5px;">
                                    <div class="modal-header" style="background-color: #5ab738; color: white" >
                                        <h3 class="modal-title" >Bàn <?=$k['num_table']?></h3>
                                    </div>
                                    <div class="modal-body">
                                        <table class="table no-border">
                                            <?php
                                                $sql="select b.`vi_name` as ten, a.`qty` as sl from `of_order_detail` as a, `of_food` as b where a.`food_id` = b.`id` and `order_id`={$r['id']}";
                                                $lap_kq=mysqli_query($link,$sql);
                                                while($lap = mysqli_fetch_assoc($lap_kq)): 
                                            ?>
                                            <tr style="border-bottom: dashed grey thin;">
                                                <td><?=$lap['sl']?> x <?=$lap['ten']?></td>
                                            </tr>  
                                            <?php endwhile ?>                      
                                        </table>
                                    </div>
                                    <div class="modal-footer" style="border-bottom: solid #5ab738 5px;">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
                                    </div>
                                </div>
                    
                            </div>
                        </div>
                        
                    </td>
                </tr>
                	
   				<?php } ?>
                
		</table>
    </div>
 
</div>
</body>
<script>
    $(document).ready(function(){
        $('#datatable').DataTable( {
            language: {
                url: 'lib/datatable/Vietnamese.json'
            }
        });
    });
</script>