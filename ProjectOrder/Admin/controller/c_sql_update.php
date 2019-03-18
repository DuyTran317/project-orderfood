<?php 
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
//sql update category
function update_cat($department_id,$vi_theloai,$en_theloai,$thutu,$trangthai,$id)
{
	  @$sql_edit="update `of_category` set `department_id`={$department_id} ,`vi_name`='{$vi_theloai}',`en_name`='{$en_theloai}',`order`='{$thutu}',`active`='{$trangthai}' where `id`={$id}";
	  return $sql_edit;
}
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
//sql update production
function up_pro_img($theloai,$vi_tensp,$en_tensp,$gia,$new_price,$vi_noidung,$en_noidung,$thutu,$trangthai)
{
	$sql_edit = "update `of_food` set `category_id`= '{$theloai}',`vi_name`='{$vi_tensp}',`en_name`='{$en_tensp}',`price`='{$gia}',`price_discount`='{$new_price}',`discount`=0,`vi_desc`='{$vi_noidung}',`en_desc`='{$en_noidung}',`order`='{$thutu}',`active`='{$trangthai}'";
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
//sql update discount
function update_dis($datefrom,$dateto,$discount,$trangthai)
{
	 $sql_edit="update `of_discount` set `create_at`='{$datefrom}' ,`end_at`='{$dateto}',`discount`='{$discount}',`active`='{$trangthai}' where `id`={$id}";
	 return $sql_edit;
}
?>