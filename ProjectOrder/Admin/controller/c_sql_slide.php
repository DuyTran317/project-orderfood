<?php
	//sql insert side
	function insert_slide($tenslidevi,$tenslideen,$noidungvi,$noidungen,$img_url,$date){
		 @$sql_add = "insert into `of_slider` VALUES(NULL,'{$tenslidevi}','{$tenslideen}','{$noidungvi}','{$noidungen}','{$img_url}','{$date}')";
		 return  $sql_add;
	}
	//sql update  slide
	function up_slide_img($suatenslidevi,$suatenslideen,$suanoidungvi,$suanoidungen,$img_url)
	{
		 $sql_edit="update `of_slider` set `vi_name`='{$suatenslidevi}',`en_name`='{$suatenslideen}',`vi_content`='{$suanoidungvi}',`en_content`='{$suanoidungen}',`img_url`='{$img_url}'where `id`={$_POST['id']}";
		 return $sql_edit;
	}
	function up_slide_noimg($suatenslidevi,$suatenslideen,$suanoidungvi,$suanoidungen)
	{
		 $sql_edit="update `of_slider` set `vi_name`='{$suatenslidevi}',`en_name`='{$suatenslideen}',`vi_content`='{$suanoidungvi}',`en_content`='{$suanoidungen}' where `id`={$_POST['id']}";
		 return $sql_edit;
	}
	//sql  delete
	function sql_delete_slide($table)
	{
		 $sql_del="delete from {$table} where `id`='{$_GET['del']}'";
		 return $sql_del;
	}
	//sql update active
	function active_show_slide($table)
	{
		 $sql = "update {$table} set `active`=1 where id='{$_GET['actives']}' ";
		 return $sql;
	}
	function active_hide_slide($table)
	{
		$sql = "update {$table} set `active`=0 where id='{$_GET['activeh']}' ";
		return $sql;
	}

?>