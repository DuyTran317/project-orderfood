<?php 
//sql delete
	function sql_delete_com($table)
{
	 $sql_del="delete from {$table} where `id`='{$_GET['del']}'";
	 return $sql_del;
}
//sql update active
function active_show_com($table)
{
	 $sql = "update {$table} set `active`=1 where id='{$_GET['actives']}' ";
	 return $sql;
}
function active_hide_com($table)
{
	$sql = "update {$table} set `active`=0 where id='{$_GET['activeh']}' ";
	return $sql;
}
?>