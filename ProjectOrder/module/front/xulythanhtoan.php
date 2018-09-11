<?php 
if(isset($_GET['id']))
{
	$name = $_GET['name'];
	$id = $_GET['id'];	
	$sql="insert into `of_solve_pay` values(NULL,{$id},'0')";
	mysqli_query($link,$sql);
	
	unset($_SESSION['order_wait']);
}
if(isset($_POST['content']))
{
	$bl=$_POST['content'];
	if(isset($_POST['rate']))
	{
		$star=$_POST['rate'];
		$sql = "INSERT INTO of_rate VALUES  (NULL,'$bl','$star',now(),'1')";
		mysqli_query($link,$sql);
		header("location:?mod=home&id=$id&name=$name");	
	}	
	
}
?>

<body style="background-color: #fff289;  font-family: 'Anton', sans-serif; background-image:url(img/front/blur-close-up-cutlery-370984.jpg); background-position:center; background-size:cover; background-attachment:fixed">
 <form action="" method="post" enctype="multipart/form-data" style="text-align:center">
                        <div class="form-group">
                            <label for="comment" style="margin-top:30px; font-size:20px; font-weight:100">Bình Luận <i class="fas fa-comment"></i></label>
                        </div>
                        <textarea name="content" id="comment" class="form-group" style="width:100%; height:100px" placeholder="Nhập Ý Kiến Của Bạn Vào Đây!!!!"></textarea>

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
                       
                        <br/><br/>
                        <button id="submit_comment" class="btn btn-success" style="clear:left"><strong>Gửi Đánh Giá</strong></button>
   

                    </form>
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
	$data['name'] = $name ;
	$data['message'] = 'Thanh Toán!!!!!';
	$pusher->trigger('hihi', 'notice', $data);
?>

