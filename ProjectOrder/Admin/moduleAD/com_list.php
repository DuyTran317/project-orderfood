<script type="text/javascript">
    function hoi(id){
        swal({
            title: 'Bạn có chắc chắn muốn xóa?',
            text: "Bạn có muốn xóa bình luận này",
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
                    window.location.href="?mod=process_com&del="+id;});
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
            <small>Đánh Giá</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="trang-chu.html"><i class="fa fa-dashboard"></i>Trang chủ</a></li>
            <li><a href="danh-sach-danh-gia.html">Đánh giá</a></li>
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
                                <th>Bình Luận</th>
                                <th>Đánh Giá</th>
                                <th>Ngày Đánh Giá</th>
                                <th>Thời Gian Đánh Giá</th>
                                <th>Xóa</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php

                            $sql_cat = "select * from `of_rate`";
                            $i=1;
                            $kq_cat = mysqli_query($link,$sql_cat);
                            while($d_com=mysqli_fetch_assoc($kq_cat))
                            {
                                ?>
                                <tr>
                                    <td><?= $i++; ?></td>
                                    <td><?= $d_com['desc'] ?></td>
                                    <td><?php for($j=1;$j<= $d_com['star'];$j++) {?><i class="icon ion-ios-star"></i> <?php } ?></td>                                    <td><?= date("d/m/Y", strtotime( $d_com['date']))?></td>
                                    <td><?= date("H:i:s", strtotime( $d_com['date']))?></td>
                                    <td><a id="test_xoa" onclick="hoi(<?= $d_com['id'] ?>)" style="cursor: pointer">Xóa</a></td>
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