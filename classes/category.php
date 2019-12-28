
<?php 
	
		 $filepath = realpath(dirname(__FILE__));
 include_once  ($filepath .'/../helper/format.php');
	include_once ($filepath .'/../lib/database.php');
	?>
<?php 
	/**
	 * 
	 */
	class category 
	{
		private $db;
		private $fm;
		
		public function __construct()
		{
			$this->db = new Database();
			$this->fm = new Format();
		}
		public function insert_category($catName){
			$catName =  $this ->fm->validation($catName);
			
			$catName = mysqli_real_escape_string($this -> db ->link,$catName);//1 bien dử lieu +1bien ket noi CSDL
			

			if(empty($catName)){
				$alert = "<span class= 'error'>Category must be not empty! </span>";
				return $alert;
			}else{
				$query = "INSERT INTO tbl_category(catName) VALUES ('$catName')";
				$result = $this -> db ->insert($query);

				if($result){
					$alert = "<span class='success'> Insert Category Success </span>";
					return $alert;
				}else{
					$alert = "<span class='error'> Insert Category Not Success </span>";
					return $alert;
				}

				}
		}
		public function show_category(){
			$query = "SELECT * FROM tbl_category order by catID desc";
			$result = $this -> db ->select($query);
			return $result;
		}
		public function getcatbyID($id){
			$query = "SELECT * FROM tbl_category where catID = '$id'";
			$result = $this -> db ->select($query);
			return $result;
		}
		public function update_category($catName,$id){
			$catName =  $this ->fm->validation($catName);
			
			$catName = mysqli_real_escape_string($this -> db ->link,$catName);
			$id = mysqli_real_escape_string($this -> db ->link,$id);

			
				if(empty($catName)){
				$alert = "<span class= 'error'>Category must be not empty! </span>";
				return $alert;
			}else{
				$query = "UPDATE tbl_category SET catName ='$catName' WHERE catID = '$id'";
				$result = $this -> db ->update($query);

				if($result){
					$alert = "<span class='success'> Update Category Success </span>";
					return $alert;
				}else{
					$alert = "<span class='error'> Update Category  Not Success </span>";
					return $alert;
				}

				}
		}

		public function delete_category($id){
			$query = "DELETE FROM tbl_category WHERE catid ='$id'";
			$result = $this -> db ->delete($query);
				if($result){
					$alert = "<span class='success'> Delete Category Success </span>";
					return $alert;
				}else{
					$alert = "<span class='error'> Delete Category  Not Success </span>";
					return $alert;
				}

				}
		
		
	}



 ?>