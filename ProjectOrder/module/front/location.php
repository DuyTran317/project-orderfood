<!DOCTYPE html>
<html>
<head>
    <script src="../../lib/sweetalert2.all.min.js"></script>
</head>
<body style="background-image: url(../../img/front/pexels-photo-326333.jpeg);  font-family: 'Anton', sans-serif; height: 100%">
<?php

// đăng xuất người dùng
require_once("../../lib/connect.php");
ob_start();
    if(isset($_COOKIE['userid_login'])&&$_COOKIE['userid_login']!=0)
    {
        unset($_SESSION['inside']);
        $sql = "update `of_user` set `active`=1 where `id`={$_COOKIE['userid_login']} and `active`=2";
        if($r = mysqli_query($link,$sql))
        {
            setcookie("username_login", 0, time() - 3600, "/");
            setcookie("userid_login", 0, time() - 3600, "/");

            //thông báo lỗi
            if(isset($_GET['error'])) {
                switch ($_GET['error']) {
                    case 1:
?>
                        <script type="text/javascript">
   


                        swal({
                            title: "Chú ý!",
                            text: "Bạn đang ở ngoài nhà hàng!",
                            type: "warning"
                        }).then(function() {
                                window.location = "../../index.php?mod=dangnhap";
                        });
                        </script>

                      <!--   <script type="text/javascript">
                       
                        alert("Bạn đang ở ngoài khu vực nhà hàng");
                        </script> -->
<?php
                        break;
                    case 2:
                        ?>
                        <script>
                             swal({
                            title: "warning",
                            text: "User denied the request for Geolocation.",
                            type: "warning"
                            }).then(function() {
                                    window.location = "../../index.php?mod=dangnhap";
                            });
                        </script>

                        <?php
                        break;
                    case 3:
                        ?>
                        <script>
                            swal({
                            title: "warning",
                            text: "Location information is unavailable.",
                            type: "warning"
                            }).then(function() {
                                    window.location = "../../index.php?mod=dangnhap";
                            });
                        </script>
                        <?php
                        break;
                    case 4:
                        ?>
                        <script>
                            swal({
                            title: "warning",
                            text: "The request to get user location timed out.",
                            type: "warning"
                            }).then(function() {
                                    window.location = "../../index.php?mod=dangnhap";
                            });
                           
                      
                        </script>
                        <?php
                        break;
                    case 5:
                        ?>
                        <script>
                            swal({
                            title: "warning",
                            text: "An unknown error occurred.",
                            type: "warning"
                            }).then(function() {
                                    window.location = "../../index.php?mod=dangnhap";
                            });
                        </script>
                        <?php
                        break;
                        } ?>


                <!-- <script>
                    window.location = "../../index.php?mod=dangnhap";
                </script> -->

                <?php
            }
        }
    }
?>
</body>
</html>
