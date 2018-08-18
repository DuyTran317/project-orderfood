<?php
session_start();
ob_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>ORDERFOOD | Log in</title>
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

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page">

<?php
include ("moduleAD/connect.php");
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
               echo "Tài khoản hoặc Mật khẩu ko được để trồng";
    }
    else
    {
        $sql = "select * from of_admin where account= '$user' and password = '$pass' and cate = 3";
        $kq = mysqli_query($link,$sql);
        if(mysqli_num_rows($kq) == 0)
        {
            /*echo "Email hoặc Mật khẩu ko đúng";*/
           echo 'tài khoàn hoặc mật khẩu khồn đúng';
        }

        else {

            $d=mysqli_fetch_assoc($kq);
            $_SESSION['userad'] =  $d['name'];
            $_SESSION['idad'] = $d['id'];
            header("location:index.php?mod=home");

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
                <input type="text" class="form-control" name="account" placeholder="Account">
                <i class="fa fa-user-circle-o form-control-feedback" aria-hidden="true"></i>

            </div>
            <div class="form-group has-feedback">
                <input type="password" class="form-control" placeholder="Password" name="password">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="row">
                <div class="col-xs-8">
                    <div class="checkbox icheck">
                        <label>
                            <input type="checkbox"> Remember Me
                        </label>
                    </div>
                </div>
                <!-- /.col -->
                <div class="col-xs-4">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
                </div>
                <!-- /.col -->
            </div>
        </form>
        <!-- /.social-auth-links -->

        <a href="#">I forgot my password</a><br>
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
</body>
</html>
