	<?php 
	if(!isset($_SESSION['user_nameban']))
	{
		header("location:?mod=dangnhap");
	}
	if(isset($_GET['id']))
	{
		$id=$_GET['id'];
	}
	if(isset($_GET['name']))
	{
		$name=$_GET['name'];
	}
	if(isset($_GET['cate']))
	{
		$cate=$_GET['cate'];
	}
	?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
</head>
<body style="background:url(img/front/appetizer-breakfast-cuisine-326278.jpg);  background-position:center; background-size:cover  ; height: 100%;" onload="startTime()">
<p style="text-align:right; ">
<script src="https://js.pusher.com/3.2/pusher.min.js"></script>
<script type="text/javascript">
    Pusher.logToConsole = true;
    var pusher = new Pusher('161363aaa8197830a033', {
      cluster: 'ap1',
      encrypted: true
    });
    var channel = pusher.subscribe('hihi');
    // chanel trùng voi chanel trong send.php
    channel.bind('newbill', function (data) {
		
        //code xử lý khi có dữ liệu từ pusher
		n = new Notification(
                'Món Ăn Của Bạn Đã Được Bếp Xác Nhận!!!!',
                {
                    body: 'Vui Lòng Đợi Phục Vụ Mang Món Ăn Của Bạn Đến!!',
                    icon: 'lib/icon/bell.png', // Hình ảnh
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
<script src="https://js.pusher.com/3.2/pusher.min.js"></script>
<script type="text/javascript">
    Pusher.logToConsole = true;
    var pusher = new Pusher('161363aaa8197830a033', {
      cluster: 'ap1',
      encrypted: true
    });
    var channel = pusher.subscribe('hihi');
    // chanel trùng voi chanel trong send.php
    channel.bind('delfood', function (data) {
		
        //code xử lý khi có dữ liệu từ pusher
		n = new Notification(
                'Yêu Cầu Được Thực Hiện!!!!!',
                {
                    body: data.message ,
                    icon: 'lib/icon/bell.png', // Hình ảnh
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
    <table class="table no-border" style="font-size:36px; color:#000;font-family: 'Pacifico', cursive; ">
    <tr>
        <td>
             <a style="color:#FFF; text-decoration: none; font-size: 50px" href="?mod=home&id=<?=$id?>&name=<?=$name?><?php if(isset($_GET['thanhtoan'])){echo "&thanhtoan=1";}?>"><i class="fas fa-arrow-left"></i></a>
        </td>
        <td >
        </td>
    </tr>
</table>
</p>
<div class="container-fluid">
	<div class="row" style="font-family: 'Exo 2', sans-serif; height: 300px;">
        <div class="col-sm-6 col-md-offset-1">
            <div id="myCarousel" class="carousel slide" data-ride="carousel">
                <!-- Indicators -->
                <ol class="carousel-indicators">
                    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                    <li data-target="#myCarousel" data-slide-to="1"></li>
                    <li data-target="#myCarousel" data-slide-to="2"></li>
                </ol>

                <!-- Wrapper for slides -->
                <div class="carousel-inner">

                    <div class="item active">
                        <img src="img/temp/594d886388044c5b3d185111_template_sale_03.jpg" alt="Los Angeles" style="width:100%; height: 300px;">
                        <div class="carousel-caption">
                            <h3 style="color: black">Khuyến mãi 1</h3>
                        </div>
                    </div>

                    <div class="item">
                        <img src="img/temp/December-Sales-Web-Banner.jpg" alt="Chicago" style="width:100%;  height: 300px;">
                        <div class="carousel-caption">
                            <h3 style="color: black">Khuyến mãi 2</h3>
                        </div>
                    </div>

                    <div class="item">
                        <img src="img/temp/Sale-Custom-Banner.jpg" alt="New York" style="width:100%;  height: 300px;">
                        <div class="carousel-caption">
                            <h3 style="color: black">Khuyến mãi 3</h3>
                        </div>
                    </div>

                </div>

                <!-- Left and right controls -->
                <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" href="#myCarousel" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
        <div class="col-sm-4" style="border: solid white thin; border-radius: 20px; padding: 10px; height: 300px; border-radius: 10px; background-color: rgba(0,0,0,0.8); color: white; font-family: 'Pacifico', cursive;"">
            <p style="font-size: 24px;">Số bàn: <?=$name;?></p>
            <ul style="font-size: 20px; line-height: 35px;">

                <li>Thời gian: <span id="day"></span>/<span id="month" ></span>  <span id="txt"></span></li>
                <li>Tiến độ: </li>
                <li>Số món ăn đã đặt: </li>
            </ul><br><br><br>
        <?php if(isset($_SESSION['cart'])) {?>
            <a href="?mod=cart&id_ban=<?=$id?>&name_ban=<?=$name?>&cate=<?=$cate?><?php if(isset($_GET['thanhtoan'])) echo'&thanhtoan=1'?>" ><button class="btn col-xs-12 btn-lg" style="background-color: yellow; color: black;">Danh Sách Đã Chọn</button> </a>

        <?php } ?>
        </div>
    </div>

	<div class="row" style=" padding: 30px;  font-family: 'Pacifico', cursive;">
        <div class="col-xs-12">
            <h1 style="color:#FFF; text-align:center">Thực Đơn </h1>
            <hr>
            <div class="scrolling-wrapper">
            <?php 
			$commsql="select * from `of_food` where `category_id`={$cate} and `active`=1";
			$res= mysqli_query($link,$commsql);
			while($kq= mysqli_fetch_assoc($res))
			{	
			?>
      			
            	<a href="?mod=detail&id=<?=$kq['id']?>&id_ban=<?=$id?>&name_ban=<?=$name?>&cate=<?=$cate?><?php if(isset($_GET['thanhtoan'])) echo'&thanhtoan=1'?>" style="color:#000; text-decoration:none">
                <div class="card" style="  width: 300px; height: 300px; background:white;">
                    <div class="col-xs-12" style="  height: 150px;  background:url(img/front/1515456591895.jpg);background-position:center; background-size:cover;">
                    	<div style=" padding: 5px; position:absolute; bottom:0px; left:0px; background-color:#FF0; color:#000; font-size:18px; 
                        font-weight:bold"><?=number_format($kq['price']) ?> VND</div>
                    </div>
                    
                    <div class="col-xs-12" style=" height: 150px; " >
                        <h3 id="aubr" align="center" style="color:#900"><b><?= $kq['name'] ?></b></h3>
                        <i id="aubr"><?= $kq['desc'] ?></i>
                    </div>
                </div>
                </a>
                
       		<?php } ?>
            	
	                          
            </div>
            	<?php
					@$sql="select * from `of_order` where `id` = {$_SESSION['order_wait']}";
                    $rs_t=mysqli_query($link,$sql);
                    @$r_t=mysqli_fetch_assoc($rs_t);
					
					if(isset($_GET['thanhtoan']) && $r_t['active']==1)
					{
				?>
                <p align="right" style="margin-top:10px;">
                <?php
				$sql="select a.`id` as id_donhang  
					from `of_order` as a, `of_order_detail` as b
					where a.`id`=b.`order_id` and `num_table`={$name}				
					group by a.`id`
					order by a.`id` desc limit 0,1";
				$rs=mysqli_query($link,$sql);

				$r=mysqli_fetch_assoc($rs);

                    if(isset($_GET['thanhtoan']) && $r_t['active']==1)
                    {
                    ?>
                    <a href="?mod=list_order&id=<?=$r['id_donhang']?>&id_ban=<?=$id?>&name_ban=<?=$name?>&cate=<?=$cate?>&thanhtoan=1" style="color:#F00 ; font-size:20px; color:#000; background-color:#FF0; padding:5px;font-family: 'Pacifico', cursive; ">Kiểm Tra Hóa Đơn</a>
                    <a href="?mod=xulythanhtoan&id=<?=$id?>&name=<?=$name?>" onclick="return confirm('Bạn chắc muốn thanh toán chứ?')"  style="color:#F00 ; font-size:20px; color:#000; background-color:#F60; padding:5px;font-family: 'Pacifico', cursive; ">Thanh Toán</a>
                </p>
                <?php }} ?>
        </div>
    </div>
</div>
</body>
<script>
    function startTime() {
        var today = new Date();
        var h = today.getHours();
        var m = today.getMinutes();
        var s = today.getSeconds();
        m = checkTime(m);
        s = checkTime(s);
        document.getElementById('txt').innerHTML = h + ":" + m + ":" + s;
        var t = setTimeout(startTime, 500);
        var month = new Array();
        month[0] = "01";
        month[1] = "02";
        month[2] = "03";
        month[3] = "04";
        month[4] = "05";
        month[5] = "06";
        month[6] = "07";
        month[7] = "08";
        month[8] = "09";
        month[9] = "10";
        month[10] = "11";
        month[11] = "12";

        var d = new Date();
        var day = d.getDate()

        var mon = month[d.getMonth()];
        document.getElementById("day").innerHTML = day;
        document.getElementById("month").innerHTML = mon;

    }
    function checkTime(i) {
        if (i < 10) {i = "0" + i};
        return i;
    }
</script>
</html>