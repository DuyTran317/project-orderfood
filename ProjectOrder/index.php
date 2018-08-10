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
<link rel="stylesheet" type="text/css" href="fontawesome-free-5.1.0-web/css/all.css">
<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="stylesheet" type="text/css" href="lib/wowjs/animate.min.css" />
<link rel="stylesheet" type="text/css" href="woocommerce-FlexSlider-53570ee/flexslider.css" media="screen" />
<script src="lib/wowjs/wow.min.js"></script>
<script src="bootstrap/js/jquery.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
<script defer src="woocommerce-FlexSlider-53570ee/demo/js/jquery.flexslider.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
</head>

<body >

<?php
	$mod=@$_GET['mod'];
	  if($mod=='') $mod='dangnhap';
	  include("module/front/{$mod}.php");
?> 
</body>
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