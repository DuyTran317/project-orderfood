
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
    <div class="container" >
        <div class="row"  style="background-color: #FFF; margin-top: 5%; border-radius: 20px; padding: 20px;">
        <a href="?mod=ds_food" style="font-size:30px; color:#096; text-decoration:none"> <i class="fas fa-cogs"></i></a>
            <div style="padding-bottom:25px; padding-top:25px" class="col-md-12 col-sm-12 col-xs-12">
                <!--<p style="text-align:center"><a href="?mod=home"><button class="btn btn-success">Làm Mới</button></a></p>-->
            </div>
            <div class="col-xs-8" >
                <h2 style=" text-align:center">Danh Sách Gọi Món</h2>

                <div class="grid">
                    <div class="gutter-sizer"></div>
                    <div class="grid-item" >
                        <h3 style="text-align: center">Bàn: 1</h3>
                        <table class="table">
                            <tr>
                                <th class="col-xs-8">Tên</th>
                                <th>SL</th>
                                <th>Xử Lý</th>
                            </tr>
                            <tr>
                                <td>Cơm chiên dương châu</td>
                                <td>1</td>
                                <td><a class="btn btn-success"><i class="fas fa-check-double"></i></a></td>
                            </tr>
                        </table>
                        <p>Chú Thích:</p>
                        <button class="btn btn-success col-xs-12">Hoàn Tất</button>
                    </div>
                    <div class="grid-item"  style="height: 250px; ">2 </div>
                    <div class="grid-item"  style="height: 400px;">3</div>
                    <div class="grid-item"  style="height: 200px;">4</div>
                    <div class="grid-item"  style="height: 500px;">5</div>
                    <div class="grid-item"  style="height: 600px;">6</div>
                    <div class="grid-item"  style="height: 100px;">7</div>

                </div>
            </div>
            <div class="col-xs-4" style="border-left: lightgrey solid thin; " >
                <h2 style=" text-align:center">Danh Sách Món Trùng</h2>
                <div class="grid-item2"  style="height: 250px; ">... </div>
                <div class="grid-item2"  style="height: 400px;">...</div>
                <div class="grid-item2"  style="height: 200px;">...</div>
            </div>
            <div class="table-responsive"></div>
            <table class="col-md-12 col-sm-12 col-xs-12 table-bordered" id="datatable" style="text-align:center; margin-top:15px; overflow-x: scroll">
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
            </table>
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