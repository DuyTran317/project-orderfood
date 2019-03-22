<script>
	$( function() {
	$( "#datepicker" ).datepicker({
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
		$date_pick = takePost('date_pick');
		
		//Chuyen format $date_pick tu dd/mm/yyyy -> yyyy-mm-dd
		$d= substr($date_pick,0,2);
		$m= substr($date_pick,3,2);
		$y= substr($date_pick,6,4);
		
		$date_pickfrom="{$y}-{$m}-{$d} 00:00:00";
		$date_pickto="{$y}-{$m}-{$d} 23:59:59";		
	}
?>
<style>
    table.dataTable{
        border-collapse:collapse;
    }
</style>
<body style="background-image:url(img/front/pexels-photo-1323712.jpeg); background-size: cover; font-family: 'Anton', sans-serif;">
<div class="container">
    <div class="row"  style="background-color: #FFF; margin-top: 5%; border-radius: 15px; padding: 20px;">
        <a href="?mod=home" style="font-size:36px; color: black"><i class="fas fa-arrow-left"></i></a>
        <div style="clear:right"></div>
        <div style="padding-bottom:25px; padding-top:25px" class="col-md-12 col-sm-12 col-xs-12">
            <h2 style=" text-align:center;">Lịch Sử Đặt Món</h2>
        </div>
        <div align="center">
            <form action="" method="post" id='form_date'>
            <input type="text" name="date_pick" id="datepicker" placeholder="Kiếm theo ngày" readonly value="<?php if(isset($date_pick)) echo $date_pick;?>" onchange='changeDate();'>
            </form>
        </div>
        
        <table class="col-md-12 col-sm-12 col-xs-12 table-bordered" id="datatable" style=" margin-top:15px; overflow-x: scroll">
            <thead>
            <tr style="font-size:20px">
                <td align="center">Số Bàn</td>
                <td>Đặt Món Lúc</td>
                <td align="center">Trạng Thái</td>
                <td align="center"></td>
            </tr>
            </thead>
            <tbody>
            	<?php
					if(isset($_POST['date_pick']))
					{
					$sql = selectDate($date_pickfrom, $date_pickto);
					}
					if(!isset($_POST['date_pick']))
					{
					$sql = selectDate($datefrom, $dateto);
					}
					$rs = mysqli_query($link,$sql);
					while($r=mysqli_fetch_assoc($rs)){
				?>
                <tr>
                    <td align="center" style="color:#906">
                       Bàn <?=$r['num_table']?>
                    </td>
                    <td>&nbsp;
                        <span style=" font-size: 18px;"><?=date('d/m/y - H:i',strtotime($r['date']))?></span>
                    </td>
                    <td align="center">
                        <?php
							if($r['active']==2)echo "<div style='color: #fcef37'>Đang Chờ</div>";
							if($r['active']==1)echo "<div style='color: #5ab738'>Đã Hoàn Thành</div>";
						?>
                    </td>
                    <td align="center">
                        <a data-toggle="modal" data-target="#<?=$r['id']?>" ><span style="cursor: pointer">Chi Tiết</span> </a>
                        
                        <!-- Modal -->
                        <div class="modal fade" id="<?=$r['id']?>" role="dialog">
                            <div class="modal-dialog" style="width: 24%">
                                
                                <?php
                                    $k = selectIdWithCondition($link, 'num_table', $r['id']);
                                ?>
                                
                                <!-- Modal content-->
                                <div class="modal-content" style="border-radius: 5px;">
                                    <div class="modal-header" style="background-color: #5ab738; color: white" >
                                        <h3 class="modal-title" >Bàn <?=$k['num_table']?></h3>
                                    </div>
                                    <div class="modal-body">
                                        <table class="table no-border">
                                            <?php                                        
												$select = selectOrderHistory($link, $r['id']);
												foreach($select as $lap){
                                            ?>
                                            <tr style="border-bottom: dashed grey thin;">
                                                <td><?=$lap['sl']?> x <?=$lap['ten']?></td>
                                            </tr>  
                                            <?php } ?>                      
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
            </tbody>
        </table>
    </div>
 
</div>
</body>
<script>
    function changeDate(){
        document.getElementById('form_date').submit();
    }
    $(document).ready(function() {
        $('#datatable').DataTable( {
            "language": {
                url: 'lib/datatable/Vietnamese.json'
            },
            "ordering": false
        } );
    } );
</script>