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
                    window.location.href="process_slide-del-"+id+".html";});
            }
        })

    }
</script>
     
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Danh Sách
            <small>Slide</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="trang-chu.html"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
            <li><a href="danh-sach-slide.html">slide</a></li>
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
                                <th>Tên VN</th>
                                <th>Tên EN</th>
                                <th>Hình</th>
                                <th><a href="them-slide.html">Thêm</a></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php

                            $sql_user = "select * from of_slider";
                            $i=1;
                            $kq_user = mysqli_query($link,$sql_user);
                            while($d_user=mysqli_fetch_assoc($kq_user))
                            {
                                ?>
                                <tr>
                                    <td><?= $i++; ?></td>
                                    <td><?= $d_user['vi_name'] ?></td>
                                    <td><?= $d_user['en_name'] ?></td>
                                    <td><img src="../img/slider/<?= $d_user['img_url'] ?>" width="50" height="50"></td>
                                    <td><a href="edit_slide-<?= $d_user['id'] ?>.html">Sửa</a>/<a id="test_xoa" onclick="hoi(<?=$d_user['id'] ?>)" style="cursor: pointer">Xóa</a></td>
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