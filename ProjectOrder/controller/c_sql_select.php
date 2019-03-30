<?php
	//Select * From SQL WHERE LANG
	function selectWithCondition_Lang($link, $table, $lang, $name)
	{
		$sql = "select * from `{$table}` where `$lang`='$name'";
		return $query = mysqli_query($link,$sql);
	}
	
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
	
	//Select * From SQL WHERE CATEGORY ID With Array(While)
	function selectWithCondition_CateID($link, $table, $cateID)
	{
		$kq = array();
		$sql = "SELECT * from `{$table}` where `category_id`={$cateID}";
		$query = mysqli_query($link,$sql);
		while($temp = mysqli_fetch_assoc($query))
		{
			$kq[] = $temp;
		}
		return $kq;
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
		$sql = "select * from `{$table}` where `category_id`={$cate} and `active`<>0 order by `solve` desc";
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
	
	//Query Select Active Of Bill Where OrderId=, Active=0
	function selectActiveBill_OrActive($link ,$table, $order_id, $active)
	{
		 $sql = "select * from `{$table}` where `order_id` = {$order_id} and `active`={$active}";
         return $query = mysqli_query($link,$sql);
	}
	
	//Query Select From SQL Where OrderID=, Act=, FoodID=
	function selectWithCondition_OrdActFoo($link, $table, $orderID, $foodID, $act)
	{
		$sql = "select * from `{$table}` where `order_id`={$orderID} and `food_id`={$foodID} and `active`={$act}";
		return $query = mysqli_query($link,$sql);
	}
	
	//Select * From SQL Where OrderID
	function selectWithCondition_OrderId($link, $table, $id)
	{
		$sql = "select * from `{$table}` where `order_id`={$id}";
		$query = mysqli_query($link,$sql);
		return $value = mysqli_fetch_assoc($query);
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
	
	//Select * From SQL Where NumTable, Active Order by ID DESC Limit 0,1
	function selectWithCondition_NumActOrByIdDes($link, $table, $numtable, $active)
	{
		$sql = "select * from `{$table}` where `num_table` = {$numtable} and `active`={$active} order by `id` desc limit 0,1";
		$query = mysqli_query($link,$sql);
		$value = mysqli_fetch_assoc($query);
		return $value;
	}
	
	//Select * From SQL Order by ID DESC Limit 0,1
	function selectWithCondition_OrByIdDes($link, $table)
	{
		$sql = "select * from `{$table}` order by `id` DESC limit 0,1";
		$query = mysqli_query($link,$sql);
		$value = mysqli_fetch_assoc($query);
		return $value;
	}
	
	//Select * From SQL Where Act=
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
	
	//Select * From SQL WHERE NumTable, Active
	function selectWithCondition_FetchNumAct($link, $table, $numtable ,$active)
	{
		$sql = "select * from `{$table}` where `num_table` = {$numtable} and `active` ={$active}";
		$query = mysqli_query($link,$sql);
		return $value = mysqli_fetch_assoc($query);
	}
	
	//Query WHERE NumTable, Active
	function selectWithCondition_QueryNumAct($link, $table, $numtable ,$active)
	{
		$sql = "select * from `{$table}` where `num_table` = {$numtable} and `active` ={$active}";
		return $query = mysqli_query($link,$sql);
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
	
	//Select LIST ORDER With Array(While) in EMPLOYEE
	function selectWithConditionArray_ListOrderEmploy($link, $id)
	{
		$kq = array();
		$sql = "select b.`en_name`, b.`vi_name`, a.`country`,a.`price`, SUM(a.`qty`) as qty, b.`discount` as km, b.`price_discount` as gia_km
		  from `of_order_detail` as a, `of_food` as b
		  where a.`food_id`= b.`id` and a.`order_id`={$id}
		  GROUP BY a.`food_id`";
		$query = mysqli_query($link,$sql);
		while($temp = mysqli_fetch_assoc($query))
		{
			$kq[] = $temp;
		}
		return $kq;
	}
	
	//Select LIST ORDER With Array(While) in CUSTOMER
	function selectWithConditionArray_ListOrderCust($link, $multi, $id)
	{
		$kq = array();
		$sql = "select b.{$multi} as ten,a.`price`, SUM(a.`qty`) as qty, b.`discount` as km, b.`price_discount` as gia_km
		  from `of_order_detail` as a, `of_food` as b
		  where a.`food_id`= b.`id` and a.`order_id`={$id}
		  GROUP BY a.`food_id`";
		$query = mysqli_query($link,$sql);
		while($temp = mysqli_fetch_assoc($query))
		{
			$kq[] = $temp;
		}
		return $kq;
	}
	
	//FUNCTION CHANGE TABLE in EMPLOYEE
	function changeTable($link, $num_table)
	{
		@$sql = "select b.`num_table`, b.`order_id`, b.`id`, a.`active`, b.`total` from `of_order` as a, `of_bill` as b where a.`id` = b.`order_id` and a.`num_table` = {$num_table} and a.active <> 0 and b.`active` = 0";
		$query = mysqli_query($link,$sql);
		return $value = @mysqli_fetch_assoc($query);
	}
	
	//Query FUNCTION CHANGE TABLE in EMPLOYEE
	function queryChangeTable($link, $order_id1, $order_id2)
	{
		$sql = "select `id` from `of_solve_pay` where `order_id` == {$order_id1} or `order_id` == {order_id2}";
		return $query = mysqli_query($link,$sql);
	}
	
	//Query FUNCTION CHANGE TABLE in EMPLOYEE
	function select_ChangeTable($link, $num_table)
	{
		@$sql = "select a.`id`, a.`num_table` from `of_order` as a left join `of_bill` as b on a.`id` = b.`order_id` where a.`num_table` = {$num_table} and (a.`active` <> 1 or b.`active` <> 1)";
		return $query = mysqli_query($link,$sql);
	}
	
	//Query FUNCTION in File Payment
	function selectPayment($link, $id)
	{
		$sql = "select a.*,b.`en_name`,b.`vi_name`,a.`country` as country, b.`img_url` as hinh, a.`discount` as km from `of_order_detail` as a,`of_food` as b where `order_id`={$id} and a.`food_id` = b.`id`";
        return $query = mysqli_query($link,$sql);
	}
	
	//Select for using LANG in File Payment
	function select_UsingLang($link, $id)
	{
		$sql = "select a.*,b.`en_name`,b.`vi_name`,a.`country` as country, b.`img_url` as hinh, a.`discount` as km from `of_order_detail` as a,`of_food` as b where `order_id`={$id} and a.`food_id` = b.`id`";
		$query = mysqli_query($link,$sql);
		return $value = mysqli_fetch_assoc($query);
	}
	
	//Select Date in File Order History
	function selectDate($datefrom, $dateto)
	{
		return $sql = "select * from `of_order` where `date` >='{$datefrom}' and `date` <='{$dateto}' order by `date` desc";
	}
	
	//Select * in File Order History With Array(While)
	function selectOrderHistory($link, $orderID)
	{
		$kq = array();
		$sql = "select b.`vi_name` as ten, a.`qty` as sl from `of_order_detail` as a, `of_food` as b where a.`food_id` = b.`id` and `order_id`={$orderID}";
		$query = mysqli_query($link,$sql);
		while($temp = mysqli_fetch_assoc($query))
		{
			$kq[] = $temp;
		}
		return $kq;
	}
	
	//Select * in File Home ThanhToan With Array(While)
	function selectHomeThanhToan($link)
	{
		$kq = array();
		$sql = "SELECT *, b.`active` as wait from `of_order` as a, `of_bill` as b where a.`id`=b.`order_id` and a.`active`=1 and b.`active`=0";
		$query = mysqli_query($link,$sql);
		while($temp = mysqli_fetch_assoc($query))
		{
			$kq[] = $temp;
		}
		return $kq;
	}
	
	//Query in Home(Bếp)
	function selectSomething_HomeBack($link, $admin_id)
	{
		$sql = "select *, a.`id` as idorder, a.`num_table` as numtable from `of_order` as a, `of_order_detail` as b, `of_food` as c, `of_category` as d, `of_department` as e where a.`id`=b.`order_id` and b.`food_id`=c.`id` and c.`category_id`=d.`id` and d.`department_id`=e.`id` and a.`active`=2 and b.`active`=2 and e.`solve_department`={$admin_id} GROUP BY b.`order_id` order by a.`id` asc";
		return $query = mysqli_query($link,$sql);
	}
	
	//Select in Home(Bếp)
	function selectSomething2_HomeBack($link, $admin_id)
	{
		$sql = "select Max(a.`id`) as idmax from `of_order` as a, `of_order_detail` as b, `of_food` as c, `of_category` as d, `of_department` as e where a.`id`=b.`order_id` and b.`food_id`=c.`id` and c.`category_id`=d.`id` and d.`department_id`=e.`id` and a.`active`=2 and e.`solve_department`={$admin_id}";
		$query = mysqli_query($link,$sql);
		return $value = mysqli_fetch_assoc($query);
	}
	
	//Query in Home(Bếp)
	function selectSomething3_HomeBack($link, $admin_id, $id)
	{
		$sql = "select a.*,b.`vi_name` as ten, a.`food_id` as id_food from `of_order_detail` as a, `of_food` as b, `of_category` as c, `of_department` as d where a.`food_id`=b.`id` and b.`category_id`=c.`id` and c.`department_id`=d.`id` and a.`active`=2 and d.`solve_department`={$admin_id} and a.`order_id`={$id} GROUP BY a.`id`";
	    return $query = mysqli_query($link,$sql);
	}
	
	//Select Món Trùng in Home(Bếp)
	function selectSomething4_HomeBack($idbandau, $orderID)
	{
		return $sql = "select b.`vi_name`,SUM(qty) as qty_sum from `of_order_detail` as a, `of_food` as b where a.`food_id` = b.`id` and a.`active`=2 and a.`order_id`>={$idbandau} and a.`order_id`<={$orderID} and (a.food_id=0";
	}
	
	//Query Note in Home(Bếp)
	function selectNote_HomeBack($link, $num_table)
	{
		$sql = "SELECT `note` FROM `of_note_order` as a , `of_order` as b WHERE  a.`order_id`=b.`id` and b.`num_table`={$num_table} and a.`active`=2";
		return $query = mysqli_query($link,$sql);
	}
	
	//Query in File CheckOrder
	function selectSomething_CheckOrder($link, $id)
	{
		$sql = "select a.*,b.`vi_name` as ten, a.`food_id` as id_food from `of_order_detail` as a,`of_food` as b where `order_id`={$id} and a.`food_id` = b.`id` and a.`active`=2";
        return $query = mysqli_query($link,$sql);
	}
	
	//Query in File CheckOrder
	function selectSomething2_CheckOrder($link, $id)
	{
		$sql = "select a.*,b.`vi_name` as ten, a.`food_id` as id_food from `of_order_detail` as a,`of_food` as b where `order_id`={$id} and a.`food_id` = b.`id`";
        return $query = mysqli_query($link,$sql);
	}
	
	//Query Trùng in File CheckOrder
	function selectSomething3_CheckOrder()
	{
		return $sql = "select a.*, b.`vi_name`, c.`num_table` from `of_order_detail` as a, `of_food` as b, `of_order` as c where a.`food_id`=b.`id` and a.`order_id`=c.`id` and a.`active`=2 and (a.`food_id`=0";
	}
?>