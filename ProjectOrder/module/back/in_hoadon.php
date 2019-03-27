<?php
	if(! isset($_SESSION['admin_id']))
	{
		header("location:?mod=dangnhap");	
	}
	$id = takeGet('id');
	$num_table = takeGet('num_table');
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
    }
    .subpage {
        padding: 1cm;
        border: 5px red solid;
        height: 237mm;
        outline: 2cm #FFEAEA solid;
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
        font-size: 24px;
        top:1px;
        margin-top:20px;
        font-weight: bold;
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
    }
    .TableData TH {
        font-weight: bold;
        color: #000;
        height: 24px;
        font-size: 15px;
    }
    .TableData TR {
        height: 24px;
    }
    .TableData TR TD {
        padding-right: 2px;
        padding-left: 2px;

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
        text-align:center;
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
        text-transform:uppercase;
        padding-right: 4px;
    }
    .TableData .cotSoLuong input {
        text-align: center;
    }
    @media print {
        @page {
            margin: 0px;
            border: initial;
            border-radius: initial;
            width: initial;
            box-shadow: initial;
            background: initial;
            page-break-after: always;
        }
    }
    .word-wrap {
        word-wrap: break-word;
    }
</style>


<body  style="background-image: url(img/back/adult-ancient-artisan-1062269.jpg); background-size: cover;">
<div class="container" style="margin-bottom:50px">
    <div class="row" style="background-color: #FFF; margin-top: 5%; border-radius: 20px; padding: 20px;">
        <div class="col-xs-12" style="background-color: white">
            <a href="?mod=home_thanhtoan" class="btn" style="font-size: 36px; color: black"><i class="fas fa-arrow-left"></i></a>
            <form name="form1" method="post" id="form1">
                  Chon size:
                    <select name="change" onChange="form1.submit();">
                        <?php
                                if(isset($_POST['change'])) {
                                    $change = takePost('change');
                                }
                                else{
                                    $change= '58';
                                }
                                ?>
                        <option value="a4" <?php if( $change == 'a4') echo "selected"; ?>>A4</option>
                        <option value="58" <?php if($change == '58') echo "selected"; ?>>58</option>
                        <option value="80" <?php if($change == '80') echo "selected"; ?>>80</option>

                    </select>
            </form>
            <?php
                if( $change == 'a4')
                {
             ?>
            <div id="content">
                <div id="page" class="page">
                    <div class="header" style="margin-top:10px">

                        <?php
                        	$k = selectWithCondition_NumActOrByIdDes($link, 'of_bill', $num_table, 1);
                        ?>
                        <table class="TableData table-responsive no-border">

                            <?php
                            $rs = selectPayment($link, $id);

                            //Truy vấn cho việc sử dụng $lang
                            $lang = select_UsingLang($link, $id);

                            $stt=1;
                            $total=0;
                            $gia_goc=0;
                            include "languages/lang_".$lang['country'].".php";
                            ?>
                            <div style="float:left; font-size:18px; margin-left:65px"><strong><?=_RESTAURANTNAME?></strong></div>
                            <div style="float:right; font-size:18px"><strong><?=_CODENO?>: #<?=$k['code_order']?></strong></div>
                            <div style="clear:both"></div>
                            <div style="float:left"><strong><?=_RESTAURANTADDRESS?></strong></div>
                            <div style=" margin-left:90px; clear: both"><b>www.orderfood.cf</b>
                                <br><br><span style=" margin-left:30px; font-size: 25px; border-top: solid thin; border-bottom: solid thin;   "><b><?=_TABLE?>:<?=$num_table?></b></span>
                            </div>

                    </div>
                    <br/>
                    <div class="title">
                        <?=_RECEIPT?>
                        <br/>
                        -------oOo-------
                    </div>
                    <br/>
                    <br/>
                    <tr style="text-transform: uppercase; border-top: solid lightgrey; border-bottom: solid lightgrey " >
                        <th><?=_STT?></th>
                        <th ><?=_DISH?></th>
                        <th><?=_PRICE?></th>
                        <th><?=_QTY?></th>
                        <!--<th><?=_DISCOUNT?></th>-->
                        <th class="text-right"><?=_AMOUNT?></th>
                    </tr>
                    <?php
                    while($r=mysqli_fetch_assoc($rs)){

                        $gia_temp=$r['price']-(($r['km']*$r['price'])/100);

                        echo "<tr style='border-bottom: dashed thin; '>";
                        echo "<td class=\"cotSTT\" >".$stt++."</td>";
                        echo "<td class=\"cotTenSanPham\">".$r[$r['country'].'_name']."</td>";
                        echo "<td class=\"cotGia\"><div id='giasp'>".number_format($r['price'])."</div></td>";
                        echo "<td class=\"cotSoLuong\" align='center'>".$r['qty']."</td>";
                        /*echo "<td class=\"cotSoLuong\" align='center'>".$r['km']."%</td>";*/
                        echo "<td class=\"cotSo\" >".number_format(($r['qty']*$gia_temp))."</td>";
                        echo "</tr>";
                        $total += $gia_temp*$r['qty'];
                        $gia_goc += $gia_temp*$r['qty'];
                    }
                    //Truy vấn ngày trong đơn món
                    $show_date_order = selectIdWithCondition($link, 'of_order', $id);

                    //Truy vấn ngày trong hóa đơn
                    $show_date_bill = selectWithCondition_OrderId($link, 'of_bill', $id);

                    //Truy vấn lấy ngày và giá trị khuyến mãi
                    $giatri_km=0;
                    $khuyen_mai = selectWithCondition_Act0($link, 'of_discount', 1);
                    if(mysqli_num_rows($khuyen_mai)>0)
                    {
                        $show_km = mysqli_fetch_assoc($khuyen_mai);
                        $giatri_km = $show_km['discount'];
                        $from = $show_km['create_at'];
                        $to = $show_km['end_at'];

                        if($show_date_bill['date'] <= $to && $show_date_bill['date'] >= $from)
                        {
                            $total = $total - (( $total * $giatri_km ) /100);
                        }
                        else
                        {
                            $giatri_km =0;
                        }
                    }

                    //Đọc số tiền ra chữ
                    $thanhtien="";
                    $clgt=$lang['country']."Text";
                    $thanhtien=$clgt($total);

                    ?>
                    <tr>
                        <td colspan="4" class="tong"><?=_TOTALPRICE?></td>
                        <td class="cotSo"><span ><?=number_format($gia_goc)?></span></td>
                    </tr>
                    <tr>
                        <td colspan="4" class="tong"><?=_DISCOUNT?></td>
                        <td class="cotSo"><span ><?=$giatri_km?>%</span></td>
                    </tr>
                    <tr>
                        <td colspan="4" class="tong" style="font-weight: bold; font-size: 18px"><?=_CASH?></td>
                        <td class="cotSo" style="font-size: 18px"><span style="font-weight:bold"><?=number_format($total)?></span></td>
                    </tr>
                    </table>

                    <div style="font-size:18px; float:left; margin-top:12px; margin-left:80px"><strong><?=_TOTALBYWORDS?></strong>:&nbsp<?php  echo $thanhtien;?> </div>
                    <div style="clear:left"></div>

                    <div class="footer-right">
                        <p><strong><?=_CITY?></strong>, <?=date('d/m/Y',strtotime($show_date_bill['date']));?> <i>(<?=_ODEREDAT?>:<?=date('d/m/y H:i',strtotime($show_date_order['date']))?>)</i></p>
                        <p><?=_CASHIER?></p>
                    </div>
                    <div class="footer-left">
                        <p style="margin-top:22px"><?=_CUSTOMER?></p>
                    </div>

                </div>
            </div>
           <?php } ?>

            <?php
                if( $change == '58')
                {
                    ?>
            <div id="content" >
                <div id="page" class="page" style="width: 58mm; font-family: Courier; text-transform: uppercase; ">
                    <?php
                    	$k = selectWithCondition_NumActOrByIdDes($link, 'of_bill', $num_table, 1);
                    ?>
                    <?php
                    $rs = selectPayment($link, $id);

                    //Truy vấn cho việc sử dụng $lang
                    $lang = select_UsingLang($link, $id);
                    //Truy vấn ngày trong hóa đơn
                    $show_date_bill = selectWithCondition_OrderId($link, 'of_bill', $id);
                    //Truy vấn ngày trong đơn món
                    $show_date_order = selectIdWithCondition($link, 'of_order', $id);
                    //Truy vấn tên nv
                    $show_cashier = selectWithCondition_Cate($link, 'of_manage', 2);
                    $stt=1;
                    $total=0;
                    $gia_goc=0;
                    include "languages/lang_".$lang['country'].".php";
                    ?>

                    <p style="font-size: .9em;" align="center"><b><?=_RESTAURANTNAME?></b><br><?=_RESTAURANTADDRESS?><br><b><?=_PHONE?>:096.969.696</b><br><b style="font-size: .85em">www.orderfood.cf</b></p>
                    <div style="border-bottom: dashed 1px; margin: 0.2em"></div>
                    <p style="font-size: .9em;"><?=_ODEREDAT?>:<?=date('d/m/y H:i',strtotime($show_date_order['date']))?><br><?=_DATE?>:<?=date('d/m/Y H:i',strtotime($show_date_bill['date']));?><br><?=_CODENO?>:#<?=$k['code_order']?><br><?=_CASHIER?>:<?=$show_cashier['name']?><br><b><?=_TABLE?>:<?=$num_table?></b></p>
                    <div style="border-bottom: dashed 1px; margin: 0.2em"></div>
                    <table class=" word-wrap no-border" style="font-size: .9em;">
                        <tr style=" height: 25px; font-size: .9em">
                            <th class="text-left" style="width: 40%"><?=_NAME?></th>
                            <th class="text-center"><?=_QTY2?></th>
                            <th class="text-center"><?=_PRICE2?></th>
                            <th class="text-left"><?=_TOTALPRICE?></th>
                        </tr>
                        <?php
                        while($r=mysqli_fetch_assoc($rs)){

                            $gia_temp=$r['price']-(($r['km']*$r['price'])/100);

                            echo "<tr >";
                            echo "<td class=\"cotTenSanPham\" style='width:10%;padding-bottom: .3em;'>".$r[$r['country'].'_name']."</td>";
                            echo "<td class=\"cotSoLuong\" align='center' style='font-size: .8em; padding-bottom: .3em;vertical-align: middle;'>".$r['qty']."</td>";
                            echo "<td class=\"cotGia\" align='center' style=\"font-size: .8em;padding-bottom: .3em; vertical-align: middle;\"><div id='giasp'>".number_format($r['price'])."</div></td>";
                            echo "<td class=\"cotSo\" align='left'  style=\"font-size: .8em;padding-bottom: .3em; vertical-align: middle;\">".number_format(($r['qty']*$gia_temp))."</td>";

                            echo "</tr>";
                            $total += $gia_temp*$r['qty'];
                            $gia_goc += $gia_temp*$r['qty'];
                        }



                        //Truy vấn lấy ngày và giá trị khuyến mãi
                        $giatri_km=0;
                        $khuyen_mai = selectWithCondition_Act0($link, 'of_discount', 1);

                        if(mysqli_num_rows($khuyen_mai)>0)
                        {
                            $show_km = mysqli_fetch_assoc($khuyen_mai);
                            $giatri_km = $show_km['discount'];
                            $from = $show_km['create_at'];
                            $to = $show_km['end_at'];

                            if($show_date_bill['date'] <= $to && $show_date_bill['date'] >= $from)
                            {
                                $total = $total - (( $total * $giatri_km ) /100);
                            }
                            else
                            {
                                $giatri_km =0;
                            }
                        }

                        //Đọc số tiền ra chữ
                        $thanhtien="";
                        $clgt=$lang['country']."Text";
                        $thanhtien=$clgt($total);

                        ?>
                    </table>
                    <div style="border-bottom: dashed 1px; margin: 0.2em"></div>
                    <table class="no-border" style="font-size: .9em;">
                        <tr style=" height: 25px;">
                            <td align="right" style="font-size: .9em">+ <?=_TOTALPRICE?>:</td>
                            <td align="right" class="col-xs-1" style="border-bottom: dashed 1px;"><?=number_format($gia_goc)?></td>
                        </tr>
                        <tr style=" height: 25px;">
                            <td align="right" style="font-size: .9em">+ <?=_DISCOUNT?>:</td>
                            <td align="right" class="col-xs-1" style="border-bottom: dashed 1px;"><?=$giatri_km?>%</td>
                        </tr>
                        <tr style="font-weight: bold; height: 25px; font-size: 1.2em">
                            <td align="right"><?=_CASH?>:</td>
                            <td align="right" class="col-xs-1"><?=number_format($total)?></td>
                        </tr>
                    </table>
                    <div style="border-bottom: dashed 1px; margin: 0.2em"></div>
                    <p align="center" style="font-size:.8em"><br><b><i><?=_AGAIN?></i></b></p>
                </div>
            </div>
            </div>


               <?php  }
             ?>
        <?php
        if( $change == '80')
        {
        ?>
        <div id="content" >
            <div id="page" class="page" style="width: 80mm; font-family: Courier; text-transform: uppercase;">
                <?php
                	$k = selectWithCondition_NumActOrByIdDes($link, 'of_bill', $num_table, 1);
                ?>
                <?php
                $rs = selectPayment($link, $id);

				//Truy vấn cho việc sử dụng $lang
				$lang = select_UsingLang($link, $id);
                //Truy vấn ngày trong hóa đơn
				$show_date_bill = selectWithCondition_OrderId($link, 'of_bill', $id);
				//Truy vấn ngày trong đơn món
				$show_date_order = selectIdWithCondition($link, 'of_order', $id);
				//Truy vấn tên nv
				$show_cashier = selectWithCondition_Cate($link, 'of_manage', 2);

                $stt=1;
                $total=0;
                $gia_goc=0;
                include "languages/lang_".$lang['country'].".php";
                ?>

                <p style="font-size: .9em;" align="center"><b><?=_RESTAURANTNAME?></b><br><?=_RESTAURANTADDRESS?><br><b><?=_PHONE?>:096.969.696</b><br><b style="font-size: .85em">www.orderfood.cf</b></p>
                <div style="border-bottom: dashed 1px; margin: 0.2em"></div>
                <p style="font-size: .9em;"><?=_ODEREDAT?>:<?=date('d/m/y H:i',strtotime($show_date_order['date']))?><br><?=_DATE?>:<?=date('d/m/Y H:i',strtotime($show_date_bill['date']));?><br><?=_CODENO?>:#<?=$k['code_order']?><br><?=_CASHIER?>:<?=$show_cashier['name']?><span style="float: right"><b><?=_TABLE?>:<?=$num_table?></b></span></p>
                <div style="border-bottom: dashed 1px; margin: 0.2em"></div>
                <table class=" word-wrap no-border" style="font-size: .9em;">
                    <tr style=" height: 25px; font-size: .9em">
                        <th class="text-center" >#</th>
                        <th class="text-left" ><?=_NAME?></th>
                        <th class="text-center"><?=_QTY2?></th>
                        <th class="text-center"><?=_PRICE2?></th>
                        <th class="text-right"><?=_TOTALPRICE?></th>
                    </tr>
                    <?php
                    while($r=mysqli_fetch_assoc($rs)){

                        $gia_temp=$r['price']-(($r['km']*$r['price'])/100);

                        echo "<tr >";
                        echo "<td class=\"cotSTT text-center\" style='width: 5%; vertical-align: top;' >".$stt++."</td>";
                        echo "<td class=\"cotTenSanPham\" style='width:50%;padding-bottom: .3em;'>".$r[$r['country'].'_name']."</td>";
                        echo "<td class=\"cotSoLuong\" align='center' style='font-size: .8em; padding-bottom: .3em;vertical-align: middle; width:10%'>".$r['qty']."</td>";
                        echo "<td class=\"cotGia\" align='center' style=\"font-size: .8em;padding-bottom: .3em; vertical-align: middle;width:20%\"><div id='giasp'>".number_format($r['price'])."</div></td>";
                        echo "<td class=\"cotSo\" align='right'  style=\"font-size: .8em;padding-bottom: .3em; vertical-align: middle;width:20%\">".number_format(($r['qty']*$gia_temp))."</td>";

                        echo "</tr>";
                        $total += $gia_temp*$r['qty'];
                        $gia_goc += $gia_temp*$r['qty'];
                    }

                    //Truy vấn ngày trong hóa đơn
                    $show_date_bill = selectWithCondition_OrderId($link, 'of_bill', $id);

                    //Truy vấn lấy ngày và giá trị khuyến mãi
                    $giatri_km=0;
                    $khuyen_mai = selectWithCondition_Act0($link, 'of_discount', 1);

                    if(mysqli_num_rows($khuyen_mai)>0)
                    {
                        $show_km = mysqli_fetch_assoc($khuyen_mai);
                        $giatri_km = $show_km['discount'];
                        $from = $show_km['create_at'];
                        $to = $show_km['end_at'];

                        if($show_date_bill['date'] <= $to && $show_date_bill['date'] >= $from)
                        {
                            $total = $total - (( $total * $giatri_km ) /100);
                        }
                        else
                        {
                            $giatri_km =0;
                        }
                    }

                    //Đọc số tiền ra chữ
                    $thanhtien="";
                    $clgt=$lang['country']."Text";
                    $thanhtien=$clgt($total);

                    ?>
                </table>
                <div style="border-bottom: dashed 1px; margin: 0.2em"></div>
                <table class="no-border" style="font-size: .9em;">
                    <tr style=" height: 25px;">
                        <td align="right" style="font-size: .9em">+ <?=_TOTALPRICE?>:</td>
                        <td align="right" class="col-xs-1" style="border-bottom: dashed 1px;"><?=number_format($gia_goc)?></td>
                    </tr>
                    <tr style=" height: 25px;">
                        <td align="right" style="font-size: .9em">+ <?=_DISCOUNT?>:</td>
                        <td align="right" class="col-xs-1" style="border-bottom: dashed 1px;"><?=$giatri_km?>%</td>
                    </tr>
                    <tr style="font-weight: bold; height: 25px; font-size: 1.2em">
                        <td align="right"><?=_CASH?>:</td>
                        <td align="right" class="col-xs-1"><?=number_format($total)?></td>
                    </tr>
                </table>
                <div style="border-bottom: dashed 1px; margin: 0.2em"></div>
                <p align="center" ><br><b><i><?=_AGAIN?></i></b></p>
            </div>
        </div>
    </div>

    <?php  }
    ?>
            <div style="margin-top:10px; text-align:center">
                <button  class="btn btn-info btn-lg" onClick="Print('content')" id="printbtn"><i class="fas fa-print  fa-1x"></i>In hóa đơn</button>
            </div>
        </div>

</body>

<script>
	function Print(content)
	{
        document.getElementById("printbtn").setAttribute("style", "display:none;");
		var restorepage = document.body.innerHTML;
		var printcontent = document.getElementById(content).innerHTML;
		document.body.innerHTML = printcontent;
		window.print();
		document.body.innerHTML = restorepage;
        document.getElementById('printbtn').removeAttribute("style");
	}
</script>
<?php
//Hàm Đọc Số Tiền Ra Chữ
function enText($num, $depth=0)
{
    $num = (int)$num;
    $retval ="";
    if ($num < 0) // if it's any other negative, just flip it and call again
        return "negative " + enText(-$num, 0);
    if ($num > 99) // 100 and above
    {
        if ($num > 999) // 1000 and higher
            $retval .= enText($num/1000, $depth+3);

        $num %= 1000; // now we just need the last three digits
        if ($num > 99) // as long as the first digit is not zero
            $retval .= enText($num/100, 2)." hundred\n";
        $retval .=enText($num%100, 1); // our last two digits
    }
    else // from 0 to 99
    {
        $mod = floor($num / 10);
        if ($mod == 0) // ones place
        {
            if ($num == 1) $retval.="one";
            else if ($num == 2) $retval.="two";
            else if ($num == 3) $retval.="three";
            else if ($num == 4) $retval.="four";
            else if ($num == 5) $retval.="five";
            else if ($num == 6) $retval.="six";
            else if ($num == 7) $retval.="seven";
            else if ($num == 8) $retval.="eight";
            else if ($num == 9) $retval.="nine";
        }
        else if ($mod == 1) // if there's a one in the ten's place
        {
            if ($num == 10) $retval.="ten";
            else if ($num == 11) $retval.="eleven";
            else if ($num == 12) $retval.="twelve";
            else if ($num == 13) $retval.="thirteen";
            else if ($num == 14) $retval.="fourteen";
            else if ($num == 15) $retval.="fifteen";
            else if ($num == 16) $retval.="sixteen";
            else if ($num == 17) $retval.="seventeen";
            else if ($num == 18) $retval.="eighteen";
            else if ($num == 19) $retval.="nineteen";
        }
        else // if there's a different number in the ten's place
        {
            if ($mod == 2) $retval.="twenty ";
            else if ($mod == 3) $retval.="thirty ";
            else if ($mod == 4) $retval.="forty ";
            else if ($mod == 5) $retval.="fifty ";
            else if ($mod == 6) $retval.="sixty ";
            else if ($mod == 7) $retval.="seventy ";
            else if ($mod == 8) $retval.="eighty ";
            else if ($mod == 9) $retval.="ninety ";
            if (($num % 10) != 0)
            {
                $retval = rtrim($retval); //get rid of space at end
                $retval .= "-";
            }
            $retval.=enText($num % 10, 0);
        }
    }

    if ($num != 0)
    {
        if ($depth == 3)
            $retval.=" thousand\n";
        else if ($depth == 6)
            $retval.=" million\n";
        if ($depth == 9)
            $retval.=" billion\n";
    }
    return $retval;
}

function viText($amount)
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
