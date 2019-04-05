<?php if(isset($_SESSION['fail'] )== 'thatbai') {
            echo "<script type='text/javascript'>";
            echo "setTimeout(function () { swal('Thêm thất bại',
                          'Số bàn đã có rồi! xin mới nhập lại',
                          'warning');";
            echo "},1);</script>";
        }?>
<div class="wrapper">
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <?=_ADD?>
            <small><?=_TABLE?></small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="trang-chu.html"><i class="fa fa-dashboard"></i><?=_HOME?></a></li>
            <li><a href="danh-sach-ban.html"><?=_TABLE?></a></li>
            <li class="active"><?=_ADD?></li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">

                <!-- general form elements -->
                <div class="box box-primary">
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form1" action="process-user.html" method="post" enctype="multipart/form-data">
                        <div class="box-body"><div>
                            <div class="form-group">
                                <label for="exampleInputPassword1"><?=_NAME?> <span style="color:#F00" >(*)</span></label>
                                <input type="number" class="form-control" id="username" name="username" required placeholder="<?=_ENTERTABNAME?>" value=""><span id="thongbao"></span>
                            </div>     </div>                      
                            <div class="form-group">
                                <label for="exampleInputEmail1"><?=_STATUS?>: <span style="color:#F00" >(*)</span></label>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="trangthai" id="optionsRadios1" value="1" checked><?=_VISIBLE?>
                                    </label>
                                </div>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="trangthai" id="optionsRadios2" value="0">
                                        <?=_HIDE?>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <!-- /.box-body -->

                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary"><?=_ADD?></button>
                            <button type="reset" class="btn btn-defaul"><?=_RESET?></button>
                        </div>
                    </form>
                </div>
                <!-- /.box -->

            </div>
            <!--/.col (left) -->
        </div>
    </section>
</div>
</div>
<?php unset($_SESSION['fail']);  ?>
<!-- <script type="text/javascript">
$(document).ready(function() {

    $('#username').blur(function() { 
        
        var username = $(this).val();
        
        $.ajax({
            method:"POST",               // Phương thức gởi đi
            url:"moduleAD/check_number.php",           // File xử lý dữ liệu được gởi
            data:{user_name:username},
            dataType:"text",            // Dữ liệu gởi đến cho url 
            success: function(html) { // Hàm chạy khi dữ liệu gởi thành công
                $("#thongbao").html(html);    
            }
        });
        
    });

});

</script> -->
<script>
     $( document ).ready(function() {
       $('input#username').val("<?php echo $username; ?>");
      });
 </script>