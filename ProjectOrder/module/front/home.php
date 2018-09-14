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
            <div style="background-image:url(img/front/20180807_085811r.jpg); height: 350px; padding: 30px;  color: white;">
                <p style="font-size: 50px;">HAMBURGER BÒ</p>
                <p style="font-family: 'Open Sans Condensed', sans-serif; font-size: 30px;">NGON BỔ RẺ</p>
                <button class="btn" style="background: orange; border-radius: 10px;font-family: 'Open Sans Condensed', sans-serif; font-size: 15px; font-weight: bold">Chi tiết</button>
            </div>
        </div>
        <div class="col-sm-6" style="  color: white;">
            <div style="background-image:url(img/front/pexels-photo-1020317.jpeg); height: 350px; padding: 30px;">
                <p  style="font-size: 40px; font-weight: bolder"><i class="fas fa-search"></i> Tìm Kiếm</p>
               <form  method="post" action="?mod=xulytimkiem">
                <div class="input-group">
                    <input type="text" class="form-control input-lg" placeholder="Tìm món ăn" id="find" name="find" style="font-style:normal">
                    <span class="input-group-addon btn"  style="background: #c6c6c6; color: white">
                      <button class="btn btn-xs" type="submit" style="background-color: transparent;">
                      Tìm
                      </button>
                    </span>
                </div><hr><br><br>
            
                <p style="font-size: 60px;" align="center">THỂ LOẠI</p>
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
                <p style="font-size: 60px;"><?=$r['name']?></p>
                <button class="btn " style="background: orange; border-radius: 10px;font-family: 'Open Sans Condensed', sans-serif; font-size: 15px; font-weight: bold">Chi tiết</button>
            </div>
        </div>        
    	</a>
    <?php endwhile ?>    
        
    </div>

    </div>


</body>
</html>