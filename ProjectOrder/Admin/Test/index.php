<?php

require('Classes/PHPExcel.php');
require('connect/db_connect.php');

if(isset($_POST['btnExport'])){
	$objExcel = new PHPExcel;
	$objExcel->setActiveSheetIndex(0);
	$sheet = $objExcel->getActiveSheet()->setTitle('databill');
	$objExcel->getActiveSheet()->getColumnDimension('A')->setWidth(20);
	$objExcel->getActiveSheet()->getColumnDimension('B')->setWidth(20);
	$objExcel->getActiveSheet()->getColumnDimension('C')->setWidth(20);
	$objExcel->getActiveSheet()->getColumnDimension('D')->setWidth(20);
	$objExcel->getActiveSheet()->getColumnDimension('E')->setWidth(20);
	$objExcel->getActiveSheet()->getStyle('A1:E1')->getFont()->setBold(true);

	$rowCount = 1;
	$sheet->setCellValue('A'.$rowCount,'Mã Hóa Đơn');
	$sheet->setCellValue('B'.$rowCount,'Mã Order');
	$sheet->setCellValue('C'.$rowCount,'Bàn');
	$sheet->setCellValue('D'.$rowCount,'Tổng tiền');
	$sheet->setCellValue('E'.$rowCount,'Ngày');

	$result = $mysqli->query("SELECT * FROM of_bill where `date` <= '{$dateto}' and `date` >= '{$datefrom}'");
	while($row = mysqli_fetch_array($result)){
		$rowCount++;
		$sheet->setCellValue('A'.$rowCount,$row['id']);
		$sheet->setCellValue('B'.$rowCount,$row['code_order']);
		$sheet->setCellValue('C'.$rowCount,$row['num_table']);
		$sheet->setCellValue('D'.$rowCount,$row['total']);
		$sheet->setCellValue('E'.$rowCount,date('d-m-Y',strtotime($row['date'])));
	}



	$styleArray = array('borders'=>array('allborders'=>array('style'=> PHPExcel_Style_Border::BORDER_THIN)));
	$sheet->getStyle('A1:'.'E'.($rowCount))->applyFromArray($styleArray);
	$objWriter = new PHPExcel_Writer_Excel2007($objExcel);
	$filename = 'databill.xlsx';
	$objWriter->save($filename);

	header('Content-Disposition: attachment; filename="' . $filename . '"');
	header('Content-type: application/vnd.ms-excel');
	header('Content-Length: ' . filesize($filename));
	header('Content-Transfer-Encoding: binary');
	header('Cache-Control: must-revalidate');
	header('Pragma: no-cache');
	readfile($filename);
	return;

}


?>
<?php
    if(isset($_POST['datefrom']))
    {
        $datefrom=$_POST['datefrom'];
        
        //Chuyen format $dob tu dd/mm/yyyy -> yyyy-mm-dd
        $d= substr($datefrom,0,2);
        $m= substr($datefrom,3,2);
        $y= substr($datefrom,6,4);
        
        $datefrom="{$y}-{$m}-{$d} 00:00:00";     
    }
    if(isset($_POST['dateto']))
    {
        $dateto=$_POST['dateto'];
        
        //Chuyen format $dob tu dd/mm/yyyy -> yyyy-mm-dd
        $d= substr($dateto,0,2);
        $m= substr($dateto,3,2);
        $y= substr($dateto,6,4);
        
        $dateto="{$y}-{$m}-{$d} 23:59:59";

    }   
   
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <link rel="stylesheet" href="dist/css/a.css">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!--<base href="http://localhost:8080/project-orderfood/ProjectOrder/Admin/">-->
    <link rel="shortcut icon" href="../img/front/icon.png" />
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="../bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="../bower_components/Ionicons/css/ionicons.min.css">
    <!-- daterange picker -->
    <link rel="stylesheet" href="../bower_components/bootstrap-daterangepicker/daterangepicker.css">
    <!-- bootstrap datepicker -->
    <link rel="stylesheet" href="../bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
    <!-- iCheck for checkboxes and radio inputs -->
    <link rel="stylesheet" href="../plugins/iCheck/all.css">
    <!-- Bootstrap Color Picker -->
    <link rel="stylesheet" href="../bower_components/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css">
    <!-- Bootstrap time Picker -->
    <link rel="stylesheet" href="../plugins/timepicker/bootstrap-timepicker.min.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="../bower_components/select2/dist/css/select2.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">
    <link rel="stylesheet" href="../bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <script src="dist/js/sweetalert2.all.min.js"></script>

	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Export data</title>
	<link rel="stylesheet" href="">
</head>
<body>
<div class="container-fluid" style="margin-top: 2%">
    <div class="row">
        <div class="col-md-6">
            <h1><b>Truy xuất dữ liệu</b></h1>
            <h2>Bạn có thể in ra bản báo cáo dữ liệu theo ngày theo định dạng excel</h2><br>
            <form method="POST" action="index.php">
            <div class="form-group form-group-lg row">
                <div class="col-xs-6">
                    <input type="text" class="datefrom form-control" id="datepickerfrom" placeholder="Từ" readonly="" name="datefrom">
                </div>
                <div class="col-xs-6">
                    <input type="text" class="dateto form-control" id="datepickerto" placeholder="Đến" readonly="" name="dateto">
                </div>
            </div>
            <button type="submit" class="btn btn-info col-xs-12 btn-lg"><b>Tìm Kiếm</b></button>
       		</form>
        </div>
        <br><br>
        <div class="col-md-6">
            <h1><b>Chi tiết </b></h1>
            <table class="table">
                <th>
                    <tr class="info">
                        <th>
                            Mã Hóa Đơn
                        </th>
                        <th>
                            Mã Order
                        </th>
                        <th>
                           Bàn
                        </th>
                        <th>
                            Tổng tiền
                        </th>
                        <th>
                            Ngày
                        </th>
                    </tr>
                    <?php
                            if(isset($_POST['datefrom'])&&isset($_POST['dateto'])){
                                if($datefrom>$dateto)
                                    {
                                        echo "<script type='text/javascript'>";
                                            echo "setTimeout(function () { swal('Lỗi',
                                                          'Bạn hãy chọn đúng ngày!',
                                                          'error');";
                                            echo "},1);</script>";
                                        }
                            $sql_bill = "select `code_order`,`order_id`,`num_table`,`total`,`date` from `of_bill` where `date` <= '{$dateto}' and `date` >= '{$datefrom}' ";
                            $i=1;
                            $kq_bill = mysqli_query($mysqli,$sql_bill);
                        }else{
							
                            $sql_bill = "select * from `of_bill` where DATE(`date`) =  CURDATE()";
                            $i=1;
                            $kq_bill = mysqli_query($mysqli,$sql_bill); 
							                        }
                            while($d_bill=mysqli_fetch_assoc($kq_bill))
                            {
                            ?>
                            <tr>
                               
                                <td><?= $d_bill['code_order'] ?></td>
                                <td><?= $d_bill['order_id'] ?></td>
                               	<td><?= $d_bill['num_table'] ?></td>
                               	<td><?= number_format($d_bill['total']) ?></td>
                               	<td><?= date("d/m/Y", strtotime( $d_bill['date']))?></td>
                            </tr>
                           
                            <?php } ?>
							 <tr>
                               <?php 
                               	$sql_bill1 = "select sum(total) as tongtien from `of_bill` where `date` <= '{$dateto}' and `date` >= '{$datefrom}' ";
	                            
	                            $kq_bill1 = mysqli_query($mysqli,$sql_bill1);
	                            $d_bill1=mysqli_fetch_assoc($kq_bill1)
                               ?>
                                <td>Tổng Tiền:<?= number_format($d_bill1['tongtien']) ?></td>
                               
                            </tr>
                </th>
            </table>
            <div align="right">
                <form method="POST" >
                    <button name="btnExport" type="submit" class="btn btn-lg btn-info">Xuất file</button>
                </form>
            </div>
        </div>
    </div>
</div>

</body>
<script>
     

    $('#datepickerfrom').datepicker({
        dateFormat: 'dd/mm/yy',
      
    });
    $('#datepickerto').datepicker({
        dateFormat: 'dd/mm/yy',
     
    });
</script>
</html>