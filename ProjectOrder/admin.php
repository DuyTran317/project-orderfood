<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<!--<link rel="shortcut icon" href="img/shortcut/Christian-cross-icon.png" />-->
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css"/>
<link rel="stylesheet" type="text/css" href="fontawesome-free-5.1.0-web/css/all.css">
<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="stylesheet" type="text/css" href="jqueryUI/jquery-ui.min.css">
<script src="bootstrap/js/jquery.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="jqueryUI/jquery-ui.min.js"></script>
<!-- Library For DATATABLE PLUGGIN -->
<script src="datatable/jquery.dataTables.min.js"></script>
<link rel="stylesheet" type="text/css" href="datatable/jquery.dataTables.min.css" />
</head>

<?php
/*	if(isset($_SESSION['admin_id']))
	{
		header("location:?mod=home");
	}*/
?>

<div class="container-fluid" style="margin-top:150px">
<div class="row">
      <div class="col-md-3 col-sm-3 col-xs-12"></div>
        <div class="col-md-6 col-sm-6 col-xs-12">

            <form action="" method="post">
            <fieldset>
                <legend><h2 style="text-align:center; background-color:#096; color:#FFF; padding:8px 10px 8px 10px">
                	<strong>Xin Chào Quản Trị Viên!</strong></h2>
                </legend>
                <h3>--- Đăng Nhập ---</h3><br />
                <ul style="list-style-type:none">
                    <li>Email<span style="color:#F00"> *</span></li>
                    <li><input type="email" name="user" style="width:60%" required 
                    value="<?php
                                if(isset($_SESSION['email']))
                                {
                                    echo $_SESSION['email'];
                                    unset($_SESSION['email']);
                                }
                           ?>" 
                    /></li>
                </ul>
                
                <ul style="list-style-type:none">
                    <li>Mật khẩu<span style="color:#F00"> *</span></li>
                    <li><input type="password" name="pass" style="width:60%" required /></li>
                </ul>         
                
                <ul>
                    <button class="btn btn-success" style="margin-top:15px" type="submit">Đăng Nhập</button>
                </ul>
            
            </fieldset>    
            </form>
          </div>
         
        <div class="col-md-3 col-sm-3 col-xs-12"></div>	        
</div>
</div>

