<?php
	//sql insert admin
	function insert_ad($account,$pass,$name,$cate,$active)
	{
		 @$sql_user = "insert into `of_admin` VALUES (NULL ,'{$account}','{$pass}','{$name}','{$cate}','{$active}')";
		 return $sql_user;
	}
	//sql update admin
	function up_ad_pass($pass,$ten,$level)
	{
		$sql_edit="update `of_admin` set  `password`='{$pass}',`name`='{$ten}', `cate`= '{$level}' WHERE id={$_POST['suaid']}"; 
		return $sql_edit;
	}
	function up_ad_nopass($ten,$level)
	{
		$sql_edit="update `of_admin` set `name`='{$ten}', `cate`= '{$level}' WHERE id={$_POST['suaid']}";
		return $sql_edit;
	}
	function up_ad_on($ten,$pass)
	{
		$sql_edit="update `of_admin` set `name`='{$ten}', `password`='{$pass}', `cate`= '1' WHERE id={$_POST['suaid']}"; 
		return $sql_edit;
	}
	function up_ad_noon($ten)
	{
		$sql_edit="update `of_admin` set `name`='{$ten}', `cate`= '1' WHERE id={$_POST['suaid']}";
		return $sql_edit;
	}
	function up_ad_null($ten,$pass)
	{
		  $sql_edit="update `of_admin` set `name`='{$ten}', `password`='{$pass}' WHERE id={$_POST['suaid']}"; 
		  return $sql_edit;
	} 
	function up_ad_null2($ten)
	{
		  $sql_edit="update `of_admin` set `name`='{$ten}' WHERE id={$_POST['suaid']}"; 
		  return $sql_edit;
	} 
	//sql update active
	function active_show($table)
	{
		 $sql = "update {$table} set `active`=1 where id='{$_GET['actives']}' ";
		 return $sql;
	}
	function active_hide($table)
	{
		$sql = "update {$table} set `active`=0 where id='{$_GET['activeh']}' ";
		return $sql;
	}
?>