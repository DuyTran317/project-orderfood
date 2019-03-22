<?php
	if(! isset($_SESSION['admin_id']))
	{
		header("location:?mod=dangnhap");	
	}
	$id = takeGet('id');
	$num_table = takeGet('num_table');
	$id_food = takeGet('id_food');
	
	$kq = selectIdNum($link, 'of_order', $id, $num_table);
	$k = mysqli_fetch_assoc($rs);

	if($r['active']==0)
	{						
		$rs2 = selectActiveBill_OrActive($link, 'of_order_detail', $id, 1);
		if(mysqli_num_rows($rs2)==0)
		{			
			$rs = selectActiveBill_OrActive($link, 'of_order_detail', $id, 0);
			
			$dem = mysqli_num_rows($rs);
			if($dem==1)
			{
				$sql="delete from `of_order` where `id`={$id} and `active`=0";
				mysqli_query($link,$sql);
				
				$sql="delete from `of_order_detail` where `active`=0 and `order_id`={$id} and `id`={$id_food}";
				mysqli_query($link,$sql);			
							
				$sql="delete from `of_note_order` where `order_id`={$id} and `active`=0";
				mysqli_query($link,$sql);
			}	
			else
			{
				$sql="delete from `of_order_detail` where `active`=0 and `order_id`={$id} and `id`={$id_food}";
				mysqli_query($link,$sql);												
			}
		}
		else
		{
			$rs = selectActiveBill_OrActive($link, 'of_order_detail', $id, 0);
			
			$dem = mysqli_num_rows($rs);
			if($dem==1)
			{				
				$sql="update `of_order` set `active`=1 where `id`={$id}";
				mysqli_query($link,$sql);
				
				$sql="delete from `of_order_detail` where `active`=0 and `order_id`={$id} and `id`={$id_food}";
				mysqli_query($link,$sql);	
				
				$sql="delete from `of_note_order` where `order_id`={$id} and `active`=0";
				mysqli_query($link,$sql);
			}
			else
			{				
				$sql="delete from `of_order_detail` where `active`=0 and `order_id`={$id} and `id`={$id_food}";
				mysqli_query($link,$sql);					
			}
		}
	}
	
	//pussher
	sendPusher2('0d68e38f87eb0271863b', '276ddaf41f63aa27e778', '636611', 'Reload', 'delfood',$num_table);
	header("location:?mod=confirm_order&id=$id&num_table=$num_table");
?>