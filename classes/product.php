
<?php 
$filepath = realpath(dirname(__FILE__));
include_once  ($filepath .'/../helper/format.php');
	include_once ($filepath .'/../lib/database.php');
 
	?>
<?php 
	/**
	 * 
	 */
	class product 
	{
		private $db;
		private $fm;
		
		public function __construct()
		{
			$this->db = new Database();
			$this->fm = new Format();
		}
		public function insert_product($data,$files){
		
			
			$productName = mysqli_real_escape_string($this -> db ->link,$data['productName']);//1 bien dử lieu +1bien ket noi CSDL
		
			$category = mysqli_real_escape_string($this -> db ->link,$data['category']);
			$brand = mysqli_real_escape_string($this -> db ->link,$data['brand']);
			$product_desc = mysqli_real_escape_string($this -> db ->link,$data['product_desc']);
			$type = mysqli_real_escape_string($this -> db ->link,$data['type']);
			$price = mysqli_real_escape_string($this -> db ->link,$data['price']);
			$price_old = mysqli_real_escape_string($this -> db ->link,$data['price_old']);
			$ghiChu = mysqli_real_escape_string($this -> db ->link,$data['ghiChu']);
			
			$mota = mysqli_real_escape_string($this -> db ->link,$data['product_desc_mini']);

			//kiểm tra hình ảnh và cho vào foder upload
			$permited   = array('jpg', 'png', 'jpeg', 'gif');

			$file_name = $_FILES['image']['name'];
			$file_temp = $_FILES['image']['tmp_name'];
			$file_size =  $_FILES['image']['size'];

			$div = explode('.', $file_name);
			$file_ext = strtolower(end($div));
			$unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
			$uploaded_image = "uploads/".$unique_image;

			
			

			if($productName =="" || $product_desc=="" || $category=="" || $brand =="" || $type=="" || $price=="" ||
			$file_name ==""){
				$alert = "<span class= 'error'>Field must be not empty! </span>";
				return $alert;
			}else{
				move_uploaded_file($file_temp,$uploaded_image);
				$query = "INSERT INTO tbl_product(productName,catID,brandID,product_desc,type,price,price_old,image,ghiChu,moTaNgan)
				 VALUES ('$productName','$category','$brand','$product_desc','$type','$price','$price_old','$unique_image','$ghiChu','$mota')";
				$result = $this -> db ->insert($query);

				if($result){
					$alert = "<span class='success'> Insert Product Success </span>";
					return $alert;
				}else{
					$alert = "<span class='error'> Insert Product Not Success </span>";
					return $alert;
				}

				}
		}
		public function show_product(){
			// $query = "SELECT * FROM tbl_product order by productID desc";
			
			$query="
			SELECT tbl_product.*, tbl_category.catName,tbl_brand.brandName
			FROM tbl_product INNER JOIN tbl_category ON tbl_product.catID = tbl_category.catID
			INNER JOIN tbl_brand ON tbl_product.brandID = tbl_brand.brandID
			order by tbl_product.productID desc
			";

			$result = $this -> db ->select($query);
			return $result;

		}
		public function show_imagesbyID($id){
			$query = "SELECT * FROM tbl_images where productID = '$id'";
			$result = $this -> db ->select($query);
			return $result;
		}
		public function getproductbyID($id){
			$query = "SELECT * FROM tbl_product where productID = '$id'";
			$result = $this -> db ->select($query);
			return $result;
		}
		public function add_image($data,$files,$id){

				$permited   = array('jpg', 'png', 'jpeg');
					foreach ($_FILES['img']['name'] as $i => $name) {
						
						

						$file_name = $_FILES['img']['name'][$i];
						$file_temp = $_FILES['img']['tmp_name'][$i];
						$file_size =  $_FILES['img']['size'][$i];

						
					 $expl = explode('.',$name);
					 $ext = end($expl);
					 $path = 'uploads/';
					 $path = $path.basename($expl[0].time().'.'.$ext);
					 $hinhanh = basename($expl[0].time().'.'.$ext);
						if(empty($file_temp)){ echo $thongbao = 'Làm ơn chọn ít nhất 1 ảnh';}
						else {
							$permited   = array('jpg', 'png', 'jpeg', 'gif');
							$max_size = 4000000;
							if(in_array($ext,$permited) == false){
								echo   'File <strong>'.$file_name.'</strong> không hợp lệ<br/>';
							}
							if($file_size > $max_size){
								echo   'File <strong>'.$file_name.'</strong> quá lớn<br/>';
							}
						}
						
							if(move_uploaded_file($file_temp,$path)){
								$sql = "INSERT INTO tbl_images(imgName,productid) VALUES('$hinhanh','$id')";
								$result = $this -> db ->insert($sql);
							if($result)
								{echo  'Update File <strong>'.$file_name.'</strong> thành công<br/>';}
						}
							else
							 {echo  'Update File <strong>'.$file_name.'</strong> thất bại<br/>';}

						}}
						
					
		public function update_product($data,$file,$id){
			$productName = mysqli_real_escape_string($this -> db ->link,$data['productName']);//1 bien dử lieu +1bien ket noi CSDL
		
			$category = mysqli_real_escape_string($this -> db ->link,$data['category']);
			$brand = mysqli_real_escape_string($this -> db ->link,$data['brand']);
			$product_desc = mysqli_real_escape_string($this -> db ->link,$data['product_desc']);
			$type = mysqli_real_escape_string($this -> db ->link,$data['type']);
			$price = mysqli_real_escape_string($this -> db ->link,$data['price']);
			$price_old = mysqli_real_escape_string($this -> db ->link,$data['price_old']);

			$ghichu = mysqli_real_escape_string($this -> db ->link,$data['ghiChu']);
			$mota = mysqli_real_escape_string($this -> db ->link,$data['product_desc_mini']);
			
			

			//kiểm tra hình ảnh và cho vào foder upload
			$permited   = array('jpg', 'png', 'jpeg', 'gif');

			$file_name = $_FILES['image']['name'];
			$file_temp = $_FILES['image']['tmp_name'];
			$file_size =  $_FILES['image']['size'];

			$div = explode('.', $file_name);
			$file_ext = strtolower(end($div));
			$unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
			$uploaded_image = "uploads/".$unique_image;
				if($productName =="" || $product_desc=="" || $category=="" || $brand =="" || $type=="" || $price==""){
				$alert = "<span class= 'error'>Field must be not empty! </span>";
				return $alert;
			}else{
				//nếu ng dùng chọn ảnh
				if(!empty($file_name))
				{
					if($file_size>2040800){ 
							$alert="<span class='error'> Image Size should be less 2MB! </span>";
							return $alert;
					}
					else if(in_array($file_ext,$permited) == false){
							$alert= "<span class='error'> You can uploads only:".implode(', ',$permited)." </span>";
							return $alert;
							}
							move_uploaded_file($file_temp,$uploaded_image);
					$query = "UPDATE tbl_product SET productName ='$productName',brandID ='$brand',
					catID ='$category',
					price ='$price',
					price_old ='$price_old',
					
					product_desc='$product_desc',
					type ='$type',
					image ='$unique_image',
					ghiChu='$ghichu',
				
					moTaNgan= '$mota'
					 
					WHERE productID = '$id'";
				}else //nếu ng dùng ko chọn ảnh
				{
					$query = "UPDATE tbl_product SET 
					productName ='$productName',
					brandID ='$brand',
					catID ='$category',
					price ='$price',
					price_old ='$price_old',
					
					product_desc='$product_desc',
					type ='$type',
					ghiChu='$ghichu',
				moTaNgan= '$mota'


					WHERE productID = '$id'";
				}
			



			

			
				$result = $this -> db ->update($query);

				if($result){
					$alert = "<span class='success'> Update Product Success </span>";
					return $alert;
				}else{
					$alert = "<span class='error'> Update Product  Not Success </span>";
					return $alert;
				}
			}
		
		}

		public function delete_product($id){
			$query = "DELETE FROM tbl_product WHERE productID ='$id'";
			$result = $this -> db ->delete($query);
				if($result){
					$alert = "<span class='success'> Delete product Success </span>";
					return $alert;
				}else{
					$alert = "<span class='error'> Delete product  Not Success </span>";
					return $alert;
				}

				}
				public function delete_images($id){
			$query = "DELETE FROM tbl_images WHERE imgID ='$id'";
			$result = $this -> db ->delete($query);
				if($result){
					$alert = "<span class='success'> Delete product image Success </span>";
					return $alert;
				}else{
					$alert = "<span class='error'> Delete product  image  Not Success </span>";
					return $alert;
				}

				}
				//end backend
				//
				//
				//start frontend
				public function getproduct_feathered()
				{
					$query = "SELECT * FROM tbl_product where type='0'";
					$result = $this -> db ->select($query);
					return $result;
				}

				public function getproduct_new()
				{
					$query = "SELECT * FROM tbl_product order by productID desc LIMIT 4";
					$result = $this -> db ->select($query);
					return $result;
				}
				//start function getproduct_sale
				public function getproduct_sale($n)
				{
					if($n == 3){ $x ='asc';}
					else if($n == 4){ $x ='desc';}
					$query = "SELECT * FROM tbl_product where type = '2' order by productID $x LIMIT 4";
					$result = $this -> db ->select($query);
					return $result;
				}
				
				// bat dau lay san pham duoi 3 trieu
				public function laySanPhamtheoLoai($soSp,$loai)
				{
					if($soSp == 3){ $x ='asc';}
					else if($soSp == 4){ $x ='desc';}

					if($loai =='duoi3'){ $y= 16;}
					else if($loai =='3den5'){ $y= 15;}
					else if($loai =='5den7'){ $y= 17;}
					else if($loai =='7den10'){ $y= 18;}
					else if($loai =='tren10'){ $y= 19;}
					else if($loai == 'linhkien' ){$y =20;}

					$query="
					
					SELECT DISTINCT tbl_product.*, tbl_category.catID
					FROM tbl_product INNER JOIN tbl_category ON tbl_product.catID = tbl_category.catID
					
					where tbl_category.catID = '$y' and tbl_product.type !='2'
					 order by productID $x LIMIT 4";
							$result = $this -> db ->select($query);
							return $result;
				}
				
				public function laySanPhamtheoLoai_all($loai)
				{
					

					if($loai =='duoi3'){ $y= 16;}
					else if($loai =='3den5'){ $y= 15;}
					else if($loai =='5den7'){ $y= 17;}
					else if($loai =='7den10'){ $y= 18;}
					else if($loai =='tren10'){ $y= 19;}
					else if($loai == 'linhkien' ){$y =20;}

					if($loai =='xahang'){
						$query = "SELECT * FROM tbl_product where type = '2' ";

					}else 

					$query="
					
					SELECT DISTINCT tbl_product.*, tbl_category.catID,tbl_category.catName
					FROM tbl_product INNER JOIN tbl_category ON tbl_product.catID = tbl_category.catID
					
					where tbl_category.catID = '$y' and tbl_product.type !='2'";
					 
							$result = $this -> db ->select($query);
							return $result;
				}
				public function laySanPhamtheoHang_all($hang)
				{
					

					

					 

					$query="
					
					SELECT DISTINCT tbl_product.*, tbl_brand.brandID
					FROM tbl_product INNER JOIN tbl_brand ON tbl_product.brandID = tbl_brand.brandID
					
					where tbl_brand.brandID = '$hang'";
					 
							$result = $this -> db ->select($query);
							return $result;
				}
			

					



					public function get_details($id)
				{
					$query="
			SELECT tbl_product.*, tbl_category.catName,tbl_brand.brandName
			FROM tbl_product INNER JOIN tbl_category ON tbl_product.catID = tbl_category.catID
			INNER JOIN tbl_brand ON tbl_product.brandID = tbl_brand.brandID
			where tbl_product.productID = '$id'
			";

			$result = $this -> db ->select($query);
			return $result;
				}
				///////////////tim san pham theo ma hoac ten
				
				
				public function timSanPham($id)
				{
					$id =  $this ->fm->validation($id); //ktra tu khoa da co chua
					$query="
			SELECT * FROM tbl_product where productName Like '%$id%'";
			$result = $this -> db ->select($query);
			return $result;
		
		
	}
				public function ktra_xahang_lonhon_4(){
					
					$query = "SELECT COUNT(*) as a FROM tbl_product where type='2'";
					$result = $this -> db ->select($query);

					$row = $result->fetch_assoc();
					return $row['a'];
					
					
				}
}


 ?>


       