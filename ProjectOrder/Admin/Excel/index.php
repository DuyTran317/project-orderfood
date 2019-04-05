
<?php

require('Classes/PHPExcel.php');
require('connect/db_connect.php');

if(isset($_POST['btnExport'])){
	$datefr=$_POST['datefrom'];
	$dateto=$_POST['dateto'];


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
	$sheet->setCellValue('A'.$rowCount,'STT');
	$sheet->setCellValue('B'.$rowCount,'Mã Order');
	$sheet->setCellValue('C'.$rowCount,'Bàn');
	$sheet->setCellValue('D'.$rowCount,'Tổng tiền');
	$sheet->setCellValue('E'.$rowCount,'Ngày');

	$result = $mysqli->query("SELECT * FROM of_bill where `date` >= '{$datefr}' and `date` <= '{$dateto}'");
	$stt=1;
	while($row = mysqli_fetch_array($result)){
		$rowCount++;
		$sheet->setCellValue('A'.$rowCount,$stt);
		$sheet->setCellValue('B'.$rowCount,$row['code_order']);
		$sheet->setCellValue('C'.$rowCount,$row['num_table']);
		$sheet->setCellValue('D'.$rowCount,number_format($row['total']));
		$sheet->setCellValue('E'.$rowCount,date('d-m-Y',strtotime($row['date'])));
		$stt++;
	}
$sheet->getStyle('A1:E1')->applyFromArray(
    array(
        'fill' => array(
            'type' => PHPExcel_Style_Fill::FILL_SOLID,
            'color' => array('rgb' => '00DD00')
        )
    )
);

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
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <link rel="stylesheet" href="dist/css/a.css">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="../bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../bower_components/font-awesome/css/font-awesome.min.css">
    <!-- daterange picker -->
    <link rel="stylesheet" href="../bower_components/bootstrap-daterangepicker/daterangepicker.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="../bower_components/jquery/dist/jquery.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Export data</title>
	
</head>
<body style="background-color: #f7f7f7">
<div class="container-fluid">

    <h1 align="center"><b><a href="../?mod=home">ORDERFOOD</a></b></h1>
        <div class="col-md-4 col-md-offset-4" style="background-color: white; padding: 10px;">
            <h2 align="center"><b>EXPORT</b></h2><hr>
            <form method="POST" action="" autocomplete="off">
                <div class="row">
                    <div class="col-xs-6">
                        <input id="datepickerfrom" type="text" name="datefrom" class="form-control"  placeholder="From" required>
                    </div>
                    <div class="col-xs-6">
                        <input id="datepickerto" type="text" name="dateto" class="form-control"  placeholder="To" required><br>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <button name="btnExport" type="submit"  class="btn btn-info btn-lg" style="width: 100%">Export</button>
                    </div>
                </div>
            </form>
        </div>

</div>



</body>
<script>
    $('#datepickerfrom').datepicker({
        dateFormat: 'd-m-y',

    });
    $('#datepickerto').datepicker({
        dateFormat: 'd-m-y',

    });
</script>
</html>