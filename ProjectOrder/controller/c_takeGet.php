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
	
	//Take POST
/*	function takePost(string $post_value)
	{
		if(isset($_POST[$post_value]))
		{
			return $value = $_GET[$post_value];
		}
		else
		{
			return NULL;
		}
	}*/
?>