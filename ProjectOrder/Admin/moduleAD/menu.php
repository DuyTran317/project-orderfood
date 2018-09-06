<header class="main-header">
    <!-- Logo -->
    <a href="index.php" class="logo">
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
                <li class="dropdown notifications-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-bell-o"></i>
                        <span class="label label-warning">10</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="header">You have 10 notifications</li>
                        <li>
                            <!-- inner menu: contains the actual data -->
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
                </li>
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
                                <a href="?mod=edit_ad&edit=<?php echo  $_SESSION['idad'] ?>" class="btn btn-default btn-flat">Tài Khoản</a>
                            </div>
                            <div class="pull-right">
                                <a href="?mod=logout" class="btn btn-default btn-flat">Logout</a>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>
<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
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
                <a href="?mod1=home">
                    <i class="fa fa-dashboard"></i> <span>Tổng quan </span>
                    <span class="pull-right-container"></span>
                </a>
            </li>
            
       <?php
            $cate = $_SESSION['catead'];
          if($cate ==3 || $cate  ==1) {  ?> 
            <li class="header" style="text-align:center">Quản lý món ăn</li>
          <li class="treeview">
                <a href="#">
                    <i class="fa fa-pie-chart"></i>
                    <span>Thể loại</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i></span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="?mod=cat_list"><i class="fa fa-circle-o"></i> Danh Sách</a></li>
                    <li><a href="?mod=add_cat"><i class="fa fa-circle-o"></i> Thêm</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-cutlery" aria-hidden="true"></i>
                    <span>Sản phẩm</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i></span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="?mod=pro_list"><i class="fa fa-circle-o"></i> Danh Sách</a></li>
                    <li><a href="?mod=add_pro"><i class="fa fa-circle-o"></i> Thêm</a></li>
                </ul>
            </li><?php }?>
            
         <?php
            $cate = $_SESSION['catead'];
          if($cate ==2 || $cate  ==1) {  ?> 
            <li class="header" style="text-align:center">Phân tích</li> 
           <li>
                <a href='?mod=cat_list'>
                    <i class='fa fa-first-order' aria-hidden='true'></i>
                    <span>Hóa đơn</span>
                    <span class='pull-right-container'>
            </span>
                </a>
            </li>
            <li>
                <a href='?mod=rate_list'>
                    <i class='fa fa-comments' aria-hidden='true'></i>
                    <span>Đánh Giá</span>
                    <span class='pull-right-container'>
                </span>
                </a>
            </li>
      <?php  }?>
       
      <?php
            $cate = $_SESSION['catead'];
          if($cate ==5 || $cate  ==1) {  ?> 
            <li class="header" style="text-align:center">Quản lý bàn</li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-tablet" aria-hidden="true"></i>
                    <span>Bàn</span>
                    <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="?mod=user_list"><i class="fa fa-circle-o"></i> Danh Sách</a></li>
                    <li><a href="?mod=add_user"><i class="fa fa-circle-o"></i> Thêm</a></li>
                </ul>
            </li>
        <?php }?>
         
        <?php
            $cate = $_SESSION['catead'];
          if($cate ==4 || $cate  ==1) {  ?>
           <li class="header" style="text-align:center">Quản lý Bếp và Thanh toán</li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-free-code-camp" aria-hidden="true"></i>
                    <span>User Bếp - Thanh Toán</span>
                    <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="?mod=kit_list"><i class="fa fa-circle-o"></i> Danh Sách</a></li>
                    <li><a href="?mod=add_kit"><i class="fa fa-circle-o"></i> Thêm</a></li>
                </ul>
            </li>
        <?php } ?>

        <?php
            $cate = $_SESSION['catead'];
          if($cate  ==1) {  ?> 
            <li class="header" style="text-align:center">Quản lý và phần quyền</li>
            <li>
                <a href='?mod=ad_list'>
                <i class="fa fa-user-circle-o" aria-hidden="true"></i>
                    <span>ADMIN</span>
                    <span class="pull-right-container"></span>
                </a>
            </li>
        <?php }?>
            <li class="header" style="text-align:center">CHÚ THÍCH</li>
            <li><a href="javascript:void(0)"><i class="fa fa-circle-o text-red"></i> <span>Quan Trọng</span></a></li>
            <li><a href="javascript:void(0)"><i class="fa fa-circle-o text-yellow"></i> <span>Cảnh Báo</span></a></li>
            <li><a href="javascript:void(0)"><i class="fa fa-circle-o text-aqua"></i> <span>Thông Tin</span></a></li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>