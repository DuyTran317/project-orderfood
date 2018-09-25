<script type="text/javascript">
    function hoi(id){
        swal({
            title: 'Bạn có chắc chắn muốn xóa?',
            text: "Bạn có muốn xóa thể loại này",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Xóa!',
            cancelButtonText: 'Hủy!',
            confirmButtonClass: 'btn btn-success',
            cancelButtonClass: 'btn btn-danger',
            buttonsStyling: false,
            reverseButtons: true
        }).then((result) => {
            if (result.value) {
                swal(
                    'Xóa!',
                    'Bạn đã xóa thành công!',
                    'success'
                ).then(function(){
                    window.location.href="?mod=process_bill&mahd="+id;});
            } else if (
                // Read more about handling dismissals
            result.dismiss === swal.DismissReason.cancel
            ) {
                swal(
                    'Hủy',
                    'Bạn đã hủy thành công :)',
                    'error'
                )
            }
        })

    }
</script>
<script src="../jqueryUI/jquery-ui-admin.js"></script>
<?php
    if(isset($_POST['datefrom']))
    {
        $datefrom=$_POST['datefrom'];
        
        //Chuyen format $dob tu dd/mm/yyyy -> yyyy-mm-dd
        $d= substr($datefrom,0,2);
        $m= substr($datefrom,3,2);
        $y= substr($datefrom,6,4);
        
        $datefrom="{$y}-{$m}-{$d} 00:00:00";     
    }
    if(isset($_POST['dateto']))
    {
        $dateto=$_POST['dateto'];
        
        //Chuyen format $dob tu dd/mm/yyyy -> yyyy-mm-dd
        $d= substr($dateto,0,2);
        $m= substr($dateto,3,2);
        $y= substr($dateto,6,4);
        
        $dateto="{$y}-{$m}-{$d} 23:59:59";

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
             <div class="row center" style="text-align:left; margin-left: 15px; ">
                    <form action="?mod=bill_list" method="post">
                        <strong>Từ:</strong>  <input type="text" id="datefrom" style="margin-right:50px;margin-left:20px;" class="datefrom" name="datefrom" readonly />
                        <strong>Đến:</strong> <input type="text" style="margin-right:25px;margin-left:20px;" class="dateto" name="dateto" id="dateto" readonly />
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
                            if(isset($_POST['datefrom'])&&isset($_POST['dateto'])){
                                 if($datefrom>$dateto)
                                    {
                                        echo "<script type='text/javascript'>";
                                            echo "setTimeout(function () { swal('Lỗi',
                                                          'Bạn hãy chọn đúng ngày!',
                                                          'error');";
                                            echo "},1);</script>";
                                        }
                            $sql_bill = "select * from of_bill where `date` <= '{$dateto}' and `date` >= '{$datefrom}' ";
                            $i=1;
                            $kq_bill = mysqli_query($link,$sql_bill);
                        }else{
                            $sql_bill = "select * from of_bill";
                            $i=1;
                            $kq_bill = mysqli_query($link,$sql_bill);
                        }
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
                                <td><a href="?mod=bill_detail&id=<?= $d_bill['order_id'] ?>&mahd=<?= $d_bill['id'] ?>">Chi Tiết</a>/<a id="test_xoa" href="#" onclick="hoi(<?=$d_bill['id'] ?>)">Xóa</a></td>
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
<?php
    if(isset($_POST['datefrom']))
    {
        $datefrom=$_POST['datefrom'];
        
        //Chuyen format $dob tu dd/mm/yyyy -> yyyy-mm-dd
        $d= substr($datefrom,0,2);
        $m= substr($datefrom,3,2);
        $y= substr($datefrom,6,4);
        
        $fdatefrom="{$d}/{$m}/{$y}";     
    }
    if(isset($_POST['dateto']))
    {
        $dateto=$_POST['dateto'];
        
        //Chuyen format $dob tu dd/mm/yyyy -> yyyy-mm-dd
        $d= substr($dateto,0,2);
        $m= substr($dateto,3,2);
        $y= substr($dateto,6,4);
        
        $fdateto="{$d}/{$m}/{$y}";

    }   

?>