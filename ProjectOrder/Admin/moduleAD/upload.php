<script src="bower_components/jquery/dist/jquery.min.js"></script>
<link rel="stylesheet" href="bower_components/font-awesome/css/all.css">
<Style>
    #icon{
        font-size: 80px;
        color: silver;
        position: absolute;
        left: 200px;
        top:20px;
        animation-name: icon;
        animation-duration: 1s;
        animation-iteration-count: infinite;

    }
    @keyframes icon {
        0%   {top:25px;}
        50%  {top:5px;}
        100% {top:25px;}
    }
    #form_upload{
        width: 500px;
        height: 200px;
        border: 2px dashed silver;
        background-color: #f7f7f7;
        border-radius: 20px;
        position: relative;
        margin-bottom: 50px;
    }
    #form_upload p{
        width: 100%;
        height: 100%;
        text-align: center;
        line-height: 250px;
        color: silver;
        font-family: Arial;
        font-size: 20px;
    }
    #form_upload input{
        position: absolute;
        margin: 0;
        padding: 0;
        width: 500px;
        height: 200px;
        outline: none;
        opacity: 0;
    }
    #form_upload button{
        color: #fff;
        background: #16a085;
        border: none;
        width: 508px;
        height: 35px;
        border-radius: 4px;
        border-bottom: 4px solid #117A60;
        transition: all .2s ease;
        outline: none;
        margin-bottom: 50px;
    }
    #form_upload button:hover{
        background: #149174;
        color: #0C5645;
    }
    #form_upload button:active{
        border:0;
    }

</Style>

 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
   <section class="content-header">
        <h1>
            <?=_GALLERY?>
            
        </h1>
        <ol class="breadcrumb">
            <li><a href="trang-chu.html"><i class="fa fa-dashboard"></i><?=_HOME?></a></li>
            <li><a href="danh-sach-admin.html"><?=_LIST?></a></li>
            <li class="active"><?=_ADD?></li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary" style="padding: 10px;">

                    <div class="row">
                        <div class="col-md-6" style="">
                            <h1><?=_UPLOAD?></h1>
                            <!--<form method="POST" action="" enctype="multipart/form-data">
                                <a>Chọn Files không vượt quá 8Mb</a>
                                <br>
                                <input type="file" name="file[]" multiple/>
                                <input type="submit" name="uploadclick" value="Upload"/>
                               </form>-->
                            <form action="" method="POST" id="form_upload" enctype="multipart/form-data">
                                <input type="file" name="file[]" multiple>
                                <i class="fa fa-cloud-upload" id="icon"></i>
                                <p><?=_DROPDRAG?></p>
                                <button type="submit" name="uploadclick"  value="Upload"><?=_UPLOAD?></button>
                            </form>
                        </div>
                        <div class="col-md-6" style="max-height: 350px; overflow-y: scroll;">
                            <?php
                            // Xử Lý Upload
                            if (isset($_POST['uploadclick']))
                            {
                                $name=array();
                                $tmp_name=array();
                                $error=array();
                                $type=array();
                                $size=array();
                                foreach ($_FILES['file']['name'] as $file){
                                    $name[]=$file;
                                }
                                foreach ($_FILES['file']['tmp_name'] as $file){
                                    $tmp_name[]=$file;
                                }
                                foreach ($_FILES['file']['error'] as $file){
                                    $error[]=$file;
                                }
                                foreach ($_FILES['file']['type'] as $file){
                                    $type[]=$file;
                                }
                                foreach ($_FILES['file']['size'] as $file){
                                    $size[]=round($file/1024,2);
                                }
                                //tach gia tri ra tung mang nho
                                echo "<h3>"; echo _TOTALPIC; echo": ".count($name)."</h3>";
                                //echo "<table style='color:red'>\n <thead>\n<th>Tên file</th>\n<th>Loại</th>\n<th>Kích Thước</th>\n<th>Thư mục</th> ";
                                for($i=0;$i<count($name);$i++){
                                    if($error[$i]>0){
                                        echo "<span style='color: red; font-size: 20px;'><i class=\"fa fa-times-circle\" aria-hidden=\"true\"></i></span> "; echo _ERRORFILE; echo $error[$i];
                                    }
                                    //elseif($type[$i]!='application/save'){
                                    //echo "File không được hỗ trợ ".$type[$i];
                                    //}
                                    else{
                                        $temp=preg_split('/[\/\\\\]+/',$name[$i]);
                                        $filename=$temp[count($temp)-1];
                                        $upload_dir="../userfiles/files/";
                                        $upload_file=$upload_dir.$filename;
                                        if(file_exists($upload_file)){
                                            echo $name[$i]."<br><span style='color: yellow; font-size: 20px;'><i class=\"fa fa-exclamation-triangle\" aria-hidden=\"true\"></i></span>"._EXIST."<br>";
                                        }
                                        else{
                                            if(move_uploaded_file($tmp_name[$i],$upload_file)){
                                                //echo "<tr>\n<td>".$name[$i]."</td>\n";
//					echo '<td>'.$type[$i]."</td>\n";
//					echo '<td>'.$size[$i]."kB </td>\n";
//					echo '<td>'.$upload_file."</td>\n</tr>";
//					$date = date("d-m-Y");
                                                //$sql="insert into `url_img` values (NULL,'$id','$name[$i]')";
                                                //mysqli_query($link,$sql);
                                                echo"Tên:" .$name[$i]."<br> <span style='color: green; font-size: 20px;'><i class=\"fa fa-check-circle\" aria-hidden=\"true\"></i></span>"._UPSUCCESS;?><br><?php
                                            }
                                        }
                                    }
                                }
                            }
                            ?>
                        </div>
                    </div>

		   		</div>
            </div>
         
        </div>
    </section>
</div>
<script>
    $(document).ready(function(){
        $('form input').change(function () {
            $('form p').text(this.files.length + " <?=_CHOSEN?>");
        });
    });
</script>