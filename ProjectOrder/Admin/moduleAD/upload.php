
  
<div class="wrapper">
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
   <section class="content-header">
        <h1>
            Thư Viện
            <small>Ảnh</small>
            
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
		echo "Tổng số file được tải lên: ".count($name)."<br>";
		//echo "<table style='color:red'>\n <thead>\n<th>Tên file</th>\n<th>Loại</th>\n<th>Kích Thước</th>\n<th>Thư mục</th> ";
		for($i=0;$i<count($name);$i++){
			if($error[$i]>0){
			echo "Lỗi: File thứ ".$error[$i]." không tải lên dc.";
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
				echo "File '".$name[$i]."' đã tồn tại!"."<br>";			
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
					echo $name[$i]." tải Lên Thành Công";?><br><?php
					}	
				}
			}
		}
	}

?>
            	<div class="box box-primary">
	            	<form method="POST" action="" enctype="multipart/form-data">
				    	<a>Chọn Files không vượt quá 8Mb</a>
				        <br>
				        <input type="file" name="file[]" multiple/>
				        <input type="submit" name="uploadclick" value="Upload"/>
			   		</form>
		   		</div>
            </div>
         
        </div>
    </section>
</div>
</div>