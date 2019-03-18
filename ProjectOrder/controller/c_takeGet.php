<?php
	//Take GET
	function takeGet(string $get_value)
	{
		if(isset($_GET[$get_value]))
		{
			return $value = $_GET[$get_value];
		}
		else
		{
			return NULL;
		}
	}
	
?>