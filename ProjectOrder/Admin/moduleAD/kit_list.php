<script type="text/javascript">
    function hoi(id){
        swal({
            title: 'Bạn có chắc chắn muốn xóa?',
            text: "Bạn có muốn xóa ",
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
                    window.location.href="process_kit-del-"+id+".html";});
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
    
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Danh Sách
            <small>Bếp - Thanh Toán</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="trang-chu.html"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
            <li><a href="danh-sach-bep-thanh-toan.html">Bếp - Thanh Toán</a></li>
            <li class="active">Danh sách</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">

                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>STT</th>
                                <th>Account</th>
                                <th>Tên Người Dùng</th>
                                <th>Thuộc Danh Mục</th>
                                <th>Trạng Thái</th>
                                <th><a href="them-bep-thanhtoan.html">Thêm</a></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php

                            $sql_user = "select * from of_manage";
                            $i=1;
                            $kq_user = mysqli_query($link,$sql_user);
                            while($d_user=mysqli_fetch_assoc($kq_user))
                            {
                                ?>
                                <tr>
                                    <td><?= $i++; ?></td>
                                    <td><?= $d_user['account'] ?></td>
                                    <td><?= $d_user['name'] ?></td>
                                    <td>
										<?php
											if($d_user['cate']==1)
											{
												echo "Khu Bếp Nấu";
											}
											if($d_user['cate']==2)
											{
												echo "Khu Thanh Toán";
											}
											if($d_user['cate']==3)
											{
												echo "Bộ Phận Nhân Viên";
											}
											if($d_user['cate']==4)
											{
												echo "Khu Bếp Pha Chế";
											}
										?>
                                    </td>
                                    <td><?php if($d_user['active']==0) {echo "<a href=\"process-kit-s{$d_user['id']}.html\" data-toggle=\"tooltip\" title=\"Ẩn\">X</a>";}
                                        else
                                        {
                                            echo "<a href=\"process-kit-h{$d_user['id']}.html\"><i class=\"fa fa-eye\" data-toggle=\"tooltip\" title=\"Hiện\"></i></a>";
                                        }
                                        ?></td>
                                    <td><a href="edit_kit-<?= $d_user['id'] ?>.html">Sửa</a>/<a id="test_xoa" onclick="hoi(<?=$d_user['id'] ?>)" style="cursor: pointer">Xóa</a></td>
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
<?php unset($_SESSION['sua']); 
unset($_SESSION['them']); ?>