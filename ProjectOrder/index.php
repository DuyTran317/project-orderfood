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
<!--<link rel="shortcut icon" href="img/shortcut/Christian-cross-icon.png" />-->
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

<!-- Language -->
<form method='post' action='' id='form_lang'>
    <select name='lang' onchange='changeLang();' >
        <option value='vi' <?php if(isset($_SESSION['lang']) && $_SESSION['lang'] == 'vi'){ echo "selected"; } ?> >Tiếng Việt</option>
        <option value='en' <?php if(isset($_SESSION['lang']) && $_SESSION['lang'] == 'en'){ echo "selected"; } ?> >English</option>
    </select>
</form>

<?php
	$mod=@$_GET['mod'];
	  if($mod=='') $mod='dangnhap';
	  include("module/front/{$mod}.php");
?> 
<script>
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
</script>
<script>
 window.onload=function getLocation() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition);
    } else { 
        x.innerHTML = "Geolocation is not supported by this browser.";
    }
}

function showPosition(position) {
//   alert(position.coords.latitude,position.coords.longitude);
   $.ajax({
			url:'module/front/ajax_order.php',
			type:'POST',
			data:{latitude: position.coords.latitude,longitude: position.coords.longitude, act: 3}
			}).done(function(data){
				
				});
}
</script>
<script type="text/javascript">
    $(function(){
      SyntaxHighlighter.all();
    });
    $(window).load(function(){
      $('.flexslider').flexslider({
        animation: "slide",
        controlNav: "thumbnails",
        start: function(slider){
          $('body').removeClass('loading');
        }
      });
    });
  </script>
</html>