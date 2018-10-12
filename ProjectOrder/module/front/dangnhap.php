<script>
    function changeLang(){
        document.getElementById('form_lang').submit();
    }
</script>
<html style="height: 100%">
<body style="background-image: url(img/front/close-up-cooking-cuisine-958545.jpg);  font-family: 'Anton', sans-serif; height: 100%">
<div class="container-fluid" style="margin-top:10%">
    <div class="row">
        <div class="col-sm-4 col-sm-offset-4" style="background-color: rgba(0,0,0,0.8); padding:15px">
            <form action="?mod=xulydangnhap" method="post" class="form-horizontal">
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
                            <button class="btn col-xs-12" style=" font-size:18px; color: black; background-color: yellow; border-radius: 0px; type="submit"><?=_LOGIN?></button>

                        </div>

                    </div>



                </fieldset>
            </form>
        </div>

    </div>
</div>
</body>
</html>