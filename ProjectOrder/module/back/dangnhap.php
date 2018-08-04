<div class="container-fluid" style="margin-top:150px">
<div class="row">
      <div class="col-md-3 col-sm-12 col-xs-12"></div>
        <div class="col-md-6 col-sm-12 col-xs-12">

            <form action="?mod=xulydangnhap" method="post">
            <fieldset>
                <legend><h2 style="text-align:center; background-color:#096; color:#FFF; padding:8px 10px 8px 10px">
                	<strong>Xin Chào Quản Trị Viên!</strong></h2>
                </legend>
                <h3>--- Đăng Nhập ---</h3><br />
                <ul style="list-style-type:none">
                    <li>Email<span style="color:#F00"> *</span></li>
                    <li><input type="text" name="user" style="width:60%" required 
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
         
        <div class="col-md-3 col-sm-12 col-xs-12"></div>	        
</div>
</div>