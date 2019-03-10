<?php
	//Insert Note 
	function Ins_Note($link, $table, $id, $note, $active)
	{
		$sql = "insert into `{$table}` values(NULL,'$id','$note',$active)";
		return mysqli_query($link,$sql);
	}
	
	//Insert OrderDetail 
	function Ins_OrderDetail($link, $table, $id, $product, $price, $qty, $discount, $active, $country)
	{
		$sql = "insert into `{$table}` values(NULL,'$id','$product','$price','$qty','$discount',$active,'$country')";
		return mysqli_query($link,$sql);
	}
	
	//Insert Order
	function Ins_Order($link, $table, $numtable, $active, $date)
	{
		$sql = "insert into `{$table}` values(NULL,'$numtable','$active','$date')";
		return mysqli_query($link,$sql);
	}
?>