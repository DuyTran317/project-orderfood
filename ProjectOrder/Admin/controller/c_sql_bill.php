<?php
	function sql_delete($table)
{
	 $sql_del="delete from {$table} where `id`='{$_GET['del']}'";
	 return $sql_del;
}

?>