<?php
	if(isset($_COOKIE['username_login']))
	{		
		//Kiem tra bang cach truy van vao DB
		$sql="select * from `of_user` where `name`='{$_COOKIE['username_login']}' and `active`=2";
		$rs=mysqli_query($link,$sql);
		if(mysqli_num_rows($rs)>0)
		{
			header("location:tlc-trang_chu-i9102d{$_COOKIE['userid_login']}-n9102ame{$_COOKIE['username_login']}.html");
			exit;
		}
	}
?>

<script>
    function changeLang(){
        document.getElementById('form_lang').submit();
    }
</script>
<html style="height: 100%">
<body style="background-image: url(img/front/close-up-cooking-cuisine-958545.jpg);  font-family: 'Anton', sans-serif; height: 100%">
<div class="container-fluid" style="margin-top:10%">
    <div class="row">
        <div class="col-sm-8 col-sm-offset-2 col-lg-4 col-lg-offset-4" style="background-color: rgba(0,0,0,0.8); padding:15px">
            <form action="xuly_dangnhap.html" method="post" class="form-horizontal">
                <fieldset>
                    <div class="row">
                        <div class="col-md-6">
                            <h2 style="text-align:center; color:#FFF; "><strong><?=_ENTER?></strong></h2>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <input type="text" name="user" class="form-control" required style = "background-color:transparent; color:white;" placeholder="<?=_TABLENO?>"
                                           value="<?php
                                           if(isset($_SESSION['email']))
                                           {
                                               echo $_SESSION['email'];
                                               unset($_SESSION['email']);
                                           }
                                           ?>"
                                    >
                                </div>
                            </div>
                            
                            <button class="btn col-xs-12" style=" font-size:18px; color: black; background-color: yellow; border-radius: 0px; margin-bottom:10px;" type="submit" ><?=_LOGIN?></button><br>
                            <a href="watch_homewolg.html" style="color:#FFF; margin-top:10px; text-decoration:underline "><?=_NOLOGIN?></a>

                            
                        </div>

                    </div>
                </fieldset>
            </form>
        </div>

    </div>
</div>
</body>
</html>