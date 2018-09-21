<script src="../jqueryUI/jquery-ui-admin.js"></script>
<?php
    if(isset($_POST['datefrom']))
    {
        $datefrom=$_POST['datefrom'];
        
        //Chuyen format $dob tu dd/mm/yyyy -> yyyy-mm-dd
        $d= substr($datefrom,0,2);
        $m= substr($datefrom,3,2);
        $y= substr($datefrom,6,4);
        
        $datefrom="{$y}-{$m}-{$d}";     
    }
    if(isset($_POST['dateto']))
    {
        $dateto=$_POST['dateto'];
        
        //Chuyen format $dob tu dd/mm/yyyy -> yyyy-mm-dd
        $d= substr($dateto,0,2);
        $m= substr($dateto,3,2);
        $y= substr($dateto,6,4);
        
        $dateto="{$y}-{$m}-{$d}";

    }   

?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Danh Sách
            <small>Hóa Đơn</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href=""><i class="fa fa-dashboard"></i>Trang chủ</a></li>
            <li><a href="">Hóa Đơn</a></li>
            <li class="active">Danh sách</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
             <div class="row center" style="text-align:left; margin-left: 5px; ">
                    <form action="?mod=bill_list" method="post">
                        <strong>Từ:</strong>  <input type="text" style="margin-right:50px;margin-left:20px" class="datefrom" name="datefrom" readonly />
                        <strong>Đến:</strong> <input type="text" style="margin-right:25px" class="dateto" name="dateto" readonly />
                        <button type="submit" class="btn btn-success">Tìm Chi Tiết</button>
                    </form>    
                </div><br>
            <div class="col-xs-12">
                <div class="box">

                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>STT</th>
                                <th>Mã  Hóa Đơn</th>
                                <th>Bàn</th>
                                <th>Tổng Tiền</th>
                                <th>Ngày Xuất</th>
                                <th>Giờ Xuất</th>
                                <th>Thao Tác</th>
                                
                            </tr>
                            </thead>
                            <tbody>
                            <?php

                            $sql_bill = "select * from of_bill";
                            $i=1;
                            $kq_bill = mysqli_query($link,$sql_bill);
                            while($d_bill=mysqli_fetch_assoc($kq_bill))
                            {
                            ?>
                            <tr>
                                <td><?= $i++; ?></td>
                                <td><?= $d_bill['id'] ?></td>
                               	<td><?= $d_bill['num_table'] ?></td>
                               	<td><?= number_format($d_bill['total']) ?></td>
                               	<td><?= date("d/m/Y", strtotime( $d_bill['date']))?></td> 
                                <td><?= date("H:i:s", strtotime( $d_bill['date']))?></td> 
                                <td><a href="?mod=bill_detail&id=<?= $d_bill['order_id'] ?>&mahd=<?= $d_bill['id'] ?>">Chi Tiết</a>/<a href="?mod=process_bill&mahd= <?= $d_bill['id'] ?>" onclick="return confirm('Bạn có chắc chắn muốn xóa hóa đơn này!')">Xóa</a></td>
                            </tr>
                            <?php } ?>

                            </tbody>
                        </table>
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