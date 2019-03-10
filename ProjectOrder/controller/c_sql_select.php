<?php
	//Select * From SQL No Condition With Array(While)
	function selectWithoutConditionArray($link, $table)
	{
		$kq = array();
		$sql = "select * from `{$table}`";
		$query = mysqli_query($link,$sql);
		while($temp = mysqli_fetch_assoc($query))
		{
			$kq[] = $temp;
		}
		return $kq;
	}
	
	//Select Just ID from SQL
	function selectIdWithCondition($link, $table, $id)
	{
		@$sql = "select * from `{$table}` where `id` = {$id}";
		$query = mysqli_query($link,$sql);
		@$value = mysqli_fetch_assoc($query);
		return $value;
	}		
	
	//Select ID & Number Table from SQL
	function selectIdNum($link, $table, $id, $numtable)
	{
		@$sql = "select * from `{$table}` where `num_table` = {$numtable} and `id` ={$id}";
		return $query = mysqli_query($link,$sql);
	}
	
	//Query Select * From SQL Where Act, ID
	function selectWithCondition_ActId($link, $table, $act, $id)
	{
		$sql = "select * from `{$table}` where `active` = $act and `id` = {$id}";
		return $query = mysqli_query($link,$sql);
	}
	
	//Query Select * From SQL Where NumTable, Act!=1
	function selectWithCondition_ActNum($link, $table, $numtable)
	{
		$sql = "select * from `{$table}` where `num_table`={$numtable} and `active` !=1";
		return $query = mysqli_query($link,$sql);
	}
	
	//Select Id of Order Just in File_Menu
	function selectIdOrderInMenu($link, $name)
	{
		$sql = "select a.`id` as id_donhang  
				from `of_order` as a, `of_order_detail` as b
				where a.`id`=b.`order_id` and `num_table`={$name}				
				group by a.`id`
				order by a.`id` desc limit 0,1";
		$query = mysqli_query($link,$sql);

		$value = mysqli_fetch_assoc($query);
		return $value;
	}
	
	//Query Select Food From SQL in File_Menu
	function selectFood($link, $table, $cate)
	{
		$sql = "select * from `{$table}` where `category_id`={$cate} and `active`<>0 order by `discount` desc";
		return mysqli_query($link,$sql);		 
	}
	
	//Select * From SQL Where Active=1 With Array(While)
	function selectWithConditionArray_Act($link, $table)
	{
		$kq = array();
		$sql = "select * from `{$table}` where `active`=1";
        $query = mysqli_query($link,$sql);
		while($temp = mysqli_fetch_assoc($query))
		{
			$kq[] = $temp;
		}
		return $kq;
	}
	
	//Select * From SQL Where Active =1 and Order by Order ASC With Array(While)
	function selectWithConditionArray_AcOrByOrAsc($link, $table)
	{
		$kq = array();
		$sql = "select * from `{$table}` where `active`=1 order by `order` asc";
		$query = mysqli_query($link,$sql);
		while($temp = mysqli_fetch_assoc($query))
		{
			$kq[] = $temp;
		}
		return $kq;
	}
	
	//Select Category Where Active=1, Department=, Order by Order ASC With Array(While)
	function selectWithConditionArray_AcDeOrByOrAsc($link, $table, $dep_id)
	{
		$kq = array();
		$sql = "select * from `{$table}` where `active`=1 and `department_id` = {$dep_id} order by `order` asc";
		$query = mysqli_query($link,$sql);
		while($temp = mysqli_fetch_assoc($query))
		{
			$kq[] = $temp;
		}
		return $kq;
	}
	
	//Query Select Active Of Bill Where OrderId=, Active=0
	function selectActiveBill_OrAc($link ,$table, $order_id)
	{
		 $sql = "select `active` from `{$table}` where `order_id` = {$order_id} and `active`=0";
         return $query = mysqli_query($link,$sql);
	}
	
	//Query Select From SQL Where OrderID=, Act=, FoodID=
	function selectWithCondition_OrdActFoo($link, $table, $orderID, $foodID, $act)
	{
		$sql = "select * from `{$table}` where `order_id`={$orderID} and `food_id`={$foodID} and `active`={$act}";
		return $query = mysqli_query($link,$sql);
	}
	
	//Select * From SQL Where Active=1, DepartmentID With Array(While)
	function selectWithConditionArray_AcDep($link, $table, $dep_id)
	{
		$kq = array();
		$sql = "select * from `{$table}` where `active`=1 and `department_id` = {$dep_id}";
        $query = mysqli_query($link,$sql);
		while($temp = mysqli_fetch_assoc($query))
		{
			$kq[] = $temp;
		}
		return $kq;
	}
	
	//Select * From SQL Where NumTable, Order by ID DESC Limit 0,1
	function selectWithCondition_NumOrByIdDes($link, $table, $numtable)
	{
		$sql = "select * from `{$table}` where `num_table`={$numtable} order by `id` DESC limit 0,1";
		$query = mysqli_query($link,$sql);
		$value = mysqli_fetch_assoc($query);
		return $value;
	}
	
	//Select * From SQL Where Active=
	function selectWithCondition_Act0($link, $table, $act)
	{
		$sql = "select * from `{$table}` where `active`={$act}";
		return $query = mysqli_query($link,$sql);
	}
	
	//Query Select * From SQL Where Name=, Act=
	function selectWithCondition_NameAct($link, $table, $name, $act)
	{
		$sql = "select * from `$table` where `name`='{$name}' and `active`={$act}";
		return $query = mysqli_query($link,$sql);
	}
?>