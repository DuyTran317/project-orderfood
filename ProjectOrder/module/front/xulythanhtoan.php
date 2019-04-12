<?php
 if(!isset($_COOKIE['username_login']))
{
	header("location:login.html");
}
if(isset($_GET['id']))
{
	$id = takeGet('id');
	$name = takeGet('name');

	$order_id = takeGet('order_id');	
	
	//Insert to SolvePay
	//Tìm xem solve_pay đã tồn tại 1 row đó chưa
	$sql = "select `id` from `of_solve_pay` where `order_id` = {$order_id} and num_table = {$name} and `active`=0";
	$query = mysqli_query($link,$sql);
	if(mysqli_num_rows($query) == 0 )
	{
		Ins_Note($link, 'of_solve_pay', $order_id, $id, 0);
	}
	
	//Update User Active = 1
	Upd_OderAct($link, 'of_user', 1, $id);
	
	setcookie("order_wait", $order_id, time() - 3600, "/");
	//Delete Cookies
	setcookie("username_login", $name, time() - 3600, "/");
	setcookie("userid_login", $id, time() - 3600, "/");
}
if(isset($_POST['content']))
{
	$bl = takePost('content');
	if(isset($_POST['rate']))
	{
		$star = takePost('rate');
		$date = date("Y-m-d G:i:s");
		Ins_FiveValue($link, 'of_rate', $bl, $star, $date, 1);
		
		header("location:xuly_dangxuat.html");	
	}	
	
}
?>
<style>
    html,
    body{
        height: 100%;
    }
</style>
<body style=" font-family: 'Anton', sans-serif; background-image:url(img/front/close-up-cooking-cuisine-958545.jpg); background-position:center; background-size:cover; background-attachment:fixed">
<div class="container" style="margin-top:50px; font-size:20px; font-weight:100">
    <div class="row" >
        <div class="col-md-8 col-md-offset-2" style="background-color: white; padding: 20px; border-radius: 20px;">
            <form action="" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="comment" style="font-size: 20px;" >
                        <table>
                            <tr>
                                <td>
                                    <?=_REVIEWUS?>:
                                </td>
                                <td>
                                    <div class="form-group">
                                        <div class="rate">
                                            <input type="radio" id="star5" name="rate" value="5" checked/>
                                            <label for="star5" title="text">5</label>
                                            <input type="radio" id="star4" name="rate" value="4" />
                                            <label for="star4" title="text">4</label>
                                            <input type="radio" id="star3" name="rate" value="3" />
                                            <label for="star3" title="text">3</label>
                                            <input type="radio" id="star2" name="rate" value="2" />
                                            <label for="star2" title="text">2</label>
                                            <input type="radio" id="star1" name="rate" value="1" />
                                            <label for="star1" title="text">1</label>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </table>

                    </label>
                </div>
                <textarea name="content" id="comment" class="form-group" style="width:100%; height:100px" placeholder="<?=_OPINION?>"></textarea>
                <br/><br/>
                <div align="right"><button id="submit_comment" class="btn btn-success btn-lg" style="clear:left"><?=_SEND?></button></div>
            </form>
        </div>
    </div>
</div>

</body>
<?php
	sendPusher('161363aaa8197830a033', '46f2ba3b258f514f6fc7', '577033', 'Reload', 'notice');
?>

