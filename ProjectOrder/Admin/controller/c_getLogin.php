<?php 
	//kiem tra user
	function checkUser($user,$password,$link)
	{
		 $sql = "select * from of_admin where account= '$user' and password = '$password'";
       	 $kq = mysqli_query($link,$sql);
       	  if(mysqli_num_rows($kq) == 0)
        {
            /*echo "Email hoặc Mật khẩu ko đúng";*/
            return null;
        }

        else {

            $d=mysqli_fetch_assoc($kq);
           return $d;

           

        }
	}


?>