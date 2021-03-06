<?php
session_start();
ob_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title> Login | ORDER FOOD</title>
    <link rel="shortcut icon" href="../img/front/icon.png" />
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="plugins/iCheck/square/blue.css">
<script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Google Font -->
    <script src="dist/js/sweetalert2.all.min.js"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page">

<?php

include ("../lib/connect.php");
include("controller/c_getLogin.php");
if(isset($_POST['account']))
{

    $user = $_POST['account'];
    $pass =$_POST['password'];

    $user = strip_tags($user);
    $user = addslashes($user);
    $pass = strip_tags($pass);
    $pass = addslashes($pass);
    $pass=hash('sha512',$_POST['password']);
    if($user == "" || $pass == "")
    {
              echo '<script type="text/javascript">';
                echo 'setTimeout(function () { swal("Đăng Nhập Thất bại?",
                              "Tài Khoản hoặc Mật Khẩu không được trống!",
                              "warning");';
                echo '}, 1);</script>';
    }
    else
    {
        $kq = checkUser($user,$pass,$link);
       if($kq == null){
            /*echo "Email hoặc Mật khẩu ko đúng";*/
            echo '<script type="text/javascript">';
            echo 'setTimeout(function () { swal("Đăng Nhập Thất bại?",
                      "Tài Khoản hoặc Mật Khẩu không đúng!",
                      "warning");';
            echo '}, 1);</script>';
        }

        else {

            
            $_SESSION['userad'] =  $kq['name'];
            $_SESSION['idad'] = $kq['id'];
            $_SESSION['catead'] = $kq['cate'];
           
            if(isset($_POST['remember'])){ setcookie("userad","{$kq['name']}",time()+999999);
                setcookie("idad","{$kq['id']}",time()+999999);
                setcookie("catead","{$kq['cate']}",time()+999999);

            }

            header("location:trang-chu.html");

        }
    }
}
?>

<div class="login-box">
    <div class="login-logo">
        <a href="login.php"><b>ORDER</b>FOOD</a>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">

        <form action="" method="post">
            <div class="form-group has-feedback">
                <input type="text" class="form-control" id="account" name="account" placeholder="Account">
                <i class="fa fa-user-circle-o form-control-feedback" aria-hidden="true"></i>

            </div>
            <div class="form-group has-feedback">
                <input type="password" class="form-control" placeholder="Password" name="password">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="row">               
                <!-- /.col -->
                <div class="col-xs-12">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
                </div>
                <!-- /.col -->
            </div>
        </form>
        <!-- /.social-auth-links -->

        
    </div>
    <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="plugins/iCheck/icheck.min.js"></script>
<script>
    $(function () {
        $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '20%' /* optional */
        });
    });
</script>
<script>
     $( document ).ready(function() {
       $('input#account').val("<?php echo $user; ?>");
      });
 </script>
</body>
</html>
