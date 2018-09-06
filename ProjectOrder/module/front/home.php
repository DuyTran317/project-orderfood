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

<body style="background-color: #fff289; font-family: 'Anton', sans-serif; background-image:url(img/front/background.png);  background-size:cover;">

<div class="container" style="margin-top:25%; height: 600px; overflow-y: scroll; overflow-x: hidden">
    <div class="row">
        <div class=" col-sm-6" style="margin-bottom: 20px;">
            <div style="background-image:url(img/front/20180807_085811r.jpg); height: 400px; padding: 30px;  color: white;" >
                <p style="font-size: 50px;">HAMBURGER BÒ</p>
                <p style="font-family: 'Open Sans Condensed', sans-serif; font-size: 30px;">NGON BỔ RẺ</p>
                <button class="btn col-xs-2" style="background: orange; border-radius: 10px;font-family: 'Open Sans Condensed', sans-serif; font-size: 15px; font-weight: bold">Chi tiết</button>
            </div>
        </div>
        <div class="col-sm-6" style="  color: white;">
            <div style="background-image:url(img/front/pexels-photo-1020317.jpeg); height: 400px; padding: 30px;">
                <p  style="font-size: 40px; font-weight: bolder"><i class="fas fa-search"></i> Tìm Kiếm</p>
                <div class="input-group">
                    <input type="text" class="form-control input-lg" placeholder="Tìm món ăn">
                    <span class="input-group-addon btn"  style="background: #c6c6c6; color: white">
                        Tìm
                    </span>
                </div><hr><br><br>
                <p style="font-size: 60px;" align="center">THỂ LOẠI</p>
            </div>
        </div>
    </div>
    <div class="row">
        <div class=" col-md-4" style="margin-bottom: 20px;">
            <div style="height: 350px; background-image:url(img/front/food-eating-potatoes-beer-8313.jpg); background-size: cover; padding: 30px; color: white">
                <p style="font-size: 60px;">ĐỒ ĂN</p>
                <p style="font-family: 'Open Sans Condensed', sans-serif; font-size: 30px;">Quán chúng tôi luôn phục vụ đồ ăn tươi ngon. Đảm bảo bạn sẽ hài lòng với chất lượng.</p>
                <button class="btn col-xs-3" style="background: orange; border-radius: 10px;font-family: 'Open Sans Condensed', sans-serif; font-size: 15px; font-weight: bold">Chi tiết</button>
            </div>
        </div>
        <div class=" col-md-4" style="margin-bottom: 20px;">
            <div style="height: 350px; background-image:url(img/front/bar-beverage-cocktail-109275.jpg); background-size: cover; padding: 30px; color: white">
                <p style="font-size: 60px;">ĐỒ UỐNG</p>
                        <p style="font-family: 'Open Sans Condensed', sans-serif; font-size: 30px;">Quán chúng tôi luôn phục vụ đồ uống thơm ngon. Đảm bảo bạn sẽ hài lòng với chất lượng.</p>
                <button class="btn col-xs-3" style="background: orange; border-radius: 10px;font-family: 'Open Sans Condensed', sans-serif; font-size: 15px; font-weight: bold">Chi tiết</button>
            </div>
        </div>
        <div class=" col-md-4" style="margin-bottom: 20px;">
            <div style="height: 350px; background-image:url(img/front/pexels-photo-132694.jpeg); background-size: cover; padding: 30px; color: white">
                <p style="font-size: 60px;">MÓN KHÁC</p>
                <button class="btn col-xs-3" style="background: orange; border-radius: 10px;font-family: 'Open Sans Condensed', sans-serif; font-size: 15px; font-weight: bold">Chi tiết</button>
            </div>
        </div>
    </div>
    <div class="row">
        <div class=" col-sm-6" style="margin-bottom: 20px;">
            <div style="background-color: #0b58a2; height: 250px;">Widget 1</div>
        </div>
        <div class="col-sm-6" style="margin-bottom: 20px;">
            <div style="background-color: #0b18a2; height: 250px;">Widget 2</div>
        </div>
    </div>
    <div class="row">


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


</body>
</html>