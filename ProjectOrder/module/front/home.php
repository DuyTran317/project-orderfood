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

<body style="background-color: #fff289; font-family: 'Pacifico', cursive; background-image:url(img/front/1584.jpg); background-position:center; background-size:cover; background-attachment:fixed">

<h1 style="color:#FFF; text-decoration:underline">Bàn <?=$name?></h1>

<div style="text-align:center; font-size:38px; margin-top:80px; color:#900">
	<p>Nhà Hàng 5 Con Dê Xin Hân Hạnh Phục Vụ Quý Khách !</p>
</div>

<div class="container-fluid" style="margin-top:50px">
<div class="row">
    
    <div class="col-md-12 col-sm-12 col-xs-12">
        <?php
            $sql="select * from `of_category` where `active`=1";
            $rs=mysqli_query($link,$sql);
			$dem=0;
            while($r=mysqli_fetch_assoc($rs)):
			$dem++;
        ?>
            <div style="text-align:center; border:1px solid #F60; margin-top:40px" class="col-md-4 col-sm-6 col-xs-12 btn btn-warning">
            	<a href="?mod=menu&id=<?=$id?>&name=<?=$name?>&cate=<?=$r['id']?><?php if(isset($_GET['thanhtoan'])){echo "&thanhtoan=1";}?>" style="font-size:40px ;text-decoration:none;">
    
                   <div class="<?php if($dem%2==0) echo 'noibat2'; else echo 'noibat';?>" style="padding:70px 0 70px 0; background-color:#FF9"><i class="fas fa-utensils"></i> <?=$r['name']?></div>
      
                </a>
            </div>         
            
         <?php endwhile ?>         
    </div>

</div>
</div>

<div style="text-align:center; font-size:38px; margin-top:70px; color:#F00">
	<marquee scrollamount="12">*** Chúc Quý Khách Ngon Miệng ***</marquee>
</div>

</body>
</html>