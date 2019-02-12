
<script src="lib/notice.js"></script>
<?php
if(! isset($_SESSION['admin_id']))
{
    header("location:?mod=dangnhap");
}

?>
<!--Reload Page-->
<!--<meta http-equiv="refresh" content="number;url=http://localhost/project-orderfood/ProjectOrder/admin.php?mod=home">
<script src="lib/pusher.min.js"></script>
  <script type="text/javascript">
    Pusher.logToConsole = true;
    var pusher = new Pusher('161363aaa8197830a033', {
      cluster: 'ap1',
      encrypted: true
    });
    var channel = pusher.subscribe('Reload');
    // chanel trùng voi chanel trong send.php
    channel.bind('notices', function () {
		 window.location.reload();
        // kết thúc code xử lý thông báo
    });
</script>-->
<style>
    table.dataTable{
        border-collapse:collapse;
    }
</style>
<body style="background-image:url(img/front/pexels-photo-326333.jpeg); background-size: cover; font-family: 'Anton', sans-serif;">
<div class="container">
    <div class="row"  style="background-color: #FFF; margin-top: 5%; border-radius: 20px; padding: 20px;">
        <a href="?mod=home" style="font-size:36px; color: black"><i class="fas fa-arrow-left"></i></a>
        <div style="clear:right"></div>
        <div style="padding-bottom:25px; padding-top:25px" class="col-md-12 col-sm-12 col-xs-12">
            <!--<p style="text-align:center"><a href="?mod=home"><button class="btn btn-success">Làm Mới</button></a></p>-->
            <h2 style=" text-align:center;">Lịch Sử Đặt Món</h2>
        </div>
        <div class="table-responsive"></div>
        <table class="col-md-12 col-sm-12 col-xs-12 table-bordered" id="datatable" style=" margin-top:15px; overflow-x: scroll">
            <thead>
            <tr style="font-size:20px">
                <td align="center">Số Bàn</td>
                <td>Giờ Đặt</td>
                <td align="center">Trạng Thái</td>
                <td align="center"></td>
            </tr>
            </thead>
                <tr>
                    <td align="center" style="color:#906">
                       Bàn 1
                    </td>
                    <td align="left">&nbsp;&nbsp;
                        <span style=" font-size: 18px;">15/5/2019 69:69:96</span>
                    </td>
                    <td align="center">
                        Đang Mần
                    </td>
                    <td align="center">
                        <a data-toggle="modal" data-target="#table_info" >Chi Tiết</a>
                    </td>
                </tr>
        </table>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="table_info" role="dialog">
        <div class="modal-dialog" style="width: 24%">

            <!-- Modal content-->
            <div class="modal-content" style="border-radius: 5px;">
                <div class="modal-header" style="background-color: #5ab738; color: white" >
                    <h3 class="modal-title" >Bàn 1</h3>
                </div>
                <div class="modal-body">
                    <table class="table no-border">
                        <tr style="border-bottom: dashed grey thin;">
                            <td>1 x Cu xào lông nách chấm mấm ruốc pha mắm tôm</td>
                        </tr>
                        <tr style="border-bottom: dashed grey thin;">
                            <td>1 x Cu xào</td>
                        </tr>
                        <tr style="border-bottom: dashed grey thin;">
                            <td>1 x Cu xào</td>
                        </tr>
                    </table>
                </div>
                <div class="modal-footer" style="border-bottom: solid #5ab738 5px;">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
                </div>
            </div>

        </div>
    </div>

</div>
</body>
<script>
    $(document).ready(function(){
        $('#datatable').DataTable( {
            language: {
                url: 'lib/datatable/Vietnamese.json'
            }
        });
    });



</script>