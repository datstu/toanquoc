
<?php 

		 $filepath = realpath(dirname(__FILE__));
 include_once  ($filepath .'/../helper/format.php');
	include_once ($filepath .'/../lib/database.php');
	?>



<?php 
	/**
	 * 
	 */
	class cart
	{
		private $db;
		private $fm;
		
		public function __construct()
		{
			$this->db = new Database();
			$this->fm = new Format();
		}
		public function add_to_cart($id,$number){

				$number = $this ->fm ->validation($number);// kiem tra co rong hay co dung kieu ko
				$number = mysqli_real_escape_string($this -> db ->link,$number);
				$id = mysqli_real_escape_string($this -> db ->link,$id);
				$ssid = session_id();

				$query = "SELECT * FROM tbl_product WHERE productID = '$id'";
				$result = $this ->db -> select($query) ->fetch_assoc();


				$image = $result["image"];
				$price = $result["price"];
				$productName = $result["productName"];
				$query_insert = "INSERT INTO tbl_cart(productID,soluong,ssid,image,price,productName)
				 VALUES ('$id','$number','$ssid','$image','$price','$productName')";
				$result = $this -> db ->insert($query_insert);

				if($result){
					header('Location:cart.php');
				}else{
					header('Location:404.php');
				}

		}
    

}




		

 ?>


       