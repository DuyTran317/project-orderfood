<?php
	//Update OrderDetail with QTY WHERE OrderID & FoodID & Act=0
	function Upd_OrderDeital($link, $table, $qty, $orderID, $foodID, $active)
	{
		$sql = "update `{$table}` set `qty` = `qty` + {$qty} where `order_id`={$orderID} and `food_id`={$foodID} and `active`={$active}";
		return mysqli_query($link,$sql);
	}
	
	//Update Order with Act WHERE ID
	function Upd_OderAct($link, $table, $active, $id)
	{
		$sql = "update `{$table}` set `active`={$active} where `id`={$id}";
		return mysqli_query($link,$sql);
	}
?>