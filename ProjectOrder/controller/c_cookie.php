<?php
	//Check Cookie when customers login
	function checkLoginCookie(string $cookie_login)
	{
		if(!isset($cookie_login))
		{
			header("location:login.html");
		}
	}
	
	//Check Cookie UserName & UserID when system solve find_food of customers
	function takeValueCookie(string $cookie_value)
	{
		if(isset($_COOKIE[$cookie_value]))
		{
			$value = $_COOKIE[$cookie_value];
			return $value;
		}
		else
		{
			return NULL;
		}
	}
?>