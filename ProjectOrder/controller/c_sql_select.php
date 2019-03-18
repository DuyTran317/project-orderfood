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
	
	//Select * From SQL Where Active =1 and Order by Order ASC
	function selectWithCondition_AcOrByOrAsc($link, $table)
	{
		$sql = "select * from `{$table}` where `active`=1 order by `order` asc";
		$query = mysqli_query($link,$sql);
		return $value = mysqli_fetch_assoc($query);
	}
	
	//Query Select Active Of Bill Where OrderId=, Active=0
	function selectActiveBill_OrAc($link ,$table, $order_id)
	{
		 $sql = "select * from `{$table}` where `order_id` = {$order_id} and `active`=0";
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
	
	//Select * From SQL WHERE Active, CategoryID With Array(While)
	function selectWithConditionArray_ActCate($link, $table, $active, $cate_id)
	{
		$kq = array();
		$sql = "select * from `{$table}` where `active`={$active} and `category_id`={$cate_id}";
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
	
	//Query Login Managers WHERE Act=1
	function queryLogin_Back($link, $table, $user, $pass)
	{
		$sql = "select * from `{$table}` where `account`='{$user}' and `password`='{$pass}' and `active`=1";
		return $query = mysqli_query($link,$sql);
	}
	
	//Select * From SQL With Cate=3
	function selectWithCondition_Cate($link, $table, $cate)
	{
		$sql  ="select * from `{$table}`  where `cate`= {$cate}";
		$query = mysqli_query($link,$sql);
		return $value = mysqli_fetch_assoc($query);
	}
	
	//Select * From BILL and USER WHERE... With Array(While)
	function selectWithCondition_BillUser($link, $table1, $table2)
	{
		$kq = array();
		$sql = "select * from `{$table1}` as a, `{$table2}` as b 
				where a.`num_table` = b.`name` and a.`active`=0 and b.`active`=1";
        $query = mysqli_query($link,$sql);
		while($temp = mysqli_fetch_assoc($query))
		{
			$kq[] = $temp;
		}
		return $kq;
	}
	
	//COUNT * From SQL WHERE NumTable, Active
	function selectWithCondition_NumAct($link, $table, $numtable ,$active)
	{
		$sql = "select * from `{$table}` where `num_table` = {$numtable} and `active` ={$active}";
		$query = mysqli_query($link,$sql);
		return $count = mysqli_num_rows($query);
	}
	
	//Select SHOW TABLE in EMPLOYEE
	function selectTableInEmployee($link)
	{
		$kq = array();
		$sql = "SELECT *, a.`active` as a_user FROM `of_user` as a left JOIN `of_bill` as c ON (a.`name` = c.`num_table` AND c.`active` = 0) LEFT JOIN `of_order` as b ON (a.`name` = b.`num_table` AND (c.`order_id` = b.`id` OR b.`active` = 0)) order by a.`active` desc, CASE WHEN b.`active` IS NULL then 3 END, b.`active` asc, a.`name` asc"; 
		$query = mysqli_query($link,$sql);
		while($temp = mysqli_fetch_assoc($query))
		{
			$kq[] = $temp;
		}
		return $kq;
	}
	
	//Query IDORDER & NameTable in EMPLOYEE
	function selectWithCondition_IdOrNameTable($link, $name)
	{
		$sql = "SELECT *,`of_order`.`id` as id_or, `of_order`.`num_table` as name_ban FROM `of_order` LEFT JOIN `of_bill` ON `of_order`.`id` = `of_bill`.`order_id` where (`of_order`.`active` <> 1 or `of_bill`.`active` <> 1) and `of_order`.`num_table` = '{$name}'";
		return $query = mysqli_query($link,$sql);	
	}
	
	//Select Number Of Food WHERE Act=0 in EMPLOYEE 
	function selectWithCondition_NumOfFood($link, $table1, $table2, $name, $active)
	{
		$sql = "select  * 
			  from `{$table1}` as a, `{$table2}` as b
			  where a.`id`=b.`order_id` and `num_table`='{$name}' and b.`active`={$active}";
		$query = mysqli_query($link,$sql);
		return $value = mysqli_num_rows($query);
	}
	
	//Query ORDER WHERE ID, NumTable, Act in EMPLOYEE
	function selectWithCondition_IdNumAct($link, $table, $numtable, $id, $active)
	{
		@$sql = "select * from `{$table}` where `num_table` = {$numtable} and `id` ={$id} and `active` !={$active}";
		return @$query = mysqli_query($link,$sql);
	}
	
	//COUNT in file Confirm_order in EMPLOYEE
	function selectSomething1_ConfirmOrder($link, $id)
	{
		$sql = "select a.*,b.`vi_name`,a.`country`,b.`img_url` as hinh,a.`id` as id_food,b.`en_name` from `of_order_detail` as a,`of_food` as b where `order_id`={$id} and a.`food_id` = b.`id` and a.`active`=0";
        return $query = mysqli_query($link,$sql);		 
	}
	
	//Select Tìm Trùng in file Confirm_order in EMPLOYEE
	function selectSomething2_ConfirmOrder($link)
	{
		return $sql = "select a.*, b.`vi_name`, c.`num_table` from `of_order_detail` as a, `of_food` as b, `of_order` as c where a.`food_id`=b.`id` and a.`order_id`=c.`id` and a.`active`=0 and ( a.`food_id`=0";
	}
	
	//Query * From SQL WHERE FoodID, Act
	function selectWithCondition_FoodIdAct($link, $table, $id, $active)
	{
		$sql = "select * from `{$table}` where `food_id` ={$id} and `active` = {$active}";
		return $query = mysqli_query($link,$sql);
	}
?>