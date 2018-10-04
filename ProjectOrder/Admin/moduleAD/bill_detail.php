<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Chi Tiết
            <small>Hóa Đơn</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href=""><i class="fa fa-dashboard"></i>Trang chủ</a></li>
            <li><a href="">Hóa Đơn</a></li>
            <li class="active">Chi Tiết</li>
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
                    <h3>Mã Hóa Đơn: <?=$r['code_order']?></h3>
                        <table class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>STT</th>
                                <th>Tên Món Ăn</th>
                                <th>Giá Tiền</th>
                                <th>Số Lượng</th>
                                <th>Thành Tiền (VND)</th>
                                
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
                               	<td><?= $d_bill['vi_name'] ?></td>
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
                        	<p style="font-size:20px; font-weight:bold;">Tổng thành tiền (VND): <?=number_format($total)?></p><br />
                            <a href="?mod=print_order&id=<?=$id?>&mhd=<?=$mahd?>"><button class="btn btn-primary" style="float:right; font-size:18px">Xem bản in hóa đơn</button><hr /></a>
                       <a href="?mod=bill_list">Trở về danh sách hóa đơn</a>
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