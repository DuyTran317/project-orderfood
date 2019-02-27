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

	$result = $mysqli->query("SELECT * FROM of_bill");
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
            <div class="form-group form-group-lg row">
                <div class="col-xs-6">
                    <input type="text" class="form-control" id="datepickerfrom" placeholder="Từ">
                </div>
                <div class="col-xs-6">
                    <input type="text" class="form-control" id="datepickerto" placeholder="Đến">
                </div>
            </div>
            <button class="btn btn-info col-xs-12 btn-lg"><b>Tìm Kiếm</b></button>
        </div>
        <br><br>
        <div class="col-md-6">
            <h1><b>Chi tiết </b></h1>
            <table class="table">
                <th>
                    <tr class="info">
                        <th>
                            dsfs
                        </th>
                        <th>
                            dsfs
                        </th>
                        <th>
                            dsfs
                        </th>
                        <th>
                            dsfs
                        </th>
                    </tr>
                    <tr>
                        <td>
                            dsfs
                        </td>
                        <td>
                            dsfs
                        </td>
                        <td>
                            dsfs
                        </td>
                        <td>
                            dsfs
                        </td>
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
        startDate: '-3d',
    });
    $('#datepickerto').datepicker({
        dateFormat: 'dd/mm/yy',
        startDate: '-3d',
    });
</script>
</html>