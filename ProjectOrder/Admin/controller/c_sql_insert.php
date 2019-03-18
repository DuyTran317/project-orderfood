<?php
	//sql insert department
	function insert_de($vi_theloai,$en_theloai,$img_url,$thutu,$trangthai,$source)
	{
		@$sql_add = "insert into `of_department` VALUES(NULL,'{$vi_theloai}','{$en_theloai}','{$img_url}','{$thutu}','{$trangthai}','{$source}') ";
		
		return $sql_add;
	}
	//sql insert category
	function insert_cat($department_id,$vi_theloai,$en_theloai,$thutu,$trangthai)
	{
		@$sql_add = "insert into `of_category` VALUES(NULL,'{$department_id}','{$vi_theloai}','{$en_theloai}','{$thutu}','{$trangthai}') ";
		
		return $sql_add;
	}
	//sql insert kit
	function insert_kit($account,$pass,$name,$cate,$active)
	{
		 @$sql_user = "insert into `of_manage` VALUES (NULL ,'{$account}','{$pass}','{$name}','{$cate}','{$active}')";
		 return $sql_user;
	}
	//sql insert side
	function insert_slide($tenslidevi,$tenslideen,$noidungvi,$noidungen,$img_url,$date){
		 @$sql_add = "insert into `of_slider`(`id`,`vi_name`,`en_name`,`vi_content`,`en_content`,`img_url`,`create_at`) VALUES(NULL,'{$tenslidevi}','{$tenslideen}','{$noidungvi}','{$noidungen}','{$img_url}','{$date}')";
		 return  $sql_add;
	}
	//sql insert user
	function insert_user($name,$active)
	{
		 @$sql_user = "insert into `of_user` VALUES (NULL ,'{$name}','{$active}')";
		 return $sql_user;
	}
	//sql insert production
	function insert_pro($theloai,$theloai,$en_tensp,$gia,$new_price,$vi_noidung,$en_noidung,$img_url,$img_url2,$img_url3,$img_url4,$thutu,$trangthai)
	{
		$sql_img = "insert into of_food(`id`,`category_id`,`vi_name`,`en_name`,`price`,`price_discount`,`discount`,`vi_desc`,`en_desc`,`img_url`,`img_url2`,`img_url3`,`img_url4`,`order`,`active`)  VALUES(NULL ,'$theloai','$theloai','$en_tensp','$gia','$new_price',0,
    '$vi_noidung','$en_noidung','$img_url','$img_url2','$img_url3','$img_url4','$thutu','$trangthai')";
    return $sql_img;
	}
	//sql insert discount
	function insert_dis($datefrom,$dateto,$discount,$trangthai)
	{
		$sql_add = "insert into `of_discount` VALUES(NULL,'{$datefrom}','{$dateto}','{$discount}','{$trangthai}')";
		return $sql_add;
	}
?>