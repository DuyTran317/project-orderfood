<?php
	if(isset($_POST['Chuyen_Ban']))
	{
		$sql = "select a.`id`, a.`num_table` from `of_order` as a left join `of_bill` as b on a.`id` = b.`order_id` where a.`num_table` = {$_POST['table_from']} and (a.`active` <> 1 or b.`active` <> 1)";
		$r_from= mysqli_query($link,$sql);
		$sql = "select a.`id`, a.`num_table` from `of_order` as a left join `of_bill` as b on a.`id` = b.`order_id` where a.`num_table` = {$_POST['table_to']} and (a.`active` <> 1 or b.`active` <> 1)";
		$r_to= mysqli_query($link,$sql);
		if(mysqli_num_rows($r_from))
		{
			$rs_from = mysqli_fetch_assoc($r_from);
			
			$sql = "update `of_bill` set `num_table` = {$_POST['table_to']} where `order_id` = {$rs_from['id']} and `active` <> 1";
			$r_upbill = mysqli_query($link,$sql);
			
			$sql = "update `of_solve_pay` set `num_table` = {$_POST['table_to']} where `order_id` = {$rs_from['id']} and `active` <> 1";
			$r_upsolve = mysqli_query($link,$sql);
			
			$sql = "update `of_order` set `num_table` = {$_POST['table_to']} where `id` = {$rs_from['id']}";
			$r_uporder = mysqli_query($link,$sql);
		}
		if(mysqli_num_rows($r_to))
		{
			$rs_to = mysqli_fetch_assoc($r_to);
			
			$sql = "update `of_bill` set `num_table` = {$_POST['table_from']} where `order_id` = {$rs_to['id']} and `active` <> 1";
			$r_upbill = mysqli_query($link,$sql);
			
			$sql = "update `of_solve_pay` set `num_table` = {$_POST['table_from']} where `order_id` = {$rs_to['id']} and `active` <> 1";
			$r_upsolve = mysqli_query($link,$sql);
			
			$sql = "update `of_order` set `num_table` = {$_POST['table_from']} where `id` = {$rs_to['id']}";
			$r_uporder = mysqli_query($link,$sql);
		}
	}
?>
<form method="post" action="">
Từ Bàn:
<select name="table_from">
	<?php 
		$sql = "select `name` from `of_user`";
		$r = mysqli_query($link,$sql);
		while($rs = mysqli_fetch_assoc($r))
		{
		?>
			<option value="<?=$rs['name']?>"><?=$rs['name']?></option>";
		<?php
        }
	 ?>
</select>
Đến Bàn:
<select name="table_to">
	<?php 
		$r = mysqli_query($link,$sql);
		while($rs = mysqli_fetch_assoc($r))
		{
		?>
			<option value="<?=$rs['name']?>"><?=$rs['name']?></option>";
		<?php
        }
	 ?>
</select>
<input type="submit" name="Chuyen_Ban" value="Chuyển" />
</form>