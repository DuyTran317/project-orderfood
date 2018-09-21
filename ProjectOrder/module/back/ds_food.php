
<script src="lib/notice.js"></script>
<?php
	if(! isset($_SESSION['admin_id']))
	{
		header("location:?mod=dangnhap");	
	}
	
?>
<!--Reload Page-->
<meta http-equiv="refresh" content="number;url=http://localhost/project-orderfood/ProjectOrder/admin.php?mod=home">
<script src="https://js.pusher.com/4.3/pusher.min.js"></script>
  <script type="text/javascript">
    Pusher.logToConsole = true;
    var pusher = new Pusher('161363aaa8197830a033', {
      cluster: 'ap1',
      encrypted: true
    });
    var channel = pusher.subscribe('hihi');
    // chanel trùng voi chanel trong send.php
    channel.bind('notices', function (data) {
		
        //code xử lý khi có dữ liệu từ pusher
		n = new Notification(
                'Thông Báo!!!!!!',
                {
                    body: data.name + ' ' + data.message,
                    icon: 'lib/icon/cook.png', // Hình ảnh
                    tag: '' // Đường dẫn 
                });
        setTimeout(n.close.bind(n), 10000);
        // tự động đóng thông báo sau 10s
        n.onclick = function () {
            window.location.href = this.tag;
        }
		 window.location.reload();
        // kết thúc code xử lý thông báo
    });
</script>
<style>
 table.dataTable{
	 border-collapse:collapse;
 }
</style>
<body style="background-image: url(img/back/adult-ancient-artisan-1062269.jpg); background-size: cover; font-family: 'Pacifico', cursive;">
    <div class="container">
        <div class="row"  style="background-color: #FFF; margin-top: 5%; border-radius: 20px; padding: 20px;">
        	<a href="?mod=home" class="btn btn-success" style="font-size:20px">Trở Lại</a>
            <div style="padding-bottom:25px; padding-top:25px" class="col-md-12 col-sm-12 col-xs-12">
                <!--<p style="text-align:center"><a href="?mod=home"><button class="btn btn-success">Làm Mới</button></a></p>-->
                <h2 style=" text-align:center">Danh Sách Gọi Món</h2>
            </div>
            <div class="table-responsive"></div>
            <table class="col-md-12 col-sm-12 col-xs-12 table-bordered" id="datatable" style="text-align:center; margin-top:15px; overflow-x: scroll">
              <thead>
              <tr align="center" bgcolor="#FFFFCC">
                <td><h4><strong>STT</strong></h4></td>
                <td><h4><strong>Tên Món</strong></h4></td>
                <td><h4><strong>Trạng Thái</strong></h4></td>
                <td><h4><strong>Kiểm Tra</strong></h4></td>
              </tr>
              </thead>
              <?php
                $sql = "SELECT * from `of_food`";
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
                  <span style="color: red; font-size: 24px;"><?=$re['name']?></span>
                </h5></td>
                <td align="center"><h5>
				  <!--act == 0 ngừng kinh doanh  == 1 đang kinh doanh, còn món  == 2 đang kinh doanh, hết món-->
                    <select id="<?=$re['id'] ?>" name='status' onChange="ChangeStatus(<?=$re['id'] ?>)">
							<option value='0' <?php if($re['active']==0) echo "selected"; ?>>ngừng kinh doanh</option>
							<option value='1' <?php if($re['active']==1) echo "selected"; ?>>còn món</option>
							<option value='2' <?php if($re['active']==2) echo "selected"; ?>>hết món</option>
						</select>
                </h5></td>
                <td align="center"><h5>
                  <a href="">Xem</a>
                </h5></td>
              </tr>
              <?php } ?>
            </table>
           <a href="?mod=reload_menu" style="color:black; "> <button class="col-xs-6 btn btn-lg" style="background-color:#FF0; border-radius: 0px;">Cập Nhật Menu</button></a>
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
	
	function ChangeStatus(id){
		var active = document.getElementById(id).value;
		$.ajax({
			url:'module/back/ajax.php',
			type:'POST',
			data:{id: id, active: active, ChangeActiveFood: 1}
			}).done(function(data){
								
				});
	};
    
</script>