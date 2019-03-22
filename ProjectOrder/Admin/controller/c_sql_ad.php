<?php
	//sql update admin
	function up_ad_pass($pass,$level)
	{
		$sql_edit="update `of_admin` set `password`='{$pass}', `cate`= '{$level}' WHERE id={$_POST['suaid']}"; 
		return $sql_edit;
	}
	function up_ad_nopass($level)
	{
		$sql_edit="update `of_admin` set `cate`= '{$level}' WHERE id={$_POST['suaid']}";
		return $sql_edit;
	}
	function up_ad_on($pass)
	{
		$sql_edit="update `of_admin` set `password`='{$pass}', `cate`= '1' WHERE id={$_POST['suaid']}"; 
		return $sql_edit;
	}
	function up_ad_noon()
	{
		$sql_edit="update `of_admin` set `cate`= '1' WHERE id={$_POST['suaid']}";
		return $sql_edit;
	}
	function up_ad_null($pass)
	{
		  $sql_edit="update `of_admin` set `password`='{$pass}' WHERE id={$_POST['suaid']}"; 
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