<?php
	//sql insert department
	function insert_de($vi_theloai,$en_theloai,$img_url,$thutu,$trangthai,$source)
	{
		@$sql_add = "insert into `of_department` VALUES(NULL,'{$vi_theloai}','{$en_theloai}','{$img_url}','{$thutu}','{$trangthai}','{$source}') ";
		
		return $sql_add;
	}
	//sql update department
	function update_de_img($vi_theloai,$en_theloai,$thutu,$trangthai,$img_url,$source,$id)
	{
		@$sql_edit="update `of_department` set `vi_name`='{$vi_theloai}',`en_name`='{$en_theloai}',`order`='{$thutu}',`active`='{$trangthai}',`img_url`='{$img_url}',`solve_department`='{$source}' where `id`={$id}";
		return $sql_edit;
	}
	function update_de_noimg($vi_theloai,$en_theloai,$thutu,$trangthai,$source,$id)
	{
		@$sql_edit="update `of_department` set `vi_name`='{$vi_theloai}',`en_name`='{$en_theloai}',`order`='{$thutu}',`active`='{$trangthai}',`solve_department`='{$source}' where `id`={$id}";
		return $sql_edit;
	}
	//sql delete
	function sql_delete_de($table)
	{
		 $sql_del="delete from {$table} where `id`='{$_GET['del']}'";
		 return $sql_del;
	}
	//sql active
	function active_show_de($table)
	{
		 $sql = "update {$table} set `active`=1 where id='{$_GET['actives']}' ";
		 return $sql;
	}
	function active_hide_de($table)
	{
		$sql = "update {$table} set `active`=0 where id='{$_GET['activeh']}' ";
		return $sql;
	}
?>