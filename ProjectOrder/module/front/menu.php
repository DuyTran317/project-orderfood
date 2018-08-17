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
<body style="background:url(img/front/appetizer-breakfast-cuisine-326278.jpg);  background-position:center; background-size:cover  ;">
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
                    icon: 'http://icons.iconarchive.com/icons/iconsmind/outline/128/Like-2-icon.png', // Hình ảnh
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
             <a style="color:#FFF; text-decoration: none; font-size: 50px" href="?mod=home&id=<?=$id?>&name=<?=$name?><?php if(isset($_GET['thanhtoan'])){echo "&thanhtoan='yes'";}?>"><i class="fas fa-arrow-left"></i></a>
        </td>
        <td align="right">
            <span style="background-color: yellow; padding: 5px"> Bàn <?=$name;?></span>
        </td>
    </tr>
</table>
</p>
<div class="container-fluid">
	<div class="row" style="padding:1% 0; font-family: 'Exo 2', sans-serif;">
    	<p style=" color:#FFF; text-align:center; font-size:40px;"><span style="background-color:#CF0; padding:5px;">YOU CHOSE</span> <span style="background-color:#F90; padding:5px;">WE SERVE</span> <span style="background-color:#F60; padding:5px;">YOU'LL LOVE IT</span></p><br />
        <center><i class="fas fa-utensils fa-border" style="font-size:58px; color:#FFF"></i></center>
    </div>

	<div class="row" style=" padding: 30px;  font-family: 'Pacifico', cursive;">
        <div class="col-xs-12">
            <h1 style="color:#FFF; text-align:center">Thực Đơn <?php if(isset($_SESSION['cart'])) {?>
                   <a href="?mod=cart&id_ban=<?=$id?>&name_ban=<?=$name?>&cate=<?=$cate?>"><i class="far fa-list-alt" style="color:yellow; font-size:36px;"></i></a>
                <?php } ?> </h1>
            <div style="text-align: right; color: white; font-size: 18px;">Vuốt ngang để xem thêm <i class="fas fa-angle-double-right"></i></div>
            <hr>
            <div class="scrolling-wrapper">
            <?php 
			$commsql="select * from `of_food` where `category_id`={$cate} and `active`=1";
			$res= mysqli_query($link,$commsql);
			while($kq= mysqli_fetch_assoc($res))
			{	
			?>
      			
            	<a href="?mod=detail&id=<?=$kq['id']?>&id_ban=<?=$id?>&name_ban=<?=$name?>&cate=<?=$cate?>" style="color:#000; text-decoration:none">
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
					if(isset($_GET['thanhtoan']))
					{
				?>
                <p align="right" style="margin-top:10px;">
                <?php
				$sql="select `id` 
					from `of_order` as a, `of_order_detail` as b
					where a.`id`=b.`order_id` and `num_table`={$name}				
					group by `id`
					order by `id` desc limit 0,1";
				$rs=mysqli_query($link,$sql);
				$r=mysqli_fetch_assoc($rs);		
	 			?>
                    <?php }
                    $sql="select * from `of_order` where `num_table`={$name} order by `id` desc limit 0,1";
                    $rs_t=mysqli_query($link,$sql);
                    $r_t=mysqli_fetch_assoc($rs_t);

                    if(isset($_GET['thanhtoan']) && $r_t['active']==1)
                    {
                    ?>
                    <a href="?mod=list_order&id=<?=$r['id']?>&id_ban=<?=$id?>&name_ban=<?=$name?>&cate=<?=$cate?>&thanhtoan='yes'" style="color:#F00 ; font-size:20px; color:#000; background-color:#FF0; padding:5px;font-family: 'Pacifico', cursive; ">Kiểm Tra Hóa Đơn</a>
                    <a href="?mod=xulythanhtoan&id=<?=$id?>&name=<?=$name?>" onclick="return confirm('Bạn chắc muốn thanh toán chứ?')"  style="color:#F00 ; font-size:20px; color:#000; background-color:#F60; padding:5px;font-family: 'Pacifico', cursive; ">Thanh Toán</a>
                </p>
				


                
                <?php } ?>
        </div>
    </div>
</div>
</body>

</html>