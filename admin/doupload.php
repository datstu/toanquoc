<?php


	include_once '../lib/database.php';
if(isset($_POST['ok_upload']))
{
	 $num=$_GET['file'];
      for($i=0; $i< $num; $i++)
		{
		 move_uploaded_file($_FILES['img']['tmp_name'][$i],"uploads/".$_FILES['img']['name'][$i]);
		 $url="uploads/".$_FILES['img']['name'][$i];
		 $name=$_FILES['img']['name'][$i];
		 $sql="insert into images(imgName) values('$url','$name')";
		 $result = $this -> db ->insert($sql);
		 if($result){
					$alert = "<span class='success'> Upload Thanh cong file <b>$name</b><br /> </span>";
					return $alert;
				}else{
					$alert = "<span class='error'> Insert Product Not Success </span>";
					return $alert;
				}
		 
		  
		  echo "Images URL: <input type='text' name='link' value='$site/$url' size='35' /><br />";
   
		}
}
else
{
      echo "Vui long chon hinh truoc khi truy cap vao trang nay";
}
?>