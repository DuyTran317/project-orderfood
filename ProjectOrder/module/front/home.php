<?php 
//khoanh vùng tọa độ
$temp= 1000.0001;
$lat_res= 10.8642437 + $temp ;
$long_res= 106.6232474 + $temp;
$lat2_res= 10.8642437 - $temp ;
$long2_res= 106.6232474 - $temp;
//ràng buộc phải ở trong nhà hàng
if(isset($_SESSION['latitude']))
{
	$lat=$_SESSION['latitude'];
	if(isset($_SESSION['longitude']))
	{
		$long=$_SESSION['longitude'];
	  if($lat2_res>$lat||$lat>$lat_res ||$long2_res>$long||$long>$long_res)
	  { 
	  	echo "<script> alert('Bạn Cần Ở Trong Nhà Hàng Để sử dụng' ); window.location='?mod=dangnhap' </script>";
	  }
	}
	else echo "<script> alert('Bạn Cần Cho Phép Truy Cập Vị Trí Để sử dụng' ); window.location='?mod=dangnhap' </script>";
}
else echo "<script> alert('Bạn Cần Cho Phép Truy Cập Vị Trí Để sử dụng' ); window.location='?mod=dangnhap' </script>";
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

<?php if(isset($_GET['tim'])){?>
	<script>
		alert("Xin lỗi không có món ăn này trong menu nhà hàng!!!!");
		</script>
        <?php } ?>
<script type="text/javascript">

		$(document).ready(function()
		{
			$('#find').autocomplete(
			{
				source: "search.php",
			});
		});
		
	</script>



<body style="background-color: #fff289; font-family: 'Anton', sans-serif; background-image:url(img/front/background1.png);  background-size:cover;">

<div class="container" style="margin-top:25%;">
    <div class="row">
        <div class=" col-sm-6 " style="margin-bottom: 20px;">
                <div id="myCarousel" class="carousel slide" data-ride="carousel" style="height: 350px;">
                    <!-- Indicators -->
                    <ol class="carousel-indicators">
                        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                        <li data-target="#myCarousel" data-slide-to="1"></li>
                        <li data-target="#myCarousel" data-slide-to="2"></li>
                    </ol>

                    <!-- Wrapper for slides -->
                    <div class="carousel-inner">
                        <div class="item active">
                            <img src="img/front/20180807_085811r.jpg"  style="width:100%; height: 350px;">
                        </div>

                        <div class="item">
                            <img src="img/front/20180807_085811r.jpg" style="width:100%;height: 350px; ">
                        </div>

                        <div class="item">
                            <img src="img/front/20180807_085811r.jpg" style="width:100%; height: 350px;">
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
        <div class="col-sm-6" style="  color: white;">
            <div style="background-image:url(img/front/pexels-photo-1020317.jpeg); height: 350px; padding: 30px;">
                <p  style="font-size: 40px; font-weight: bolder"><i class="fas fa-search"></i> <?= _SEARCH ?></p>
               <form  method="post" action="?mod=xulytimkiem">
                <div class="input-group">
                    <input type="text" class="form-control input-lg " placeholder="<?= _FIND ?>" id="find" name="find" style="font-style:normal">
                    <span class="input-group-addon btn"  style="background: #c6c6c6; color: white">
                      <button class="btn btn-xs find" type="submit" style="background-color: transparent;" disabled>
                      <?= _SEARCH ?>
                      </button>
                    </span>
                </div><hr><br><br>
            
                <p style="font-size: 60px;" align="center"><?= _CATE ?></p>
            </div>
            </form>
        </div>
    </div>
   
    <div class="row">
    <?php
		$sql="select * from `of_category` where `active`=1";
		$rs=mysqli_query($link,$sql);
		while($r=mysqli_fetch_assoc($rs)):
	?>
    	<a href="?mod=menu&id=<?=$id?>&name=<?=$name?>&cate=<?=$r['id']?><?php if(isset($_GET['thanhtoan'])){echo "&thanhtoan=1";}?>">
        <div class=" col-md-4" style="margin-bottom: 20px;">
            <div style="height: 300px; background-image:url(img/cate/<?=$r['img_url']?>); background-size: cover; padding: 30px; color: white">

                <p style="font-size: 60px;"><?=$r[$_SESSION['lang'].'_name']?></p>
                <button class="btn " style="background: orange; border-radius: 10px;font-family: 'Open Sans Condensed', sans-serif; font-size: 15px; font-weight: bold"><?=_DETAIL?></button>
            </div>
        </div>        
    	</a>
    <?php endwhile ?>    
        
    </div>

    </div>


</body>
</html>