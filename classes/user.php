
<?php
//quan li dang ki, dang nhap, dat hang
	
		 $filepath = realpath(dirname(__FILE__));
 include_once  ($filepath .'/../helper/format.php');
	include_once ($filepath .'/../lib/database.php');
	?>



<?php 
	/**
	 * 
	 */
	class user
	{
		private $db;
		private $fm;
		
		public function __construct()
		{
			$this->db = new Database();
			$this->fm = new Format();
		}
		}
		
			
	

 ?>


       