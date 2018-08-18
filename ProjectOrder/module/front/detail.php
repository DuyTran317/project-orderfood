<?php 
	if(isset($_GET['id']))
	{
		$id = $_GET['id'];
	}
	if(isset($_GET['id_ban']))
	{
		$id_ban=$_GET['id_ban'];
	}
	if(isset($_GET['name_ban']))
	{
		$name_ban=$_GET['name_ban'];
	}
	if(isset($_GET['cate']))
	{
		$cate=$_GET['cate'];
	}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<?php 
$sql="select * from `of_food` where `id`={$id}";
$res = mysqli_query($link,$sql);
$kq = mysqli_fetch_assoc($res);
?>
<body style="background:url(img/front/20180807_085811.jpg); background-repeat:no-repeat; background-position:center; background-size:cover ;">
<div class="container" style="margin-top:50px;">
    <div class="row" > 
        <div class="col-sm-6">
               <div class="flexslider"><!--pictures must have the same resolution for the best result. 16:9 is recommended-->
              <ul class="slides"><!--Should contain only 4 thumbnails for better result-->
                <li data-thumb="img/front/1515456591895.jpg">
                    <img src="img/front/1515456591895.jpg"/>
                </li>
                <li data-thumb="img/front/pxqrocxwsjcc_3GZEqT8qE8oUsyUkiQc66G_jalapeno-popper-stuffed-hamburger_squareThumbnail_en.png">
                <img src="img/front/pxqrocxwsjcc_3GZEqT8qE8oUsyUkiQc66G_jalapeno-popper-stuffed-hamburger_squareThumbnail_en.png"/>
                </li>
                <li data-thumb="img/front/sous-vide-hamburger-finishing-steps-image-2.jpg">
                <img src="img/front/sous-vide-hamburger-finishing-steps-image-2.jpg" />
                </li>
                <li data-thumb="img/front/tải xuống.jpg">
                <img src="img/front/tải xuống.jpg"/>
                </li>
              </ul>
             </div>
        </div>
        <div class="col-sm-6" style="background-color:#FFF; font-family: 'Pacifico', cursive; border-radius:10px; padding:10px;">
            <h1 style="color:#F00"> <?php echo number_format($kq['price']) ?> VND </h1>
            <h2 style="color:#F90; font-weight:bold"><?php echo $kq['name'] ?></h2>
            <i id="aubr"><?php echo $kq['desc'] ?></i>
                <div class="row" style="margin-top:10px;">
                    <div class="col-xs-6">
                        <div class="input-group" >
                        <span class="input-group-addon" name="qty">Số Lượng:</span>
                        <input type="number" class="form-control" id="qty" min="1" value="1">
                        </div>
                    </div>
                    <div class="col-xs-6">
                    <a href="javascript:window.location='?mod=cart_process&act=1&id=<?=$kq['id']?>&id_ban=<?=$id_ban?>&name_ban=<?=$name_ban?>&cate=<?=$cate?><?php if(isset($_GET['thanhtoan'])) echo'&thanhtoan=1';?>&qty='+document.getElementById('qty').value"><button class="btn col-xs-12" style="background-color:#F60; color:#FFF">Đặt Món</button></a>                    
                    </div>
                </div>
        </div>
    </div>
</div>
</body>
  <script>
  $(document).ready(function() {
    $("#quantity").keydown(function (e) {
        // Allow: backspace, delete, tab, escape, enter and .
        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
             // Allow: Ctrl/cmd+A
            (e.keyCode == 65 && (e.ctrlKey === true || e.metaKey === true)) ||
             // Allow: Ctrl/cmd+C
            (e.keyCode == 67 && (e.ctrlKey === true || e.metaKey === true)) ||
             // Allow: Ctrl/cmd+X
            (e.keyCode == 88 && (e.ctrlKey === true || e.metaKey === true)) ||
             // Allow: home, end, left, right
            (e.keyCode >= 35 && e.keyCode <= 39)) {
                 // let it happen, don't do anything
                 return;
        }
        // Ensure that it is a number and stop the keypress
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
            e.preventDefault();
        }
    });
});
  </script>
</html>