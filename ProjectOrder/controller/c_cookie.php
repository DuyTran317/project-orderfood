<?php	
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