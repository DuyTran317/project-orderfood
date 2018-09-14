<?php
	require_once("lib/connect.php");
	session_start();
	ob_start();//cached output cho browser, de su dung ham header
?>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<!--<link rel="shortcut icon" href="img/shortcut/Christian-cross-icon.png" />-->
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css"/>
<link rel="stylesheet" type="text/css" href="lib/fontawesome-free-5.1.0-web/css/all.css">
<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="stylesheet" type="text/css" href="jqueryUI/jquery-ui.min.css">
    <link href="https://fonts.googleapis.com/css?family=Anton|Open+Sans+Condensed:300" rel="stylesheet">
    <script src="bootstrap/js/jquery.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="jqueryUI/jquery-ui.min.js"></script>
<!-- Library For DATATABLE PLUGGIN -->
<script src="lib/datatable/jquery.dataTables.min.js"></script>
<link rel="stylesheet" type="text/css" href="lib/datatable/jquery.dataTables.min.css" />
</head>

<?php
/*	if(isset($_SESSION['admin_id']))
	{
		header("location:?mod=home");
	}*/
	
	$mod=@$_GET['mod'];
	  if($mod=='') $mod='dangnhap';
	  include("module/back/{$mod}.php");
?>    

