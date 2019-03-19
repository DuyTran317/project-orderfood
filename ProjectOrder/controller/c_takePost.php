<?php	
    //Take POST
	function takePost(string $post_value)
	{
		if(isset($_POST[$post_value]))
		{
			return $value = $_POST[$post_value];
		}
		else
		{
			return NULL;
		}
	}
?>