<?php
	//sql insert production
	function insert_pro($theloai,$vi_tensp,$en_tensp,$gia,$vi_noidung,$en_noidung,$img_url,$img_url2,$img_url3,$img_url4,$thutu,$trangthai)
	{
		$sql_img = "insert into of_food(`id`,`category_id`,`vi_name`,`en_name`,`price`,`price_discount`,`discount`,`vi_desc`,`en_desc`,`img_url`,`img_url2`,`img_url3`,`img_url4`,`order`,`active`)  VALUES(NULL ,'$theloai','$vi_tensp','$en_tensp','$gia',0,0,
    '$vi_noidung','$en_noidung','$img_url','$img_url2','$img_url3','$img_url4','$thutu','$trangthai')";
    return $sql_img;
	}
	//sql update production
	function up_pro_img($theloai,$vi_tensp,$en_tensp,$gia,$vi_noidung,$en_noidung,$thutu,$trangthai)
	{
		$sql_edit = "update `of_food` set `category_id`= '{$theloai}',`vi_name`='{$vi_tensp}',`en_name`='{$en_tensp}',`price`='{$gia}',`price_discount`=0,`discount`=0,`vi_desc`='{$vi_noidung}',`en_desc`='{$en_noidung}',`order`='{$thutu}',`active`='{$trangthai}'";
		return $sql_edit;
	}
	//sql delete
	function sql_delete_pro($table)
	{
		 $sql_del="delete from {$table} where `id`='{$_GET['del']}'";
		 return $sql_del;
	}
	//sql update active
	function active_show_pro($table)
	{
		 $sql = "update {$table} set `active`=1 where id='{$_GET['actives']}' ";
		 return $sql;
	}
	function active_hide_pro($table)
	{
		$sql = "update {$table} set `active`=0 where id='{$_GET['activeh']}' ";
		return $sql;
	}

?>