<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<!--<link rel="shortcut icon" href="img/shortcut/Christian-cross-icon.png" />-->
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css"/>
<link rel="stylesheet" type="text/css" href="fontawesome-free-5.1.0-web/css/all.css">
<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="stylesheet" type="text/css" href="lib/wowjs/animate.min.css" />
<script src="lib/wowjs/wow.min.js"></script>
<script src="bootstrap/js/jquery.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
</head>

<body>
<?php
/*	if(isset($_SESSION['admin_id']))
	{
		header("location:?mod=home");
	}*/
	
	$mod=@$_GET['mod'];
	  if($mod=='') $mod='dangnhap';
	  include("module/front/{$mod}.php");
?> 
</body>
</html>