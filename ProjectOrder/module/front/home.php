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

<body style="background-color: #fff289; font-family: 'Pacifico', cursive; background-image:url(img/front/blur-close-up-cutlery-370984.jpg); background-position:center; background-size:cover; background-attachment:fixed">

<h1 style="color:#FFC; text-decoration:underline">Bàn <?=$name?></h1>

<div style="text-align:center; font-size:38px; margin-top:80px; color:#FFF">
	<p>Nhà Hàng Năm Con Dê Xin Hân Hạnh Phục Vụ Quý Khách!</p>
</div>

<div class="container-fluid" style="margin-top:60px">
<div class="row">

    <!-- Nút Slide -->
    <h1 style="color:#FFC; text-align:center">Thể Loại</h1>
    <hr>
    <span style="float:left; font-size:42px; color:#FFF; margin-left:20px"><i class="fas fa-angle-double-left"></i></span>    
    <span style="float:right; font-size:42px; color:#FFF; margin-right:20px"><i class="fas fa-angle-double-right"></i></span>  
    
    <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="scrolling-wrapper">
        <?php   
			$sql="select * from `of_category` where `active`=1";
			$rs=mysqli_query($link,$sql);   
			$dem=0;     
            while($r=mysqli_fetch_assoc($rs)):
			$dem++;
        ?>
        	<div class="card">                      
            	<a href="?mod=menu&id=<?=$id?>&name=<?=$name?>&cate=<?=$r['id']?><?php if(isset($_GET['thanhtoan'])){echo "&thanhtoan=1";}?>" style="font-size:46px ;text-decoration:none;">
    
                   <div class="<?php if($dem%2==0) echo 'noibat2'; else echo 'noibat';?>" style="padding:100px 120px 100px 120px;  background:url(img/front/BG.jpg);background-position:center; background-size:cover;"><i class="fas fa-utensils"></i> <?=$r['name']?></div>
      
                </a>       
            </div> 
         <?php endwhile ?>        
    </div>
	</div>
</div>
</div>

<div style="text-align:center; font-size:40px; margin-top:80px; color:#FFC">
	<marquee scrollamount="12">*** Chúc Quý Khách Ngon Miệng ***</marquee>
</div>

</body>
</html>