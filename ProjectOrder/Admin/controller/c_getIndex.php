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

?>