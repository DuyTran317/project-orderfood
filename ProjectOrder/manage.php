<?php
	require_once("lib/connect.php");
	include("controller/c_Pusher.php");
	session_start();
	ob_start();
	$now = time();
	if (isset($_SESSION['discard_after']) && $now > $_SESSION['discard_after']) {
    // this session has worn out its welcome; kill it and start a brand new one
    session_unset();
    session_destroy();
    session_start();
}

// either new or old, it should live at most for another hour
$_SESSION['discard_after'] = $now + 3600;
?><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="shortcut icon" href="img/front/iconmanage.png" />

<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css"/>
<link rel="stylesheet" type="text/css" href="lib/fontawesome-free-5.1.0-web/css/all.css">
<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="stylesheet" type="text/css" href="jqueryUI/jquery-ui.min.css">
    <link href="https://fonts.googleapis.com/css?family=Anton|Open+Sans+Condensed:300" rel="stylesheet">
    <script src="bootstrap/js/jquery.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="jqueryUI/jquery-ui.min.js"></script>
<script src="https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js"></script>
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

<title>
<?php
	if($mod=="home")echo"Bếp";
	if($mod=="home_thanhtoan")echo"Thanh Toán";
	if($mod=="home_nhanvien")echo"Quản Lý Bàn Ăn";
	if($mod=="list_order_nv")echo"Danh Sách Món Ăn Khách Gọi";
	if($mod=="confirm_order")echo"Xác Nhận Món Khách Gọi";
	if($mod=="temp")echo"Quản Lý Chuyển Bàn";
	if($mod=="add_food_nhanvien")echo"Thêm Món Ăn";
	if($mod=="payment")echo"Kiểm Tra Hóa Đơn";
	if($mod=="in_hoadon")echo"In Hóa Đơn";
	if($mod=="ds_food")echo"Chỉnh Sửa Menu";
?>
</title>

