
<script src="lib/notice.js"></script>
<?php
	if(! isset($_SESSION['admin_id']))
	{
		header("location:?mod=dangnhap");	
	}
	
?>
<!--Reload Page-->
<meta http-equiv="refresh" content="number;url=http://localhost/project-orderfood/ProjectOrder/admin.php?mod=home">
<script src="lib/pusher.min.js"></script>
  <script type="text/javascript">
    Pusher.logToConsole = true;
    var pusher = new Pusher('161363aaa8197830a033', {
      cluster: 'ap1',
      encrypted: true
    });
    var channel = pusher.subscribe('Reload');
    // chanel trùng voi chanel trong send.php
    channel.bind('reloadbep', function () {
		
        //code xử lý khi có dữ liệu từ pusher
		 window.location.reload();
        // kết thúc code xử lý thông báo
    });
</script>
<style>
 table.dataTable{
	 border-collapse:collapse;
 }
</style>
<body style="background-image: url(img/back/adult-ancient-artisan-1062269.jpg); background-size: cover; font-family: 'Anton', sans-serif;">
    <div class="container-fluid" >
        <div class="row"  style="background-color: #FFF;padding: 20px;">
        <a href="?mod=ds_food" style="font-size:30px; color:#096; text-decoration:none"> <i class="fas fa-cogs"></i></a>
            <div class="col-md-12 col-sm-12 col-xs-12">
                <!--<p style="text-align:center"><a href="?mod=home"><button class="btn btn-success">Làm Mới</button></a></p>-->
            </div>
            <div class="col-xs-8" >
                <h2 style=" text-align:center">Danh Sách Gọi Món</h2>

                <div class="grid">
                    <div class="gutter-sizer"></div>
                    
                     <?php 
					$sql = "select * from `of_order` where `active`=2";
					$rs=mysqli_query($link,$sql);
					while($r1=mysqli_fetch_assoc($rs))
					{
					$num_table = $r1['num_table'];
					$id = $r1['id'];
			 		?>
                    <div class="grid-item"  >
                        <h3 style="text-align: center">Bàn: <?=$num_table?> </h3>
                        <table class="table">
                            <tr>
                                <th class="col-xs-8">Tên</th>
                                <th>SL</th>
                                <th>Xử Lý</th>
                            </tr>
                            <tr>
                             <?php 
					$sql2="select a.*,b.`vi_name` as ten, a.`food_id` as id_food from `of_order_detail` as a,`of_food` as b where `order_id`={$id} and a.`food_id` = b.`id` and a.`active`=2";
                	$rs1=mysqli_query($link,$sql2);
					$sql1="select a.*,b.`vi_name` as ten, a.`food_id` as id_food from `of_order_detail` as a,`of_food` as b where `order_id`={$id} and a.`food_id` = b.`id`";
                	$rs2=mysqli_query($link,$sql1);
					$total=0;
					while($r=mysqli_fetch_assoc($rs1))
					{
					?>
                                <td><?=$r['ten']?></td>
                                <td><?=$r['qty']?></td>
                                <td><a href="?mod=solve_order_finish&id=<?=$r['id_food']?>&idorder=<?=$id?>&num_table=<?=$num_table?>" class="btn btn-success"><i class="fas fa-check-double"></i></a></td>
                                
                            </tr>
                            <?php
							 $total += $r['price']*$r['qty'];
							 } ?>
                        </table>
                         <?php 
					
				$sql="SELECT `note` FROM `of_note_order` as a , `of_order` as b WHERE  a.`order_id`=b.`id` and b.`num_table`={$num_table} and a.`active`=2";
				$rs2 = mysqli_query($link,$sql);
				$xacnhan = mysqli_num_rows($rs2);
				 
				?>
                        <p>Chú Thích:</p> <?php
					if($xacnhan > 0 )
					{
                    while($r2=mysqli_fetch_assoc($rs2))
                    {
                        echo $r2['note'];
                        echo "<br>";
                    }
					}
					
                    ?>
                        <a href="?mod=solve_order&orderID=<?=$id?>&num_table=<?=$num_table?>&total=<?=$total?>"><button class="col-xs-12 btn btn-success btn-lg">Hoàn Tất</button></a>
                    </div>
                     
                   <?php
				   } 
				   ?>
              </div> 
            </div>
            <div class="col-xs-4" style="border-left: lightgrey solid thin; " >
                <h2 style=" text-align:center">Danh Sách Món Trùng</h2>
                <div class="grid-item2"  style="height: 250px; ">... </div>
                <div class="grid-item2"  style="height: 400px;">...</div>
                <div class="grid-item2"  style="height: 200px;">...</div>
            </div>
            <div class="table-responsive"></div>
            <?php /*?><table class="col-md-12 col-sm-12 col-xs-12 table-bordered" id="datatable" style="text-align:center; margin-top:15px; overflow-x: scroll">
              <thead>
              <tr align="center" bgcolor="#FFFFCC">
                <td><h4><strong>STT</strong></h4></td>
                <td><h4><strong>Số Bàn</strong></h4></td>
                <td><h4><strong>Trạng Thái</strong></h4></td>
                <td><h4><strong>Kiểm Tra</strong></h4></td>
              </tr>
              </thead>
              <?php
                $sql = "SELECT * from `of_order` where `active`=2";
                $rel = mysqli_query($link,$sql);
                $i=1;
                while($re = mysqli_fetch_assoc($rel))
                {
              ?>
              <tr>
                <td align="center"><h5>
                  <?=$i++?>
                </h5></td>
                <td align="center"><h5>&nbsp;&nbsp;
                  Bàn Số: <span style="color: red; font-size: 24px;"><?=$re['num_table']?></span>
                </h5></td>
                <td align="center"><h5>
                  <?php
                    echo"Đang chờ xử lý";
                  ?>
                </h5></td>
                <td align="center"><h5>
                  <a href="?mod=check_order&id=<?=$re['id']?>&num_table=<?=$re['num_table']?>">Xem</a>
                </h5></td>
              </tr>
              <?php } ?>
            </table><?php */?>
        </div>
    </div>
</body>
<?php
$rand = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9', 'a', 'b', 'c', 'd', 'e', 'f');
$color = '#'.$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)];
?>
<style>
    .grid {
        max-width: 100%;
    }

    .grid-item {
        width: 49%;
        border: solid medium lightgrey;
        background-color: #f9f9f9;
        margin-bottom: 10px;
        padding: 10px;
        border-radius: 10px;
        transition: 0.5s;
    }
    .grid-item2 {
        width: 100%;
        border: solid medium lightgrey;
        background-color: #f9f9f9;
        margin-bottom: 10px;
        padding: 10px;
        border-radius: 10px;
        transition: 0.5s;
    }
    .gutter-sizer { width: 1%; }
    .grid-item:hover{
        transform: scale(1.005);
        -webkit-box-shadow: 3px 3px 22px -1px rgba(0,0,0,0.75);
        -moz-box-shadow: 3px 3px 22px -1px rgba(0,0,0,0.75);
        box-shadow: 3px 3px 22px -1px rgba(0,0,0,0.75);
        z-index: 99;
    }
    .grid-item2:hover{
        transform: scale(1.005);
        -webkit-box-shadow: 3px 3px 22px -1px rgba(0,0,0,0.75);
        -moz-box-shadow: 3px 3px 22px -1px rgba(0,0,0,0.75);
        box-shadow: 3px 3px 22px -1px rgba(0,0,0,0.75);
        z-index: 99;
    }

</style>
<script>
    $('.grid').masonry({
        // options
        columnWidth: '.grid-item',
        gutter: '.gutter-sizer',
        itemSelector: '.grid-item',
        percentPosition: true,
    });
</script>

<script>
	$(document).ready(function(){    	
		$('#datatable').DataTable( {
   			 language: {
        		url: 'lib/datatable/Vietnamese.json'
    		}
		});
    });
	
	
    
</script>