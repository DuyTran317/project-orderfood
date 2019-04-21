<?php
	//sql insert category
	function insert_cate($department_id,$vi_theloai,$en_theloai,$thutu,$trangthai)
	{
		@$sql_add = "insert into `of_category` VALUES(NULL,'{$department_id}','{$vi_theloai}','{$en_theloai}','{$thutu}','{$trangthai}') ";
		
		return $sql_add;
	}
	//sql update category
	function update_cate($department_id,$vi_theloai,$en_theloai,$thutu,$trangthai,$id)
	{
		  @$sql_edit="update `of_category` set `department_id`={$department_id} ,`vi_name`='{$vi_theloai}',`en_name`='{$en_theloai}',`order`='{$thutu}',`active`='{$trangthai}' where `id`={$id}";
		  return $sql_edit;
	} 
	//sql delete
	function sql_delete_cate($table)
	{
		 $sql_del="delete from {$table} where `id`='{$_GET['del']}'";
		 return $sql_del;
	}
	//sql update active
	function active_show_cate($table)
	{
		 $sql = "update {$table} set `active`=1 where id='{$_GET['actives']}' ";
		 return $sql;
	}
	function active_hide_cate($table)
	{
		$sql = "update {$table} set `active`=0 where id='{$_GET['activeh']}' ";
		return $sql;
	}
	function selectAllCate($link)
	{
		$kq = array();
		$sql = "select * from `of_category` where `active` = 1";
		$r = mysqli_query($link,$sql);
		while($rs = mysqli_fetch_assoc($r))
		{
			$kq[]=$rs;
		}
		return $kq;
	}
?>
