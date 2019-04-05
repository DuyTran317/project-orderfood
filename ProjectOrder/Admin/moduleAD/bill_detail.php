<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <?=_DETAIL?>
            <small><?=_RECEIPT?></small>
        </h1>
        <ol class="breadcrumb">
            <li><a href=""><i class="fa fa-dashboard"></i><?=_HOME?></a></li>
            <li><a href=""><?=_RECEIPT?></a></li>
            <li class="active"><?=_DETAIL?></li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
               <?php 
			   $id=$_GET['id'];
			   $mahd=$_GET['mahd'];
			    ?>
	
                <div class="box">

                    <div class="box-body">
                    <?php
						$sql="select `code_order` from `of_bill` where `id` = {$mahd}";
						$rs=mysqli_query($link,$sql);
						$r=mysqli_fetch_assoc($rs);
					?>
                    <h3><?=_RECEIPT?>#: <?=$r['code_order']?></h3>
                        <table class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th><?=_DISH?></th>
                                <th><?=_PRICE?></th>
                                <th><?=_QTY?></th>
                                <th><?=_TOTAL?></th>
                                
                            </tr>
                            </thead>
                            <tbody>
                            <?php

                            $sql_bill = "select * from `of_order_detail` as A , `of_food` as B Where A.`food_id`=B.`id` and A.`order_id`={$id}";
                            $i=1;
							$total=0;
                            $kq_bill = mysqli_query($link,$sql_bill);
                            while($d_bill=mysqli_fetch_assoc($kq_bill))
                            {
                            ?>
                            <tr>
                                <td><?= $i++; ?></td>
                               	<td><?= $d_bill[$_SESSION['ad_lang'].'_name'] ?></td>
                               	<td><?= number_format($d_bill['price']) ?></td>
                                <td><?= $d_bill['qty'] ?></td>
                                <td><?= number_format($d_bill['price']*$d_bill['qty']) ?></td>
                            </tr>                                                       
                            <?php 
								//Tổng thành tiền
								$total += ($d_bill['price']*$d_bill['qty']);
							} 
							?>						
                            </tbody>
                        </table>
                        	<hr />
                        	<p style="font-size:20px; font-weight:bold;"><?=_TOTAL?> (VND): <?=number_format($total)?></p><br />
                            <a href="?mod=print_order&id=<?=$id?>&mhd=<?=$mahd?>"><button class="btn btn-primary" style="float:right; font-size:18px"><?=_VIEWRECEIPT?></button><hr /></a>
                       <a href="?mod=bill_list"><?=_BACK?></a>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->