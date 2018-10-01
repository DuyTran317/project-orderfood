<?php
	if(! isset($_SESSION['admin_id']))
	{
		header("location:?mod=dangnhap");	
	}
	if(isset($_GET['id']))
	{
		$id=$_GET['id'];
	}
	if(isset($_GET['num_table']))
	{
		$num_table=$_GET['num_table'];
	}
?>

<style>
	th{
		text-align:center;
	}
	body {
    margin: 0;
    padding: 0;
    background-color: #FAFAFA;
    font: 12pt "Tohoma";
}
* {
    box-sizing: border-box;
    -moz-box-sizing: border-box;
}
.page {
    width: 23cm;
    overflow:hidden;
    min-height:auto;
    margin-left:auto;
    margin-right:auto;
    background: white;
    box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
}
.subpage {
    padding: 1cm;
    border: 5px red solid;
    height: 237mm;
    outline: 2cm #FFEAEA solid;
}
 @page {
 size: A4;
 margin: 0;
}
.header {
    overflow:hidden;
}
.logo {
    background-color:#FFFFFF;
    text-align:left;
    float:left;
}
.company {
    padding-top:24px;
    text-transform:uppercase;
    background-color:#FFFFFF;
    text-align:right;
    float:right;
    font-size:16px;
}
.title {
    text-align:center;
    position:relative;
    color:#0000FF;
    font-size: 24px;
    top:1px;
}
.footer-left {
    text-align:center;
    text-transform:uppercase;
    padding-top:24px;
    position:relative;
    height: 150px;
    width:50%;
    color:#000;
    float:left;
    font-size: 12px;
    bottom:1px;
}
.footer-right {
    text-align:center;
    text-transform:uppercase;
    padding-top:24px;
    position:relative;
    height: 150px;
    width:50%;
    color:#000;
    font-size: 12px;
    float:right;
    bottom:1px;
}
.TableData {
    background:#ffffff;
    font: 11px;
    width:100%;
    border-collapse:collapse;
    font-family:Verdana, Arial, Helvetica, sans-serif;
    font-size:12px;
    border:thin solid #d3d3d3;
}
.TableData TH {
    background: rgba(0,0,255,0.1);
    text-align: center;
    font-weight: bold;
    color: #000;
    border: solid 1px #ccc;
    height: 24px;
}
.TableData TR {
    height: 24px;
    border:thin solid #d3d3d3;
}
.TableData TR TD {
    padding-right: 2px;
    padding-left: 2px;
    border:thin solid #d3d3d3;
}
.TableData TR:hover {
    background: rgba(0,0,0,0.05);
}
.TableData .cotSTT {
    text-align:center;
    width: 10%;
}
.TableData .cotTenSanPham {
    text-align:left;
    width: 40%;
}
.TableData .cotHangSanXuat {
    text-align:left;
    width: 20%;
}
.TableData .cotGia {
    text-align:right;
    width: 120px;
}
.TableData .cotSoLuong {
    text-align: center;
    width: 50px;
}
.TableData .cotSo {
    text-align: right;
    width: 120px;
}
.TableData .tong {
    text-align: right;
    font-weight:bold;
    text-transform:uppercase;
    padding-right: 4px;
}
.TableData .cotSoLuong input {
    text-align: center;
}
@media print {
 @page {
 margin: 5px;
 border: initial;
 border-radius: initial;
 width: initial;
 min-height: initial;
 box-shadow: initial;
 background: initial;
 page-break-after: always;
}
}

</style>

<body  style="background-image: url(img/back/adult-ancient-artisan-1062269.jpg); background-size: cover;">
<div class="container" style="margin-bottom:50px">
    <div class="row" style="background-color: #FFF; margin-top: 5%; border-radius: 20px; padding: 20px;">
        <div class="col-xs-12" style="background-color: white">
            <a href="?mod=home_thanhtoan" class="btn" style="font-size: 36px; color: black"><i class="fas fa-arrow-left"></i></a>
            <div id="content">
                <div id="page" class="page">
                    <div class="header" style="margin-top:10px">
                        <div style="float:left; font-size:18px"><strong>Nhà Hàng 5 Siêu Nhân</strong></div>
                        <?php
                            $sql="select * from `of_bill` order by `id` desc limit 0,1";
                            $kq=mysqli_query($link,$sql);
                            $k=mysqli_fetch_assoc($kq);
                        ?>
                        <div style="float:right; font-size:18px"><strong>Mã Hóa Đơn: <?=$k['code_order']?></strong></div>
                        <div style="clear:both"></div>
                        <div style="float:left"><strong>Địa chỉ: 115 Hai Bà Trưng, P.Bến Nghé, Q.1, TP.HCM</strong></div>        
                    </div>
                    <br/>
                    <div class="title">
                        HÓA ĐƠN THANH TOÁN
                        <br/>
                        -------oOo-------
                    </div>
                    <br/>
                    <br/>
                    <table class="TableData">
                        <tr>
                            <th>STT</th>
                            <th>Tên</th>
                            <th>Đơn giá</th>
                            <th>Số lượng</th>
                            <th>Thành tiền</th>
                        </tr>
                        <?php
                        $sql="select a.*,b.`vi_name` as ten,b.`img_url` as hinh from `of_order_detail` as a,`of_food` as b where `order_id`={$id} and a.`food_id` = b.`id`";
                        $rs=mysqli_query($link,$sql);
                        $total=0;
                        $stt=1;
                        while($r=mysqli_fetch_assoc($rs)){

                            echo "<tr>";
                            echo "<td class=\"cotSTT\">".$stt++."</td>";
                            echo "<td class=\"cotTenSanPham\">".$r['ten']."</td>";
                            echo "<td class=\"cotGia\"><div id='giasp'>".number_format($r['price'])."</div></td>";
                            echo "<td class=\"cotSoLuong\" align='center'>x".$r['qty']."</td>";
                            echo "<td class=\"cotSo\">".number_format(($r['qty']*$r['price']))."</td>";
                            echo "</tr>";
                            $total += $r['price']*$r['qty'];
                        }
						
							//Đọc số tiền ra chữ
							$thanhtien="";
							$thanhtien=VndText($total);
	 
                        ?>
                        <tr>
                            <td colspan="4" class="tong">Tổng Thành Tiền</td>
                            <td class="cotSo"><span style="font-weight:bold"><?=number_format($total)?></span></td>
                        </tr>
                    </table>
                    
                    <div style="font-size:18px; float:right; margin-top:12px"><strong>Ghi bằng chữ</strong>:&nbsp<?php  echo $thanhtien;?> </div>
    				<div style="clear:right"></div>
                    
                    <div class="footer-right">
                        <?php
                            $sql="select `date` from `of_bill` where `order_id`={$id}";
                            $kq=mysqli_query($link,$sql);
                            $k=mysqli_fetch_assoc($kq);
                        ?>
                        <p><strong>TP.HCM</strong>, <?=date('d/m/Y',strtotime($k['date']));?></p>
                        <p>Nhân Viên</p>
                    </div>
                    <div class="footer-left">
                        <p style="margin-top:22px">Khách Hàng</p>
                    </div> 

                </div>
            </div>
            <div style="margin-top:10px; text-align:center">                
                <a id="nut_tt" href="?mod=solve_payment&orderID=<?=$id?>&num_table=<?=$num_table?>&total=<?=$total?>"><input type="button" value="Thanh Toán" class="btn btn-success btn-lg"></a>
            </div>
        </div>
    </div>
</div>

</body>

<script>
	function Print(content)
	{
		var restorepage = document.body.innerHTML;
		var printcontent = document.getElementById(content).innerHTML;
		document.body.innerHTML = printcontent;
		window.print();
		document.body.innerHTML = restorepage;
	}
</script>

<?php
//Hàm Đọc Số Tiền Ra Chữ
function VndText($amount)
{
         if($amount <=0)
        {
            return $textnumber="Tiền phải là số nguyên dương lớn hơn số 0";
        }
        $Text=array("không", "một", "hai", "ba", "bốn", "năm", "sáu", "bảy", "tám", "chín");
        $TextLuythua =array("","nghìn", "triệu", "tỷ", "ngàn tỷ", "triệu tỷ", "tỷ tỷ");
        $textnumber = "";
        $length = strlen($amount);
        
        for ($i = 0; $i < $length; $i++)
        $unread[$i] = 0;
        
        for ($i = 0; $i < $length; $i++)
        {               
            $so = substr($amount, $length - $i -1 , 1);                
            
            if ( ($so == 0) && ($i % 3 == 0) && ($unread[$i] == 0)){
                for ($j = $i+1 ; $j < $length ; $j ++)
                {
                    $so1 = substr($amount,$length - $j -1, 1);
                    if ($so1 != 0)
                        break;
                }                       
                       
                if (intval(($j - $i )/3) > 0){
                    for ($k = $i ; $k <intval(($j-$i)/3)*3 + $i; $k++)
                        $unread[$k] =1;
                }
            }
        }
        
        for ($i = 0; $i < $length; $i++)
        {        
            $so = substr($amount,$length - $i -1, 1);       
            if ($unread[$i] ==1)
            continue;
            
            if ( ($i% 3 == 0) && ($i > 0))
            $textnumber = $TextLuythua[$i/3] ." ". $textnumber;     
            
            if ($i % 3 == 2 )
            $textnumber = 'trăm ' . $textnumber;
            
            if ($i % 3 == 1)
            $textnumber = 'mươi ' . $textnumber;
            
            
            $textnumber = $Text[$so] ." ". $textnumber;
        }
        
        //Phai de cac ham replace theo dung thu tu nhu the nay
        $textnumber = str_replace("không mươi", "lẻ", $textnumber);
        $textnumber = str_replace("lẻ không", "", $textnumber);
        $textnumber = str_replace("mươi không", "mươi", $textnumber);
        $textnumber = str_replace("một mươi", "mười", $textnumber);
        $textnumber = str_replace("mươi năm", "mươi lăm", $textnumber);
        $textnumber = str_replace("mươi một", "mươi mốt", $textnumber);
        $textnumber = str_replace("mười năm", "mười lăm", $textnumber);
        
        return ucfirst($textnumber." đồng chẵn");
}
?>

