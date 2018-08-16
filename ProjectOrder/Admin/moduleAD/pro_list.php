<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Danh Sách
            <small>Sản Phẩm</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="?mod=home"><i class="fa fa-dashboard"></i>Trang Chủ</a></li>
            <li><a href="?mod=pro_list">Sản phẩm</a></li>
            <li class="active">Danh sách</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <?php
                if(isset($_GET['mes'])==1)
                {?>
                    <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <strong>Chúc mừng!</strong> Bạn đã thêm thành công
                    </div>
                <?php }
                ?>
                <?php
                if(isset($_GET['mes2'])==2)
                {?>
                    <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <strong>Chúc mừng!</strong> Bạn đã sửa thành công
                    </div>
                <?php }
                ?>

                <?php
                if(isset($_GET['mes3'])==3)
                {?>
                    <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <strong>Chúc mừng!</strong> Bạn đã xóa thành công
                    </div>
                <?php }
                ?>
            <!-- general form elements disabled -->
            <div class="box box-warning">
                <div class="box-header with-border">
                    <h3 class="box-title">Thể Loại</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <form  name="form1" id="form1" method="post" >
                        <!-- select -->
                        <div class="form-group">
                            <select class="form-control" name="change" onchange="form1.submit();" style="border-radius: 5px 5px 5px 5px;">
                                <?php
                                if(isset($_POST['change'])) {
                                    $id = $_POST['change'];
                                }
                                else{
                                    $id=1;
                                }
                                $sql_cat = "select * from of_category";
                                $kq_cat = mysqli_query($link,$sql_cat);
                                while($d_cat=mysqli_fetch_assoc($kq_cat))
                                {?>
                                <option value="<?= $d_cat['id'] ?>" <?php if($d_cat['id']== $id) echo "selected"; ?>><?= $d_cat['name'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </form>
                </div></div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
            <div class="col-xs-12">
                <div class="box">

                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>STT</th>
                                <th>Hình</th>
                                <th>Tên</th>
                                <th>Giá</th>
                                <th>Trạng Thái</th>
                                <th>Sửa/Xóa</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $sql_pro = "select * from of_food WHERE category_id=$id";
                            $i=1;
                            $kq_pro = mysqli_query($link,$sql_pro);
                            while($d_pro=mysqli_fetch_assoc($kq_pro))
                            {?>
                            <tr>
                                <td><?php echo $i++; ?></td>
                                <td> <img src="../img/sp/<?php echo $d_pro['img_url']; ?>" alt="Chưa có Hình" width="120" height="100"></td>
                                <td><?php echo $d_pro['name'] ?></td>
                                <td> <?php echo number_format($d_pro['price']) ?> VNĐ</td>
                                <td><?php if($d_pro['active']==0) {echo "<a href=\"?mod=process_pro&actives={$d_pro['id']}\" data-toggle=\"tooltip\" title=\"Ẩn\">X</a>";}
                                    else
                                    {
                                        echo "<a href=\"?mod=process_pro&activeh={$d_pro['id']}\"><i class=\"fa fa-eye\" data-toggle=\"tooltip\" title=\"Hiện\"></i></a>";
                                    }
                                    ?></td>
                                <td><a href="?mod=edit_pro&edit=<?php echo $d_pro['id'] ?>">Sửa</a>/<a href="?mod=process_pro&del=<?php echo $d_pro['id'] ?>">Xóa</a></td>
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
<!-- /.content-wrapper --><?php  ?>