<?php
	//sql insert discount
	function insert_dis($datefrom,$dateto,$discount,$trangthai)
	{
		$sql_add = "insert into `of_discount` VALUES(NULL,'{$datefrom}','{$dateto}','{$discount}','{$trangthai}')";
		return $sql_add;
	}
	//sql update discount
	function update_dis($datefrom,$dateto,$discount,$trangthai,$id)
	{
		 $sql_edit="update `of_discount` set `create_at`='{$datefrom}' ,`end_at`='{$dateto}',`discount`='{$discount}',`active`='{$trangthai}' where `id`={$id}";
		 return $sql_edit;
	}
	//sql delete
	function sql_delete_dis($table)
	{
		 $sql_del="delete from {$table} where `id`='{$_GET['del']}'";
		 return $sql_del;
	}
	//sql update active
	function active_show_dis($table)
	{
		 $sql = "update {$table} set `active`=1 where id='{$_GET['actives']}' ";
		 return $sql;
	}
	function active_hide_dis($table)
	{
		$sql = "update {$table} set `active`=0 where id='{$_GET['activeh']}' ";
		return $sql;
	}

?>