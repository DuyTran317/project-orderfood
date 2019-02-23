<header class="main-header">
    <!-- Logo -->
    <a href="trang-chu.html" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>O</b>rder food</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>Order</b>FOOD</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>

        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <!-- Notifications: style can be found in dropdown.less -->
                <!-- <li class="dropdown notifications-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-bell-o"></i>
                        <span class="label label-warning">10</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="header">You have 10 notifications</li>
                        <li>
                            inner menu: contains the actual data
                            <ul class="menu">
                                <li>
                                    <a href="#">
                                        <i class="fa fa-users text-aqua"></i> 5 new members joined today
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-warning text-yellow"></i> Very long description here that may not fit into the
                                        page and may cause design problems
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-users text-red"></i> 5 new members joined
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-shopping-cart text-green"></i> 25 sales made
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-user text-red"></i> You changed your username
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="footer"><a href="#">View all</a></li>
                    </ul>
                </li> -->
                <!-- User Account: style can be found in dropdown.less -->
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="dist/img/1.png" class="user-image" alt="User Image">
                        <span class="hidden-xs"><?= $_SESSION['userad']; ?></span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">
                            <img src="dist/img/1.png" class="img-circle" alt="User Image">

                            <p>
                                <?= $_SESSION['userad']; ?>
                            </p>
                        </li>
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="edit_ad-<?php echo  $_SESSION['idad'] ?>.html" class="btn btn-default btn-flat">Tài Khoản</a>
                            </div>
                            <div class="pull-right">
                                <a href="thoat.html" class="btn btn-default btn-flat">Logout</a>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>
<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar" style=" overflow-y: scroll; height: 100%; position: fixed">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="dist/img/1.png" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p><?= $_SESSION['userad']; ?></p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- search form -->
        <!--<form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>-->
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header" style="text-align:center">Bảng điều khiển</li>
            <li>
                <a href="trang-chu.html">
                    <i class="fa fa-dashboard"></i> <span>Tổng quan </span>
                    <span class="pull-right-container"></span>
                </a>
            </li>
            
       <?php
            $cate = $_SESSION['catead'];
          if($cate ==3 || $cate  ==1 || $cate  ==6) {  ?> 
            <li class="header" style="text-align:center">Quản lý món ăn</li>
            <li class="treeview">
                <a href="javascript:void(0)">
                    <i class="fa fa-ellipsis-h" aria-hidden="true"></i>
                    <span>Chủng loại</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i></span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="danh-sach-chung-loai.html"><i class="fa fa-circle-o"></i> Danh Sách</a></li>
                    <li><a href="them-chung-loai.html"><i class="fa fa-circle-o"></i> Thêm</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="javascript:void(0)">
                    <i class="fa fa-pie-chart"></i>
                    <span>Thể loại</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i></span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="danh-sach-the-loai.html"><i class="fa fa-circle-o"></i> Danh Sách</a></li>
                    <li><a href="them-the-loai.html"><i class="fa fa-circle-o"></i> Thêm</a></li>
                </ul>
            </li>
            
            <li class="treeview">
                <a href="javascript:void(0)">
                    <i class="fa fa-cutlery" aria-hidden="true"></i>
                    <span>Sản phẩm</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i></span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="danh-sach-san-pham.html"><i class="fa fa-circle-o"></i> Danh Sách</a></li>
                    <li><a href="them-san-pham.html"><i class="fa fa-circle-o"></i> Thêm</a></li>
                </ul>
            </li><?php }?>
            
         <?php
            $cate = $_SESSION['catead'];
          if($cate ==2 || $cate  ==1 || $cate  ==6) {  ?> 
            <li class="header" style="text-align:center">Phân tích</li> 
           <li>
                <a href='danh-sach-hoa-don.html'>
                    <i class='fa fa-first-order' aria-hidden='true'></i>
                    <span>Hóa đơn</span>
                    <span class='pull-right-container'>
            </span>
                </a>
            </li>
            <li>
                <a href='danh-sach-danh-gia.html'>
                    <i class='fa fa-comments' aria-hidden='true'></i>
                    <span>Đánh Giá</span>
                    <span class='pull-right-container'>
                </span>
                </a>
            </li>
      <?php  }?>
       
      <?php
            $cate = $_SESSION['catead'];
          if($cate ==5 || $cate  ==1 || $cate  ==6) {  ?> 
            <li class="header" style="text-align:center">Quản lý bàn</li>
            <li class="treeview">
                <a href="javascript:void(0)">
                   <i class="fa fa-table" aria-hidden="true"></i>
                    <span>Bàn</span>
                    <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="danh-sach-ban.html"><i class="fa fa-circle-o"></i> Danh Sách</a></li>
                    <li><a href="them-ban.html"><i class="fa fa-circle-o"></i> Thêm</a></li>
                </ul>
            </li>
        <?php }?>
         
        <?php
            $cate = $_SESSION['catead'];
          if($cate ==4 || $cate  ==1 || $cate  ==6) {  ?>
           <li class="header" style="text-align:center">Quản lý người dùng</li>
            <li class="treeview">
                <a href="javascript:void(0)">
                    <i class="fa fa-users" aria-hidden="true"></i>
                    <span>Người Dùng</span>
                    <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="danh-sach-bep-thanh-toan.html"><i class="fa fa-circle-o"></i> Danh Sách</a></li>
                    <li><a href="them-bep-thanhtoan.html"><i class="fa fa-circle-o"></i> Thêm</a></li>
                </ul>
            </li>
        <?php } ?>

        <?php
            $cate = $_SESSION['catead'];
          if($cate  ==1 || $cate  ==6) {  ?> 
          
          <li class="header" style="text-align:center">Quản lý slide</li>
            <li class="treeview">
                <a href="javascript:void(0)">
                    <i class="fa fa-sliders" aria-hidden="true"></i>
                    <span>Slide</span>
                    <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="danh-sach-slide.html"><i class="fa fa-circle-o"></i> Danh Sách</a></li>
                    <li><a href="them-slide.html"><i class="fa fa-circle-o"></i> Thêm</a></li>
                </ul>
            </li>
            <li class="header" style="text-align:center">Quản lý khuyến mãi</li>
            <li class="treeview">
                <a href="javascript:void(0)">
                    <i class="fa fa-tags" aria-hidden="true"></i>
                    <span>Khuyến mãi</span>
                    <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="danh-sach-khuyen-mai.html"><i class="fa fa-circle-o"></i> Danh Sách</a></li>
                    <li><a href="them-khuyen-mai.html"><i class="fa fa-circle-o"></i> Thêm</a></li>
                </ul>
            </li>
            <li class="header" style="text-align:center">Quản lý và phân quyền</li>
            <li class="treeview">
                <a href="javascript:void(0)">
                   <i class="fa fa-cogs" aria-hidden="true"></i>
                    <span>Cài đặt</span>
                    <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="sao-luu-du-lieu.html"><i class="fa fa-circle-o"></i> Sao lưu dữ liệu</a></li>
                    
                </ul>
            </li>
            
            <li>
                <a href='danh-sach-admin.html'>
                <i class="fa fa-user-circle-o" aria-hidden="true"></i>
                    <span>ADMIN</span>
                    <span class="pull-right-container"></span>
                </a>
            </li>
        <?php }?>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>