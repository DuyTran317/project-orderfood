
<body style="background-image: url(img/front/close-up-cooking-cuisine-958545.jpg); background-size: cover;  font-family: 'Anton', sans-serif;">
<div class="container" style="margin-top:10%">
    <div class="row">
        <div class="col-md-4 col-md-offset-4" style="background-color: rgba(0,0,0,0.8); padding:15px">
            <form action="?mod=xulydangnhap" method="post" class="form-horizontal">
                <fieldset>
                    <h2 style="text-align:center; color:#FFF; ">
                        <strong>Đánh Dấu Số Bàn</strong></h2>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <input type="text" name="user" class="form-control input-lg" required style = "background-color:transparent; color:white; border-radius:0px; max-width:100%" placeholder="Email"
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
                    <div class="form-group">
                        <div class="col-sm-12">
                            <input type="password" name="pass"  class="form-control input-lg" required style = "background-color:transparent; color:white; border-radius:0px; max-width:100%" placeholder="Mật khẩu"
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
                    <button class="btn col-xs-12" style=" font-size:18px; color: black; background-color: yellow; border-radius: 0px; type="submit">Đăng Nhập</button>
                </fieldset>
            </form>
        </div>

    </div>
</div>
</body>