<?php 
session_start();
require_once("../../lib/connect.php");
include("../../controller/c_Pusher.php");
if(isset($_POST['ChangeActiveFood']))
{
	$id = 0;
	$id = $_POST['id'];
	$active = $_POST['active'];
	
	$sql="update `of_food` set `active`={$active} where `id`={$id}";
	$r= mysqli_query($link,$sql);
	
	/*sendPusher('161363aaa8197830a033', '46f2ba3b258f514f6fc7', '577033', 'Reload', 'loadmenu');	*/		
	sendPusher('161363aaa8197830a033', '46f2ba3b258f514f6fc7', '577033', 'Reload', 'loadchitiet');
	
	if($active == 2)
	{
		$sql = "select b.`num_table` as soban, b.`id` as id_order from `of_order_detail` as a inner join `of_order` as b on a.`order_id`=b.`id`
		where a.`food_id`={$id} and a.`active`!=1";
		$query = mysqli_query($link,$sql);
		while($show_soban = mysqli_fetch_assoc($query))
		{
			$soban = $show_soban['soban'];
			sendPusher2('161363aaa8197830a033', '46f2ba3b258f514f6fc7', '577033', 'Reload', 'loadmenu3',$soban);						
		}					
		
		$sql = "select `order_id` from `of_order_detail` where `food_id` ={$id}";
		$imply = mysqli_query($link,$sql);							
		
		while($take_idorder = mysqli_fetch_assoc($imply)):
			$sql = "select `food_id` from `of_order_detail` where `order_id` = {$take_idorder['order_id']}";
			$query_foodID = mysqli_query($link,$sql);
			if(mysqli_num_rows($query_foodID) == 1)
			{		
				$sql = "delete from `of_order` where `id` ={$take_idorder['order_id']}";
				mysqli_query($link,$sql);
				
				$sql = "delete from `of_bill` where `order_id` ={$take_idorder['order_id']}";
				mysqli_query($link,$sql);
			}			
		endwhile;
		
		
		//lay order_id check con mon chua hoan thanh k
		$sql = "select `order_id` from `of_order_detail` where `food_id` ={$id} and `active` != 1";
		$run = mysqli_query($link, $sql);
		while($hold_orderId = mysqli_fetch_assoc($run))
		{
			$orderID_holder = $hold_orderId['order_id'];
			
			$sql = "delete from `of_order_detail` where `food_id` ={$id} and `active`!=1";
			mysqli_query($link,$sql);								
			
			$sql = "select `order_id` from `of_order_detail` where `order_id` ={$orderID_holder} and `active`=!1";
			$check=mysqli_query($link,$sql);
			
			
			
				if(mysqli_num_rows($check) == 0)
				{				
						$sql = "update `of_order` set `active` = 1 where `id` = {$orderID_holder}";
						mysqli_query($link,$sql);				
				}
		}
	}
}
// check session i
if(isset($_POST['act']) && $_POST['act'] == 1 && isset($_POST['status']))
{
    if($_POST['status'] == "turn on") {
        if(isset($_POST['value']) && $_POST['value']) $_SESSION['i'] = $_POST['value'];
    }
    else
        if($_POST['status'] == "turn off")
        {
            $_SESSION['i'] = -1;
        }
}

if(isset($_POST['role']))
{
	if($_POST['role']==1)
	$_SESSION['nut_montrung']=1;
	if($_POST['role']==0)
	$_SESSION['nut_montrung']=0;
}
?>