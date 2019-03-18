<?php
	if(isset($_POST['Chuyen_Ban']) && $_POST['table_to']!=$_POST['table_from'])
	{
		$r_from = select_ChangeTable($link, $_POST['table_from']);
		$r_to = select_ChangeTable($link, $_POST['table_to']);
		if(@mysqli_num_rows($r_from))
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
	else
	if(isset($_POST['Gop_Ban']) && $_POST['table_to']!=$_POST['table_from'])
	{
		$rs1 = changeTable($link, $_POST['table_from']);
		
		$rs2 = changeTable($link, $_POST['table_to']);
		
		$r_sol = queryChangeTable($link, $rs1['order_id'], $rs2['order_id']);
		$rs_sol = @mysqli_num_rows($r_sol);
		
		if($rs1 && $rs2 && $rs_sol == 0)
		{
			$sql_upd="update `of_bill` set `total` = `total` + {$rs1['total']} where `num_table` = {$_POST['table_to']} and `active` = 0";
			mysqli_query($link,$sql_upd);
			
			if($rs1['active'] == 2 || $rs2['active'] == 2)
			{
				$sql_upd="update `of_order` set `active` = 2 where `id` = {$rs2['order_id']}";
				mysqli_query($link,$sql_upd);
				
				$sql_upd="update `of_note_order` set `order_id`={$rs2['order_id']}, `active`=2 where `order_id` = {$rs1['order_id']}";
				mysqli_query($link,$sql_upd);
			}
			else
			{
				$sql_upd="update `of_note_order` set `order_id`={$rs2['order_id']} where `order_id` = {$rs1['order_id']}";
				mysqli_query($link,$sql_upd);
			}
			
			$sql_upd="update `of_order_detail` set `order_id`={$rs2['order_id']} where `order_id` = {$rs1['order_id']}";
			mysqli_query($link,$sql_upd);
			
			$sql="delete from `of_bill` where `order_id` = {$rs1['order_id']}";
			mysqli_query($link,$sql);
			$sql="delete from `of_order` where `id` = {$rs1['order_id']}";
			mysqli_query($link,$sql);

		}
		else
		{
			?>
			<script>
            	alert("Vui lòng GỘP bàn sau khi các món ăn đã hoàn thành!");
            </script>
			<?php
		}
	}
?>
<style>
    html,
    body{
        height: 100%;
    }
</style>
<html>
<body style="background-image:-webkit-linear-gradient(90deg, #45b649 0%, #dce35b 100%); background-size:cover ;font-family: 'Anton', sans-serif;">
<div class="container" style="margin-top:2%" >
    <div class="row" style="background-color: #FFF; margin-top: 5%; border-radius: 20px; padding: 20px;">
        <a href="?mod=home_nhanvien" style="font-size:36px; color: black"><i class="fas fa-arrow-left"></i></a>
        <h1 style=" text-align:center;">Quản Lý Bàn</h1>
        <form method="post" action="">
        <table class="table">
            <tr>
                <th class="text-center" >
                    Từ Bàn
                </th>
                <th class="text-center">
                    Đến Bàn
                </th>
            </tr>
            <tr>
                <td align="center">
                	<?php
						$r = selectWithCondition_Act0($link, 'of_user', 2);
						if(mysqli_num_rows($r)==0)
						{
						?>
							<option>N/A</option>
                        <?php    
						}
						else
						{
						?>
                    	<select name="table_from" style="width: 50px; height: 50px;" >
                        <?php
                        
							while($rs = mysqli_fetch_assoc($r))
							{
								?>
								<option value="<?=$rs['name']?>"><?=$rs['name']?></option>
								<?php
							}	
						?>							
                    	</select>
                        <?php
						}
                        ?>
                </td>
                <td align="center" >
                    <select name="table_to" style="width: 50px; height: 50px;">
                        <?php
						$select = selectWithoutConditionArray($link , 'of_user');
                        foreach($select as $rs)
                        {
                            ?>
                            <option value="<?=$rs['name']?>"><?=$rs['name']?></option>
                            <?php
                        }
                        ?>
                    </select>
                </td>
            </tr>

        </table>
            <div class="col-md-3 col-md-offset-3 col-xs-6">
                <input type="submit" name="Gop_Ban" value="Gộp" class="btn btn-info btn-lg col-xs-12" style="border-radius: 10px;" />
            </div>
            <div class="col-md-3 col-xs-6">
                <input type="submit" name="Chuyen_Ban" value="Chuyển" class="btn btn-primary btn-lg col-xs-12" style="border-radius: 10px;"/>
            </div>


        </form>
    </div>
</div>
</body>
</html>