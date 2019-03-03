<?php
	require_once("lib/connect.php");

	session_start();
	ob_start();

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<base href="http://localhost/project-orderfood/ProjectOrder/">
<link rel="shortcut icon" href="img/front/icon.png" />
<link href="https://fonts.googleapis.com/css?family=Exo+2|Pacifico" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css"/>
<link rel="stylesheet" type="text/css" href="lib/fontawesome-free-5.1.0-web/css/all.css">
<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="stylesheet" type="text/css" href="lib/wowjs/animate.min.css" />
<link href="https://fonts.googleapis.com/css?family=Anton|Open+Sans+Condensed:300" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="woocommerce-FlexSlider-53570ee/flexslider.css" media="screen" />
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="lib/wowjs/wow.min.js"></script>
<script src="bootstrap/js/jquery.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
<script defer src="lib/woocommerce-FlexSlider-53570ee/demo/js/jquery.flexslider.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="lib/sweetalert2.all.min.js"></script>

</head>
<?php
// Set Language variable
if(isset($_POST['lang']) && !empty($_POST['lang'])){
    $_SESSION['lang'] = $_POST['lang'];
    if(isset($_SESSION['lang']) && $_SESSION['lang'] != $_POST['lang']){
        echo "<script type='text/javascript'> location.reload(); </script>";
    }
}
if(isset($_SESSION['lang'])){
    include "languages/lang_".$_SESSION['lang'].".php";
}else{
    $_SESSION['lang']='vi';
    include "languages/lang_vi.php";
}
?>

<script>
    function changeLang(){
        document.getElementById('form_lang').submit();
    }
</script>
<body onload="setState() ; mobile_setState(); clearbiscuit()">
<div id="loadingpage">

    <div id="mySidenav" class="sidenav" style="color: white; line-height: 20px;">
        <a  href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <?php if(isset($_COOKIE['username_login'])){?>
        <h2 style="margin-bottom:10px; margin-left:20px" align="center"><?=_TABLE?> <?=$_COOKIE['username_login']?></h2>
        <?php } ?>
        <a class="text-center" style="color: white; font-size: 25px;"><?=_OPTION?></a><hr>
         <a>
             <form method='post' action='' id='form_lang'><?=_LANGUAGE?>:
            <select name='lang' onchange='changeLang();' style="color: black">
                <option value='vi' <?php if(isset($_SESSION['lang']) && $_SESSION['lang'] == 'vi'){ echo "selected"; } ?> >Tiếng Việt</option>
                <option value='en' <?php if(isset($_SESSION['lang']) && $_SESSION['lang'] == 'en'){ echo "selected"; } ?> >English</option>
            </select>
        </form>
         </a><br>
        <a data-toggle="modal" data-target="#manual" style="cursor: pointer"><i class="fas fa-info-circle"></i> <?=_MANUAL?></a>

        <?php if(isset($_COOKIE['username_login'])){?>
        <div style="position: absolute; bottom: 0px;"><button class="btn btn-danger" style=" width: 250px; border-radius: 0px; font-size: 25px;" onclick="window.location.href='xuly_dangxuat.html'"><i class="fas fa-sign-out-alt fa-fw"></i> <?=_LOGOUT?></button> </div>
        <?php } else {?>
        <div style="position: absolute; bottom: 0px;"><button class="btn btn-success" style=" width: 250px; border-radius: 0px; font-size: 25px;" onclick="window.location.href='login.html'"><i class="fas fa-sign-out-alt fa-fw"></i> <?=_LOGIN?></button> </div>
        <?php } ?>
    </div>

    <span style="font-size:34px;cursor:pointer; color: white; margin-left: 10px;" onclick="openNav()"><i class="fas fa-cog" style="margin-top:10px"></i></span>


    <?php

          $mod=@$_GET['mod'];
          if($mod=='') $mod='dangnhap';
          include("module/front/{$mod}.php");

    ?>

</div>

<div class="modal fade" id="manual" role="dialog">
    <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content" style="z-index: 99 !important;">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title" align="center"><?=_MANUAL?></h4>
            </div>
            <div class="modal-body">
                <div id="myManual" class="carousel slide" data-ride="carousel" data-interval="false">

                    <div class="carousel-inner" >

                        <div class="item active">
                            <img src="img/front/1.jpg" style="width:100%;">
                            <div class="carousel-caption ">
                                <h3 style="background-color: orange; padding: 10px; border-radius: 5px;" class="captionanimatext"><?=_STEP?> 1</h3>
                            </div>
                        </div>

                        <div class="item">
                            <img src="img/front/2.jpg"  style="width:100%;">
                            <div class="carousel-caption">
                                <h3 style="background-color: orange; padding: 10px; border-radius: 5px;" class="captionanimatext"><?=_STEP?> 2</h3>
                            </div>
                        </div>

                        <div class="item">
                            <img src="img/front/3.jpg"  style="width:100%;">
                            <div class="carousel-caption">
                                <h3 style="background-color: orange; padding: 10px; border-radius: 5px;" class="captionanimatext"><?=_STEP?> 3</h3>
                            </div>
                        </div>
                        <div class="item">
                            <img src="img/front/4.jpg"  style="width:100%;">
                            <div class="carousel-caption">
                                <h3 style="background-color: orange; padding: 10px; border-radius: 5px;" class="captionanimatext"><?=_STEP?> 4</h3>
                            </div>
                        </div>
                        <div class="item">
                            <img src="img/front/5.jpg"  style="width:100%;">
                            <div class="carousel-caption">
                                <h3 style="background-color: orange; padding: 10px; border-radius: 5px;" class="captionanimatext"><?=_STEP?> 5</h3>
                            </div>
                        </div>
                        <div class="item">
                            <img src="img/front/6.jpg"  style="width:100%;">
                            <div class="carousel-caption">
                                <h3 style="background-color: orange; padding: 10px; border-radius: 5px;" class="captionanimatext"><?=_STEP?> 6</h3>
                            </div>
                        </div>
                        <div class="item">
                            <img src="img/front/7.jpg"  style="width:100%;">
                            <div class="carousel-caption">
                                <h3 style="background-color: orange; padding: 10px; border-radius: 5px;" class="captionanimatext"><?=_STEP?> 7</h3>
                            </div>
                        </div>
                    </div>

                    <a class="left carousel-control" href="#myManual" data-slide="prev">

                        <span class="sr-only"></span>
                    </a>
                    <a class="right carousel-control" href="#myManual" data-slide="next">

                        <span class="sr-only"></span>
                    </a>
                </div>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><?=_CLOSE?></button>
            </div>
        </div>
    </div>
</div>
<div id="loading"></div>
</body>
<script>
    function onReady(callback) {
        var intervalID = window.setInterval(checkReady, 1000);

        function checkReady() {
            if (document.getElementsByTagName('div')[0] !== undefined) {
                window.clearInterval(intervalID);
                callback.call(this);
            }
        }
    }

    function show(id, value) {
        document.getElementById(id).style.display = value ? 'block' : 'none';
    }

    onReady(function () {
        show('loadingpage', true);
        show('loading', false);
    });

    $(document).ready(function () {
		$("#find").click(function () {
			 $(".find").removeAttr('disabled');
			 });
		$("#find").blur(function () {	
			if(document.getElementById('find').value != ''){ 
			 $(".find").removeAttr('disabled');
			 }else{
                $(".find").attr('disabled','');
			 }
				});
    });
    function openNav() {
        document.getElementById("mySidenav").style.width = "250px";
    }

    function closeNav() {
        document.getElementById("mySidenav").style.width = "0";
    }

            <?PHP /*
            FOREACH($_COOKIE AS $key => $value) {
                SETCOOKIE($key,$value,TIME()-10000);
            }*/
			?>
</script>
<title>
<?php
	if($mod=="home" or $mod=="watch_home")echo"Trang Chủ";
	if($mod=="menu" or $mod=="watch_menu")echo"Menu";
	if($mod=="detail" or $mod=="watch_detail")echo"Chi Tiết Món Ăn";	
	if($mod=="cart")echo"Danh Sách Gọi Món";
	if($mod=="checkout")echo"Xác Nhận Gọi Món";
	if($mod=="list_order")echo"Kiểm Tra Món Đã Gọi";
	if($mod=="xulythanhtoan")echo"Đánh Giá";
	if($mod=="dangnhap")echo"Đăng Nhập";
	
?>
</title>
</html>
