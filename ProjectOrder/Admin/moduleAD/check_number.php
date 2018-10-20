<?php 
$link = @mysqli_connect("localhost","root","","orderfood") or die("Lỗi Kết Nối");
if(isset($_POST["user_name"]))
{
	$sql = "select * from `of_user` where name='".$_POST['user_name']."'";
	$kq = mysqli_query($link,$sql);
	if(mysqli_num_rows($kq)>0)
	{
		echo "ko có giá trị";
	}
	else
	{
		echo "có thể sử dụng"
	}
}
?>