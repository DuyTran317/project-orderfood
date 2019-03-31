<?php 
//lay cookie
/*function getCookie(string $cookie)
{
	if(isset($_COOKIE[$cookie]))
	{
		$value = $_COOKIE[$cookie]
		return $value;

	}
	else
	{
		return null;
	}
}*/

function getFectch($link,$table)
{	
	$kq = array();
	$sql_user = "select * from {$table} ";
	$kq_user = mysqli_query($link,$sql_user);
	while ($temp = mysqli_fetch_assoc($kq_user)){
		$kq[] = $temp;
	}
	return $kq;
}
//get list of_food
function sql_select_pro($link,$table,$id)
{
	$kq = array();
	$sql_pro = "select * from `{$table}` WHERE `category_id`={$id}";
	$kq_pro = mysqli_query($link,$sql_pro);
	while ($temp = mysqli_fetch_assoc($kq_pro)){
		$kq[] = $temp;
	}
	return $kq;
}
?>