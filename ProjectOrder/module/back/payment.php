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
    width: 21cm;
    overflow:hidden;
    min-height:auto;
    padding: 2.5cm;
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
button {
    width:100px;
    height: 24px;
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
 margin: 0;
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

<body  style=" background-image:url(img/front/blur-close-up-cutlery-370984.jpg);">
<div class="container">
    <div class="row">
        <div class="col-xs-12" style="background-color: white">
            <a href="?mod=home_thanhtoan" class="btn" style="font-size: 36px; color: black"><i class="fas fa-arrow-left"></i></a>
            <div id="content">
                <div id="page" class="page">
                    <div class="header">
                        <div class="company">Nhà Hàng 5 Con Dê</div>
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
                        $sql="select a.*,b.`name` as ten,b.`img_url` as hinh from `of_order_detail` as a,`of_food` as b where `order_id`={$id} and a.`food_id` = b.`id`";
                        $rs=mysqli_query($link,$sql);
                        $total=0;
                        $stt=1;
                        while($r=mysqli_fetch_assoc($rs)):

                            echo "<tr>";
                            echo "<td class=\"cotSTT\">".$stt++."</td>";
                            echo "<td class=\"cotTenSanPham\">".$r['ten']."</td>";
                            echo "<td class=\"cotGia\"><div id='giasp'>".number_format($r['price'])."</div></td>";
                            echo "<td class=\"cotSoLuong\" align='center'>x".$r['qty']."</td>";
                            echo "<td class=\"cotSo\">".number_format(($r['qty']*$r['price']))."</td>";
                            echo "</tr>";
                            $total += $r['price']*$r['qty'];
                        endwhile
                        ?>
                        <tr>
                            <td colspan="4" class="tong">Tổng cộng</td>
                            <td class="cotSo"><span style="font-weight:bold"><?=number_format($total)?></span></td>
                        </tr>
                    </table>
                    <div class="footer-right">
                        <?php
                        $sql="select `date` from `of_bill` where `order_id`={$id}";
                        $kq=mysqli_query($link,$sql);
                        $k=mysqli_fetch_assoc($kq);
                        ?>
                        <p><strong><strong>Bàn</strong>:<?=$num_table?> - Ngày</strong>: <?=date("d/m/Y",strtotime($k['date']))?></p>
                        <p>Cảm Ơn Quý Khách. Hẹn Gặp Lại Nhé ^o^</p>
                    </div>


                </div>
            </div>
            <div style="margin-top:10px; text-align:center">
                <a href="javascript:void(0)" onclick="Print('content')" class="btn btn-success btn-lg">In hóa đơn</a>
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

