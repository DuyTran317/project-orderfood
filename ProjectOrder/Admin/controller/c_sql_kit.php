<?php
	//sql insert kit
	function insert_kit($account,$pass,$name,$cate,$active)
	{
		 @$sql_user = "insert into `of_manage` VALUES (NULL ,'{$account}','{$pass}','{$name}','{$cate}','{$active}')";
		 return $sql_user;
	}
	//sql update kit
	function up_kit_on($account,$pass,$name)
	{
		$sql_edit="update `of_manage` set `account`='$account',`password`='$pass',`name`='$name' WHERE id={$_POST['suaid']}";
		return $sql_edit;
	}
	function up_kit_noon($account,$name)
	{
		$sql_edit="update `of_manage` set `account`='$account',`name`='$name' WHERE id={$_POST['suaid']}";
		return $sql_edit;
	}
	//sql delete
	function sql_delete_kit($table)
	{
		 $sql_del="delete from {$table} where `id`='{$_GET['del']}'";
		 return $sql_del;
	}
	//sql update active
	function active_show_kit($table)
	{
		 $sql = "update {$table} set `active`=1 where id='{$_GET['actives']}' ";
		 return $sql;
	}
	function active_hide_kit($table)
	{
		$sql = "update {$table} set `active`=0 where id='{$_GET['activeh']}' ";
		return $sql;
	}


?>