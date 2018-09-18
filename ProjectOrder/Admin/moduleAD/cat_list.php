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
                    window.location.href="?mod=process_cat&del="+id;});
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
<?php if(isset($_SESSION['sua'] )== 'suathanhcong') {
            echo "<script type='text/javascript'>";
            echo "setTimeout(function () { swal('Sửa Thành Công',
                          'Bạn sửa thành công',
                          'success');";
            echo "},1);</script>";
        }?>
 <?php if(isset($_GET['mes'] )==1) {
            echo "<script type='text/javascript'>";
            echo "setTimeout(function () { swal('Thêm Thành Công',
                          'Bạn đã thêm thành công',
                          'success');";
            echo "},1);</script>";
        }?>      
<div class="wrapper"> 
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Danh Sách
            <small>Thể loại</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="?mod=home"><i class="fa fa-dashboard"></i>Trang chủ</a></li>
            <li><a href="?mod=cat_list">Thể Loại</a></li>
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
                                <th>Hình</th>
                                <th>Tên Thể Loại</th>
                                <th>Trạng Thái</th>
                                <th><a href="?mod=add_cat">Thêm</a></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php

                            $sql_cat = "select * from of_category";
                            $i=1;
                            $kq_cat = mysqli_query($link,$sql_cat);
                            while($d_cat=mysqli_fetch_assoc($kq_cat))
                            {
                            ?>
                            <tr>
                                <td><?= $i++; ?></td>
                                 <td> <img src="../img/cate/<?php echo $d_cat['img_url']; ?>" alt="Chưa có Hình" width="120" height="100"></td>
                                <td><?= $d_cat['name'] ?></td>
                                <td><?php if($d_cat['active']==0) {echo "<a href=\"?mod=process_cat&actives={$d_cat['id']}\" data-toggle=\"tooltip\" title=\"Ẩn\">X</a>";}
                                    else
                                    {
                                        echo "<a href=\"?mod=process_cat&activeh={$d_cat['id']}\"><i class=\"fa fa-eye\" data-toggle=\"tooltip\" title=\"Hiện\"></i></a>";
                                    }
                                    ?></td>
                                <td><a href="?mod=edit_cat&edit=<?= $d_cat['id'] ?>">Sửa</a>/<a id="test_xoa" href="#" onclick="hoi(<?=$d_cat['id'] ?>)">Xóa</a></td>
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
</div>
<!-- /.content-wrapper -->
<?php unset($_SESSION['sua']); ?>