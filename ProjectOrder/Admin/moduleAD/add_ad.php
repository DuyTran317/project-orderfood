<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Thêm
            <small>Admin</small>
            
        </h1>
        <ol class="breadcrumb">
            <li><a href="trang-chu.html"><i class="fa fa-dashboard"></i>Trang chủ</a></li>  
            <li><a href="danh-sach-admin.html">Danh sách Admin</a></li>      
            <li class="active">Thêm</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-primary">
                    <form role="form" action="process-ad.html" method="post" enctype="multipart/form-data">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Account</label>
                                <input type="text" class="form-control" id="ten" name="suaten" placeholder="Nhập tên bàn" value="" >
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Tên</label>
                                <input type="text" class="form-control" id="so" name="suaso" placeholder="Nhập số bàn" value="">
                            </div>
                            
                           
                            <div class="form-group">
                                    <label for="exampleInputPassword1">Mật khẩu</label>
                                    <input type="password" id="pass" class="form-control password" name="suapass" onkeyup='check();'  required placeholder="Nhập mật khẩu " pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}"/>
                                    
                                    <div class="requirements">
                                        Bạn phải nhập ít nhất 6 ký tự, phải có 1 ký tự hoa, 1 ký tự số, 1 ký thường.
                                    </div>
                            </div>
                           
                            <div class="form-group">
                                 <label for="exampleInputPassword1">Nhập lại mật khẩu</label>
                                <span>
                                 <input type="password" id="repass" class="form-control password" onkeyup='check();' name="repass" required placeholder="Nhập lại mật khẩu "/>

                                <span id='message' class="requirements" style="padding: 0 30px 0 20px;"></span> </span>
                            </div>
                            <input type="hidden" value="" name="suaid">
                             
                            <div class="form-group">
                            <label for="exampleInputPassword1">Quyền</label>

                            <select class="form-control " name="suaquyen" style="border-radius: 5px 5px 5px 5px;">
                                 <option value="1"
                                 disabled="disabled" > Quản Trị Viên (Admin)</option> 
                                 <option value="2" >Thống Kê Viên</option>
                                 <option value="3">Quản Lý Loại & Sản Phẩm</option>
                                 <option value="4">Quản Lý</option>   
                                 <option value="5">Quản Lý Bàn</option>
                                 <option value="6">Quyền admin</option>
                            </select>
                        </div>
                        
                        </div>
                        <!-- /.box-body -->

                        <div class="box-footer">

                            <button type="submit" id="pass" class="btn btn-primary" name="xacnhan" >Thêm</button>
                            <button type="reset" class="btn btn-defaul">Đặt Lại</button>
                        </div>
                    </form>
                </div>
                <!-- /.box -->

            </div>
            <!--/.col (left) -->
        </div>
    </section>

</div>
