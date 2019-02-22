<?php 
if(isset($_GET['id']))
{
	$name = $_GET['name'];
	$id = $_GET['id'];
	$order_id=$_GET['order_id'];	

	$sql="insert into `of_solve_pay` values(NULL,{$order_id},{$id},'0')";
	mysqli_query($link,$sql);
	
	$sql="update `of_user` set `active`= 1 where `id`={$id}";
	mysqli_query($link,$sql);
	
	setcookie("order_wait", $order_id, time() - 3600, "/");
	//Delete Cookies
	setcookie("username_login", $name, time() - 3600, "/");
	setcookie("userid_login", $id, time() - 3600, "/");
}
if(isset($_POST['content']))
{
	$bl=$_POST['content'];
	if(isset($_POST['rate']))
	{
		$star=$_POST['rate'];
		$date = date("Y-m-d G:i:s");
		$sql = "INSERT INTO of_rate VALUES  (NULL,'$bl','$star','$date','1')";
		mysqli_query($link,$sql);
		
		header("location:?mod=xulydangxuat");	
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
	require('Pusher.php');
	$options = array(
	'cluster' => 'ap1',
    'encrypted' => true
	);
 	$pusher = new Pusher(
    '161363aaa8197830a033',
    '46f2ba3b258f514f6fc7',
    '577033',
    $options
	);
	$pusher->trigger('Reload', 'notice', @$data);
?>

