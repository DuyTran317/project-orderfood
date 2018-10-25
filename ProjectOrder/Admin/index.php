﻿<?php
session_start();
ob_start(); ?>
   <?php
    if(isset($_COOKIE['userad']) && isset($_COOKIE['idad']) && isset($_COOKIE['catead']))
    {
        $_SESSION['userad'] = $_COOKIE['userad'];
        $_SESSION['idad'] = $_COOKIE['idad'];
        $_SESSION['catead'] = $_COOKIE['catead'];
        setcookie("userad","{$_SESSION['userad']}",time()+999999);
        setcookie("idad","{$_SESSION['idad']}",time()+999999);
        setcookie("catead","{$_SESSION['catead']}",time()+999999);
    }
if(!isset($_SESSION['userad'])) {

    header('location:login.php');
}
elseif(isset($_SESSION['success'] )=='thanhcong') {
            echo "<script type='text/javascript'>";
            echo "setTimeout(function () { swal('Đăng Nhập Thành Công',
                          'Chào mừng bạn đến với trang quản trị OrderFOOD',
                          'success');";
            echo "},1);</script>";
        }
        else
        {
            header("?mod=home");
        } ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!--<base href="http://localhost:8080/project-orderfood/ProjectOrder/Admin/">-->
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
    <link rel="stylesheet" href="dist/css/a.css">
    <!-- Morris chart -->
    <link rel="stylesheet" href="bower_components/morris.js/morris.css">
    <!-- jvectormap -->
    <link rel="stylesheet" href="bower_components/jvectormap/jquery-jvectormap.css">
    <!-- Date Picker -->
    <link rel="stylesheet" href="bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="bower_components/bootstrap-daterangepicker/daterangepicker.css">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <script src="dist/js/sweetalert2.all.min.js"></script>
</head>
<body class="hold-transition skin-blue sidebar-mini">
 
<?php include('moduleAD/menu.php') ?>
<?php
include ("../lib/connect.php");
$mod=@$_GET['mod'];
if($mod=='') $mod='home';
include("moduleAD/{$mod}.php");
?>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<!-- jQuery 3 -->

<!-- jQuery UI 1.11.4 -->
<script src="bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<script type="text/javascript" src="bower_components/ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="bower_components/ckfinder/ckfinder.js"></script>
<!-- DataTables -->
<script src="bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script>
    $(function () {
        $('#example1').DataTable( {
			"language": {
				"url": "bower_components/datatables.net/Vietnamese.json"
			}
    	} );
        $('#example2').DataTable({
			"language": {
				"url": "bower_components/datatables.net/Vietnamese.json"
			},
            'paging'      : true,
            'lengthChange': false,
            'searching'   : false,
            'ordering'    : true,
            'info'        : true,
            'autoWidth'   : false
        })
    })
</script>
<script>
    $(document).ready(function () {
        $("#changePassword").change(function () {
            if($(this).is(":checked"))
            {
                $(".password").removeAttr('disabled');
            }
            else
            {
                $(".password").attr('disabled','');
            }
        });
    });
</script>
<script>
    $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip();
    });
</script>
<script>
    //Chi tiết
    var noidung = CKEDITOR.replace( 'noidung', {
        uiColor: '#ccffff',
        language:'vi',

    });

    CKFinder.setupCKEditor( noidung, 'brower_components/ckfinder/' ) ;

</script>
<script>
    CKEDITOR.replace( 'noidung',
        {
            filebrowserBrowseUrl : 'brower_components/ckfinder/ckfinder.html',
            filebrowserImageBrowseUrl : 'brower_components/ckfinder/ckfinder.html?type=Images',
            filebrowserFlashBrowseUrl : 'brower_components/ckfinder/ckfinder.html?type=Flash',
            filebrowserUploadUrl : 'brower_components/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
            filebrowserImageUploadUrl : 'brower_components/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
            filebrowserFlashUploadUrl : 'brower_components/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
        });
</script>
<title>
        <?php   
        if($mod=="home")echo"Trang Chủ";
        if($mod=="ad_list")echo"Danh Sách Admin";      
        if($mod=="add_cat")echo"Thêm Thể Loại"; 
        if($mod=="add_kit")echo"Thêm Bếp và Thanh Toán";
        if($mod=="add_pro")echo"Thêm Sản Phẩm";
        if($mod=="add_user")echo"Thêm Bàn";
        if($mod=="bill_detail")echo"Chi Tiết Hóa Đơn";
        if($mod=="bill_list")echo"Danh Sách Hóa Đơn";
        if($mod=="cat_list")echo"Danh Sách Thể Loại";   
        if($mod=="com_list")echo"Danh Sách Bình Luận";
        if($mod=="edit_ad")echo"Sửa Admin";
        if($mod=="edit_cat")echo"Sửa Thể Loại";
        if($mod=="edit_kit")echo"Sửa Bếp và Thanh Toán";
        if($mod=="edit_pro")echo"Sửa Sản Phẩm";
        if($mod=="edit_user")echo"Sửa Bàn";
        if($mod=="kit_list")echo"Danh Sách Bếp và Thanh Toán";
        if($mod=="pro_list")echo"Danh Sách Sản Phẩm";
        if($mod=="user_list")echo"Danh Sách Bàn";
        if($mod=="slide_list")echo"Danh Sách slide";
        if($mod=="add_slide")echo"Thêm slide";
        if($mod=="edit_slide")echo"Sửa slide";
        ?> | OrderFood
  </title>
<script type="text/javascript" >var scrolltotop={setting:{startline:100,scrollto:0,scrollduration:1e3,fadeduration:[500,100]},controlHTML:'<img src="https://i1155.photobucket.com/albums/p559/scrolltotop/arrow27.png" />',controlattrs:{offsetx:5,offsety:5},anchorkeyword:"#top",state:{isvisible:!1,shouldvisible:!1},scrollup:function(){this.cssfixedsupport||this.$control.css({opacity:0});var t=isNaN(this.setting.scrollto)?this.setting.scrollto:parseInt(this.setting.scrollto);t="string"==typeof t&&1==jQuery("#"+t).length?jQuery("#"+t).offset().top:0,this.$body.animate({scrollTop:t},this.setting.scrollduration)},keepfixed:function(){var t=jQuery(window),o=t.scrollLeft()+t.width()-this.$control.width()-this.controlattrs.offsetx,s=t.scrollTop()+t.height()-this.$control.height()-this.controlattrs.offsety;this.$control.css({left:o+"px",top:s+"px"})},togglecontrol:function(){var t=jQuery(window).scrollTop();this.cssfixedsupport||this.keepfixed(),this.state.shouldvisible=t>=this.setting.startline?!0:!1,this.state.shouldvisible&&!this.state.isvisible?(this.$control.stop().animate({opacity:1},this.setting.fadeduration[0]),this.state.isvisible=!0):0==this.state.shouldvisible&&this.state.isvisible&&(this.$control.stop().animate({opacity:0},this.setting.fadeduration[1]),this.state.isvisible=!1)},init:function(){jQuery(document).ready(function(t){var o=scrolltotop,s=document.all;o.cssfixedsupport=!s||s&&"CSS1Compat"==document.compatMode&&window.XMLHttpRequest,o.$body=t(window.opera?"CSS1Compat"==document.compatMode?"html":"body":"html,body"),o.$control=t('<div id="topcontrol">'+o.controlHTML+"</div>").css({position:o.cssfixedsupport?"fixed":"absolute",bottom:o.controlattrs.offsety,right:o.controlattrs.offsetx,opacity:0,cursor:"pointer"}).attr({title:"Scroll to Top"}).click(function(){return o.scrollup(),!1}).appendTo("body"),document.all&&!window.XMLHttpRequest&&""!=o.$control.text()&&o.$control.css({width:o.$control.width()}),o.togglecontrol(),t('a[href="'+o.anchorkeyword+'"]').click(function(){return o.scrollup(),!1}),t(window).bind("scroll resize",function(t){o.togglecontrol()})})}};scrolltotop.init();</script>
 <script type="text/javascript">
     var check = function() {
        if(document.getElementById('repass').value != ''){
  if (document.getElementById('pass').value ==
    document.getElementById('repass').value) {
    document.getElementById('message').style.color = 'green';
    document.getElementById('message').innerHTML = 'Mật khẩu đã trùng';
  } else {
    document.getElementById('message').style.color = 'red';
    document.getElementById('message').innerHTML = 'Mật khẩu chưa đã trùng';
  } 
}

}

 </script>
 <script>
    $( function() {
        <!--Config DatePicker Bootstrap-->
        $.fn.datepicker.dates['en'] = {
            days: ["Chủ Nhật", "Thứ 2", "Thứ 3", "Thứ 4", "Thứ 5", "Thứ 6", "Thứ 7"],
            daysShort: ["Chủ Nhật", "Thứ 2", "Thứ 3", "Thứ 4", "Thứ 5", "Thứ 6", "Thứ 7"],
            daysMin: ["CN", "T.2", "T.3", "T.4", "T.5", "T.6", "T.7"],
            months: ["Tháng 1", "Tháng 2", "Tháng 3", "Tháng 4", "Tháng 5", "Tháng 6", "Tháng 7", "Tháng 8", "Tháng 9", "Tháng 10", "Tháng 11", "Tháng 12"],
            monthsShort: ["Th.1", "Th.2", "Th.3", "Th.4", "Th.5", "Th.6", "Th.7", "Th.8", "Th.9", "Th.10", "Th.11", "Th.12"],
            titleFormat: "MM yyyy", /* Leverages same syntax as 'format' */
            weekStart: 0
        };
        
        $( ".datefrom" ).datepicker({
            format:'dd/mm/yyyy',            
        });
        $( ".dateto" ).datepicker({
            format:'dd/mm/yyyy',
        });
  } );
</script>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
    <?php
        $date_start = date("Y-m-01");       
        $date_end = date("Y-m-t", strtotime("+0 month") );

        $sql="select *,c.`name` as ten_mon, b.`qty` as sl_mon from `of_bill` as a, `of_order_detail` as b, `of_food` as c where a.`order_id` = b.`order_id` and b.`food_id` = c.`id` and a.`date` <= '{$date_end}' and a.`date` >= '{$date_start}' order by b.`qty` desc limit 0,5";
        $kq=mysqli_query($link,$sql);       
    ?>
  google.charts.load("current", {packages:["corechart"]});
  google.charts.setOnLoadCallback(drawChart);
  function drawChart() {
    var data = google.visualization.arrayToDataTable([
      ['Task', 'Hours per Day'],
      <?php
        while($k=mysqli_fetch_assoc($kq)): 
      ?>
        ['<?=$k['ten_mon']?>', <?=$k['sl_mon']?>],
      <?php endwhile ?>
    ]);

    var options = {
      title: 'Năm Món Được Đặt Nhiều Nhất Trong Tháng',
      is3D: true,
    };

    var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
    chart.draw(data, options);
  }
</script>
<script>
     $( document ).ready(function() {
       $('input#dateto').val("<?php echo $fdateto; ?>");
       $('input#datefrom').val("<?php echo $fdatefrom; ?>");
      });
 </script>
 <?php unset($_SESSION['success']); ?>
</body>

</html>
