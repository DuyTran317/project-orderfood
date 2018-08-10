<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
</head>
<body style="background:url(img/front/crsrxfllostehmuxwzqfkdarpcg0di40toehyl4mzmgrkmy3dpfzxttukvsmluvp-.jpg); background-repeat:no-repeat; background-position:center; background-size:cover ;">
<div class="container-fluid">
	
	<div class="row" style="padding:50px 0; font-family: 'Exo 2', sans-serif;">
    	<p style=" color:#FFF; text-align:center; font-size:40px;"><span style="background-color:#CF0; padding:5px;">YOU CHOSE</span> <span style="background-color:#F90; padding:5px;">WE SERVE</span> <span style="background-color:#F60; padding:5px;">YOU'LL LOVE IT</span></p><br />
        <center><i class="fas fa-utensils fa-border" style="font-size:58px; color:#FFF"></i></center>
    </div>
	<div class="row" style=" padding: 30px;  font-family: 'Pacifico', cursive;">
        <div class="col-xs-12">
            <h1 style="color:#FFF; text-align:center">Our Menu</h1>
            <hr>
            <div class="scrolling-wrapper">
            <?php 
			$commsql="select * from `of_food` where `category_id`='1' ";
			$res= mysqli_query($link,$commsql);
			while($kq= mysqli_fetch_assoc($res))
			{	
			?>
      			
            	<a href="?mod=detail&id=<?php echo $kq['id'] ?>" style="color:#000; text-decoration:none">
                <div class="card" style="  width: 300px; height: 300px; background:white;">
                    <div class="col-xs-12" style="  height: 150px;  background:url(img/front/1515456591895.jpg);background-position:center; background-size:cover;">
                    	<div style=" padding: 5px; position:absolute; bottom:0px; left:0px; background-color:#FF0; color:#000; font-size:18px; 
                        font-weight:bold"><?php echo number_format($kq['price']) ?> VND</div>
                    </div>
                    
                    <div class="col-xs-12" style=" height: 150px; " >
                        <h3 id="aubr" align="center" style="color:#900"><b><?php echo $kq['name'] ?></b></h3>
                        <i id="aubr"><?php echo $kq['desc'] ?></i>
                    </div>
                </div>
                </a>
                
       		<?php } ?>
                                                  
            </div>
        </div>
    </div>
</div>
</body>
</html>