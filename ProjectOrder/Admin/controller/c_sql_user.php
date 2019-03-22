<?php
//sql insert user
	function insert_user($name,$active)
	{
		 @$sql_user = "insert into `of_user` VALUES (NULL ,'{$name}','{$active}')";
		 return $sql_user;
	}
	//sql delete
	function sql_delete_user($table)
	{
		 $sql_del="delete from {$table} where `id`='{$_GET['del']}'";
		 return $sql_del;
	}

	//sql update active
	function active_show_user($table)
	{
		 $sql = "update {$table} set `active`=1 where id='{$_GET['actives']}' ";
		 return $sql;
	}
	function active_hide_user($table)
	{
		$sql = "update {$table} set `active`=0 where id='{$_GET['activeh']}' ";
		return $sql;
	}
?>