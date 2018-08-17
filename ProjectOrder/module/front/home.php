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

<style>
.responsive {
    max-width: 100%;
	height:auto;
}
</style>
<body style="background-color: #fff289; font-family: 'Pacifico', cursive;">
<img src="img/front/black-pepper-bright-colors-940302.png"  class="responsive" width="100%" />
<div class="container" style="margin-top: -8%; margin-bottom: 5%" >
    <div class="row" >
    <?php
		$sql="select * from `of_category` where `active`=1";
		$rs=mysqli_query($link,$sql);
		while($r=mysqli_fetch_assoc($rs)):
	?>
    <a href="?mod=menu&id=<?=$id?>&name=<?=$name?>&cate=<?=$r['id']?><?php if(isset($_GET['thanhtoan'])){echo "&thanhtoan='yes'";}?>">
        <div class="col-sm-4">
            <div class="col-xs-12" style="background-color:#FFF; ">
                <div class="row">
                    <div class="col-xs-12" style="background-image: url(img/front/<?php 
					if($r['name']=='Đồ Ăn')
					{
						echo "close-up-cooking-cuisine-958545.jpg";
					}
					elseif($r['name']=='Thức Uống')
					{
						echo "blur-close-up-cutlery-370984.jpg";
					}
					else
					{
						echo "appetizer-breakfast-cuisine-326278.jpg";
					}
					?>); height: 200px; background-position: center; background-size: contain;"> </div>
                    <div class="col-xs-12" style=" padding: 20px;">
                        <p align="center" style="font-size: 25px; border-bottom: black; color: grey; font-weight: bold"><?=$r['name']?></p>

                    </div>
                </div>

            </div>
        </div>
     </a>   
     <?php endwhile ?>         
    </div>
</div>
<img src="img/front/Untitled-1.png"  class="responsive" width="100%" />
</body>
</html>