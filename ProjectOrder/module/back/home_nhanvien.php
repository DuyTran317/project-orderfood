<script src="lib/pusher.min.js"></script>
  <script type="text/javascript">
    Pusher.logToConsole = true;
    var pusher = new Pusher('161363aaa8197830a033', {
      cluster: 'ap1',
      encrypted: true
    });
    var channel = pusher.subscribe('Reload');
     //chanel trùng voi chanel trong send.php
    channel.bind('notices', function () {
		
        //code xử lý khi có dữ liệu từ pushe
		 window.location.reload();
         //kết thúc code xử lý thông báo
    });
	Pusher.logToConsole = true;
    var pusher = new Pusher('aaee585e94d28c3959f4', {
      cluster: 'ap1',
      encrypted: true
    });
    var channel = pusher.subscribe('Reload');
    // chanel trùng voi chanel trong send.php
    channel.bind('loadmenu_nhanvien', function () {
		
        //code xử lý khi có dữ liệu từ pusher
		 window.location.reload();
        // kết thúc code xử lý thông báo
    });
	Pusher.logToConsole = true;
    var pusher = new Pusher('51e37eb7c055b1a5ea68', {
      cluster: 'ap1',
      encrypted: true
    });
    var channel = pusher.subscribe('Reload');
    // chanel trùng voi chanel trong send.php
    channel.bind('login', function () {
		
        //code xử lý khi có dữ liệu từ pusher
		 window.location.reload();
        // kết thúc code xử lý thông báo
    });
	 Pusher.logToConsole = true;
    var pusher = new Pusher('770fa0ac91f2e68d3ae7', {
      cluster: 'ap1',
      encrypted: true
    });
    var channel = pusher.subscribe('Reload');
    // chanel trùng voi chanel trong send.php
    channel.bind('newbill', function () {
		
        //code xử lý khi có dữ liệu từ pusher
		 window.location.reload();
        // kết thúc code xử lý thông báo
    });
	Pusher.logToConsole = true;
    var pusher = new Pusher('05d67b2777b04b8a83db', {
      cluster: 'ap1',
      encrypted: true
    });
    var channel = pusher.subscribe('Reload');
    // chanel trùng voi chanel trong send.php
    channel.bind('loadmenu2', function (data) {

        //code xử lý khi có dữ liệu từ pusher
		
		window.location.reload();
		
        // kết thúc code xử lý thông báo
    });
</script>

<html>

<body style="background-image:-webkit-linear-gradient(90deg, #45b649 0%, #dce35b 100%);  font-family: 'Anton', sans-serif;" data-spy="scroll" data-offset="50">
<div class="container" style="margin-top: 5%; background-color: white; border-radius: 20px; padding: 20px;">

    <!--Chuyển Bàn -->
    <a href="?mod=temp" class="btn btn-success" style="font-size:18px; color: #FFF; float:right; padding:10px 5px 10px 5px"><i class="fas fa-exchange-alt"></i> Quản Lý Bàn</a>
    <div style="clear:right"></div>
    <hr>
    
    <h1 align="center" style="color:#033">Danh Sách Bàn</h1>
    <?php 
	$sql2 = "SELECT * FROM `of_bill` as a, `of_user` as b WHERE a.`num_table` = b.`name` and a.`active`=0 and b.`active`=1";
	$qr2 = mysqli_query($link,$sql2);
	$flag=0;
	while($ten_an_quyt=mysqli_fetch_assoc($qr2))
	{
		$sql = "select * from `of_solve_pay` where `num_table` = {$ten_an_quyt['num_table']} and `active` =0";
		$tt = mysqli_query($link,$sql);
		$sl_an_quyt = mysqli_num_rows($tt);
		
		if($sl_an_quyt>0)
		{
		}
		else
		{
			if($flag==0)
				{
	   			 ?>
				 <h3 align="center" style="color:#F00; background-color:#FCF; padding:25px 0 25px 0; font-family:Tahoma, Geneva, sans-serif">*** Bàn Chưa Thanh Toán Mà Đã Đăng Xuất ***<br>
       			 <a href="#ban<?=$ten_an_quyt['num_table'] ?>" class="btn btn-md btn-danger" style="margin-top:20px">Bàn <?=$ten_an_quyt['num_table'] ?></a>   
        		 <?php 
				 $flag=1;
				}
			else   
				{
				?>
				        <a href="#ban<?=$ten_an_quyt['num_table'] ?>" class="btn btn-md btn-danger" style="margin-top:20px">Bàn <?=$ten_an_quyt['num_table'] ?></a>   

				<?php	
				}
		}
    }
	?>
    </h3>
    <div class="row">
    <?php 
	//show bàn ra
	/*
		$sql1="SELECT * FROM `of_user` ORDER BY (CASE `active` WHEN '2' THEN 1 END) DESC , `name` ASC";
	*/

	$sql1="SELECT *, a.`active` as a_user FROM `of_user` as a left JOIN `of_order` as b ON a.`name` = b.`num_table` order by a.`active` desc, b.`active` asc, a.`name` asc"; 
	$c=mysqli_query($link,$sql1);
	
	while($slban=mysqli_fetch_assoc($c)):
	$name=$slban['name']; 
	$id_ban = $slban['id'];
	
	?>
    
        <div class="col-md-3 col-sm-4 col-xs-6 " style="padding: 10px; font-size: 25px" align="center" id="ban<?=$name?>">
        
        <?php
				//lấy id_order và name bàn
				$sql="SELECT *,`of_order`.`id` as id_or, `of_order`.`num_table` as name_ban FROM `of_order` LEFT JOIN `of_bill` ON `of_order`.`id` = `of_bill`.`order_id` where (`of_order`.`active` <> 1 or `of_bill`.`active` <> 1) and `of_order`.`num_table` = '{$name}'";
				$qr=mysqli_query($link,$sql);
				
				$kq=mysqli_fetch_assoc($qr);
				$id_order= $kq['id_or'];
				
				//lấy số món
				$sql="select  * 
				from `of_order` as a, `of_order_detail` as b
				where a.`id`=b.`order_id` and `num_table`='{$name}' and b.`active`=0  ";
				$rs=mysqli_query($link,$sql);
				$somon=mysqli_num_rows($rs);
			
				if(mysqli_num_rows($qr)>0) 
				{
					   ?> 

						 <div class="col-xs-12" style='background-color: #FF0; height: 250px; padding: 40px 0px;'>
                             <a href="?mod=confirm_order&id=<?= $id_order ?>&num_table=<?= $name ?>" style="text-decoration:none; color:#000">
                             <div style="font-size: 40px; color:#06F" ><?= $slban['name']?></div>
							 <p >Số món đã đặt: <span style="color:#F00"><?= $somon ?></span></p>
                             </a>
                           <div class="row" style="position: absolute; bottom: 0px; left: 0px; right: 0px;">
                                 <div class="col-md-12" >
                                     <!--Kiểm Tra Hóa Đơn -->
                                     <?php
                                     @$sql = "select * from `of_order` where `num_table` = {$name} and `id` ={$kq['id_or']} and `active` !=0";
                                     @$kt = mysqli_query($link,$sql);
                                     if(@mysqli_num_rows($kt) > 0) {
                                         ?>
                                         <a style="color: black; text-decoration: none;" href="?mod=list_order_nv&id=<?=$kq['id_or']?>&id_ban=<?=$id_ban?>&name_ban=<?=$name?>"><button class="col-xs-12 btn btn-lg" style=" border-radius: 0px; font-size: 15px; text-align: center; background-color:#f4af41; ">Kiểm Tra</button>
                                         </a>
                                     <?php } ?>
                                 </div>
                                 <div class="col-md-12">
                                     <!--Nút Thanh toán-->
                                     <?php
                                     $sql = "select `id` from `of_order` where `id` = {$kq['id_or']} and `active`=1";
                                     $show = mysqli_query($link,$sql);

                                     if(mysqli_num_rows($show) > 0)
                                     {
                                         ?>
                                         <a href="?mod=solve_payment_nhanvien&id=<?=$id_ban?>&name=<?=$kq['name_ban']?>&order_id=<?=$kq['id_or']?>" onClick="return confirm('Chắc chắn thanh toán?')"  style=" color:black;"><button class="btn btn-lg col-xs-12" style="background-color:#f2a11f; border-radius: 0px; font-size: 15px;text-align:center">Thanh Toán</button></a>
                                         <h5 style="color:white; position:absolute; top:-190; left:22; background-color:red; width:50px ;height:50px; padding-top:10px; border-radius:50%; font-size:30px;"><i class="fas fa-check"></i></h5>
                                     <?php 
									 } 
									 ?>
                                 </div>
                             </div>
				<?php  
				}
				else
				{
				?>
							<div class="" style='background-color: #999; height: 250px; padding: 40px 0px;'>
                            <?php if($slban['a_user'] == 2) {?>
                                <div style="position:absolute; top:10; right:10; font-size:18px"><a href="?mod=logout_user_nv&id=<?=$id_ban?>" class="btn btn-danger">x</a></div>
                                <div style="clear:right"></div>
                            <?php }?>
							<div style="font-size: 40px;" ><?= $slban['name']?></div>

				<?php }?>
						</div>
					</div>
                  
        <?php endwhile ?>
    </div>

</div>
</body>
</html>