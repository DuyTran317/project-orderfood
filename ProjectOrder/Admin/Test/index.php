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
	<title>Export data</title>
	<link rel="stylesheet" href="">
</head>
<body>
	<form method="POST">
		<button name="btnExport" type="submit">Xuất file</button>
	</form>
</body>
</html>