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
	?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
</head>
<body style="background:url(img/front/appetizer-breakfast-cuisine-326278.jpg); background-repeat:no-repeat; background-position:center; background-size:cover ;">
<p style="text-align:right; ">
		<?php if(isset($_SESSION['cart'])) {?>
			<a href="?mod=cart&id_ban=<?=$id?>&name_ban=<?=$name?>"><i class="far fa-list-alt" style="color:#FFF; font-size:42px"></i></a>&nbsp;&nbsp;
        <?php } ?>
    	<span style="color:#F00 ; font-size:36px; color:#000; background-color:#FF0; padding:5px;font-family: 'Pacifico', cursive; ">Bàn <?=$name;?></span>
</p>
<div class="container-fluid">	    

	
    
	<div class="row" style="padding:10px 0; font-family: 'Exo 2', sans-serif;">
    	<p style=" color:#FFF; text-align:center; font-size:40px;"><span style="background-color:#CF0; padding:5px;">YOU CHOSE</span> <span style="background-color:#F90; padding:5px;">WE SERVE</span> <span style="background-color:#F60; padding:5px;">YOU'LL LOVE IT</span></p><br />
        <center><i class="fas fa-utensils fa-border" style="font-size:58px; color:#FFF"></i></center>
    </div>
	<div class="row" style=" padding: 30px;  font-family: 'Pacifico', cursive;">
        <div class="col-xs-12">
            <h1 style="color:#FFF; text-align:center">Thực Đơn</h1>
            <hr>
            <div class="scrolling-wrapper">
            <?php 
			$commsql="select * from `of_food` where `category_id`='1' ";
			$res= mysqli_query($link,$commsql);
			while($kq= mysqli_fetch_assoc($res))
			{	
			?>
      			
            	<a href="?mod=detail&id=<?=$kq['id']?>&id_ban=<?=$id?>&name_ban=<?=$name?>" style="color:#000; text-decoration:none">
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
                    <a href="?mod=list_order&id=<?=$r['id']?>&id_ban=<?=$id?>&name_ban=<?=$name?>" style="color:#F00 ; font-size:20px; color:#000; background-color:#FF0; padding:5px;font-family: 'Pacifico', cursive; ">Kiểm Tra Hóa Đơn</a>
                    <a href="?mod=xulythanhtoan&id=<?=$id?>&name=<?=$name?>" onclick="return confirm('Bạn chắc muốn thanh toán chứ?')"  style="color:#F00 ; font-size:20px; color:#000; background-color:#F60; padding:5px;font-family: 'Pacifico', cursive; ">
                     Thanh Toán
                    </a>
                </p>
				
				<?php } ?>
        </div>
    </div>
</div>
</body>

</html>