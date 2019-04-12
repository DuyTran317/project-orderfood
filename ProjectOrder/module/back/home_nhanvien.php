<?php 
getPusher('770fa0ac91f2e68d3ae7', 'Reload', 'newbill'); 
getPusher('05d67b2777b04b8a83db', 'Reload', 'loadmenu2');
getPusher('161363aaa8197830a033', 'Reload', 'notices');
getPusher('aaee585e94d28c3959f4', 'Reload', 'loadmenu_nhanvien');
getPusher('51e37eb7c055b1a5ea68', 'Reload', 'login');

?>

<script>
Pusher.logToConsole = true;
    var pusher = new Pusher('161363aaa8197830a033', {
      cluster: 'ap1',
      encrypted: true
    });
    var channel = pusher.subscribe('Reload');
    channel.bind('loadmenu3', function (data) {
		
		alert('Bàn '+data.name+' đã đặt trúng món HẾT. Vui lòng thông báo với Khách Hàng!');
		window.location.reload();

    });	
</script>

<html>

<body style="background-image:-webkit-linear-gradient(90deg, #45b649 0%, #dce35b 100%);  font-family: 'Anton', sans-serif;" data-spy="scroll" data-offset="50">
<div class="container" style="margin-top: 5%; background-color: white; border-radius: 20px; padding: 20px;">
    <?php
		$show_waiter = selectWithCondition_Cate($link, 'of_manage', 3);
    ?>
    <h4 style="float: left">Nhân viên: <?=$show_waiter['name']?></h4>
    <!--Chuyển Bàn -->
    <a href="?mod=chuyenban" class="btn btn-success" style="font-size:18px; color: #FFF; float:right; padding:10px 5px 10px 5px"><i class="fas fa-exchange-alt"></i> Quản Lý Bàn</a>
    <div style="clear:right"></div>
    <hr>
    
    <h1 align="center" style="color:#033">Danh Sách Bàn</h1>
    <?php 

	$select = selectWithCondition_BillUser($link, 'of_bill', 'of_user');
	$flag=0;
	foreach($select as $ten_an_quyt){

		$sl_an_quyt = selectWithCondition_NumAct($link, 'of_solve_pay', $ten_an_quyt['num_table'],0);		
		if($sl_an_quyt>0)
		{
		}
		else
		{
			if($flag==0)
				{
	   			 ?>
				 <h3 align="center" style="color:#F00; background-color:#FCF; padding:25px 0 25px 0; font-family:Tahoma, Geneva, sans-serif">*** Bàn Chưa Thanh Toán Mà Đã Đăng Xuất ***<br>
       			 <a href="#ban<?=$ten_an_quyt['num_table'] ?>" class="btn btn-md btn-danger" style="margin-top:20px">Bàn <?=$ten_an_quyt['num_table'] ?></a>   
        		 <?php 
				 $flag=1;
				}
			else   
				{
				?>
				        <a href="#ban<?=$ten_an_quyt['num_table'] ?>" class="btn btn-md btn-danger" style="margin-top:20px">Bàn <?=$ten_an_quyt['num_table'] ?></a>   

				<?php	
				}
		}
    }
	?>
    </h3>
    <div class="row">
    <?php 	
		$take = selectTableInEmployee($link);
		foreach($take as $slban){			
		
			$name=$slban['name']; 		
	?>
    
        <div class="col-md-3 col-sm-4 col-xs-6 " style="padding: 10px; font-size: 25px" align="center" id="ban<?=$name?>">
        
        <?php
				//lấy id_order và name bàn
				$qr = selectWithCondition_IdOrNameTable($link, $name);				
				$kq=mysqli_fetch_assoc($qr);
				
				$id_order= $kq['id_or'];
				
				//lấy số món
				$somon = selectWithCondition_NumOfFood($link, 'of_order', 'of_order_detail', $name, 0);
				if(mysqli_num_rows($qr)>0) 
				{
		?> 

						 <div class="col-xs-12" style='background-color: #FF0; height: 250px; padding: 40px 0px;'>
                             <a href="?mod=confirm_order&id=<?= $id_order ?>&num_table=<?= $name ?>" style="text-decoration:none; color:#000">
                             <div style="font-size: 40px; color:#06F" ><?= $slban['name']?></div>
							 <p >Số món đã đặt: <span style="color:#F00"><?= $somon ?></span></p>
                             </a>
                           <div class="row" style="position: absolute; bottom: 0px; left: 0px; right: 0px;">
                                 <div class="col-md-12" >
                                     <!--Kiểm Tra Hóa Đơn -->
                                     <?php
									 $kt = selectWithCondition_IdNumAct($link, 'of_order', $name, $kq['id_or'], 0);
                                     if(@mysqli_num_rows($kt) > 0) {
                                     ?>
                                         <a style="color: black; text-decoration: none;" href="?mod=list_order_nv&id=<?=$kq['id_or']?>&name_ban=<?=$name?>"><button class="col-xs-12 btn btn-lg" style=" border-radius: 0px; font-size: 15px; text-align: center; background-color:#f4af41; ">Kiểm Tra</button>
                                         </a>
                                     <?php } ?>
                                 </div>
                                 <div class="col-md-12">
                                     <!--Nút Thanh toán-->
                                     <?php
                                     $show = selectWithCondition_ActId($link, 'of_order', 1, $kq['id_or']);

                                     if(mysqli_num_rows($show) > 0)
                                     {
                                         ?>
                                         <a id="test_xoa" onClick="hoi(<?=$kq['id_or']?>)" style="cursor: pointer;color:black;">
                                        <button class="btn btn-lg col-xs-12" style="background-color:#f2a11f; border-radius: 0px; font-size: 15px;text-align:center">Thanh Toán</button></a>
                                         <h5 style="color:white; position:absolute; top:-190; left:22; background-color:red; width:50px ;height:50px; padding-top:10px; border-radius:50%; font-size:30px;"><i class="fas fa-check"></i></h5>
                                     <?php 
									 } 
									 ?>
                                     <script type="text/javascript">
                                        function hoi(id_or){
                                            swal({
                                                title: 'Chú ý',
                                                text: "Chắc chắn thanh toán?",
                                                type: 'warning',
                                                showCancelButton: true,
                                                confirmButtonColor: '#3085d6',
                                                cancelButtonColor: '#d33',
                                                confirmButtonText: 'Đồng ý!',
                                                cancelButtonText: 'Hủy!',
                                                confirmButtonClass: 'btn btn-success',
                                                cancelButtonClass: 'btn btn-danger',
                                                buttonsStyling: false,
                                                reverseButtons: true
                                            }).then((result) => {
                                                if (result.value) {
                                                    swal(
                                                        'Thành Công',
                                                        'Bạn đã thanh toán thành công!',
                                                        'success'
                                                    ).then(function(){
                                                        window.location.href="?mod=solve_payment_nhanvien&name=<?=$kq['name_ban']?>&order_id="+id_or
                                                    });
                                                }  
                                            })

                                        }
                                    </script>
                                 </div>
                             </div>
				<?php  
				}
				else
				{
				?>
							<div class="" style='background-color: #999; height: 250px; padding: 40px 0px;'>
                            <?php if($slban['a_user'] == 2) {?>
                                <div style="position:absolute; top:10; right:10; font-size:18px"><a href="?mod=logout_user_nv&id=<?=$name?>" class="btn btn-danger">x</a></div>
                                <div style="clear:right"></div>
                            <?php }?>
							<div style="font-size: 40px;" ><?= $slban['name']?></div>

				<?php }?>
						</div>
					</div>
                  
        <?php } ?>
    </div>
</div>
</div>

</body>
</html>