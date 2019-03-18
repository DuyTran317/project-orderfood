<?php
	session_start();
	require_once("../../lib/connect.php");
	$act=0;

	if(isset($_POST['act'])){
		$act=$_POST['act'];
	}//$act == 1 check food    == 2 update qty food		== 3 remind custumer see menu
	if($act == 1)
	{
		if(isset($_POST['id_food']))
		{
			$id_food = $_POST['id_food'];
			@$cart=$_SESSION['cart'];
			if(isset($cart[$id_food]))
			{
				unset($cart[$id_food]);
			}
			else
			{
				$cart[$id_food]=1;
			}
			$_SESSION['cart'] = $cart;
		}
		echo count($_SESSION['cart']);
	}
	else
	if($act == 2)
	{
		$total = 0;
		if(isset($_POST['id_food']))
		{
			$id_food = $_POST['id_food'];
			$cart=$_SESSION['cart'];
			if(isset($_POST['qty']))
			{
				$cart[$id_food]=max(1,intval($_POST['qty']));
			}
			$_SESSION['cart'] = $cart;
			
			foreach($cart as $k => $v)
			{
				$sql = "select `price` from `of_food` where `id`={$k}";
				$r = mysqli_query($link,$sql);
				$rs = mysqli_fetch_assoc($r);
				$total += $rs['price']*$v;
			}
		}
		echo number_format($total);
	}
    else
        if($act == 3)
        {
            if(isset($_COOKIE['userid_login']) && $_COOKIE['userid_login'] != 0)
                {
                    echo 1;
                }
                else
                {
                    echo 0;
                }

        }
?>