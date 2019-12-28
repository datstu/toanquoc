
<?php
	
	include '../lib/session.php';
	Session::checkLogin();
	include '../helper/format.php';
	include '../lib/database.php';

?>
<?php 
	/**
	 * 
	 */
	class adminlogin 
	{
		private $db;
		private $fm;
		
		public function __construct()
		{
			$this->db = new Database();
			$this->fm = new Format();
		}
		public function login_admin($adminUser,$adminPass){
			$adminUser =  $this ->fm->validation($adminUser);
			$adminPass =  $this ->fm->validation($adminPass);

			$adminUser = mysqli_real_escape_string($this -> db ->link,$adminUser);//1 bien dử lieu +1bien ket noi CSDL
			$adminPass = mysqli_real_escape_string($this -> db ->link,$adminPass);

			if(empty($adminUser) || empty($adminPass)){
				$alert = "User and Pass must be not empty!";
				return $alert;
			}else{
				$query = "SELECT *FROM tbl_admin WHERE adminUser='$adminUser' AND adminPass ='$adminPass' LIMIT 1";
				$result = $this -> db ->select($query);

				if($result != false){
					$value = $result -> fetch_assoc(); // đúng thì xuất kết qả ra
					Session::set('login',true);
					Session::set('adminid',$value['adminid']);
					Session::set('adminUser',$value['adminuser']);
					Session::set('adminName',$value['adminname']);
					header('Location:index.php'); // chuyển hướng trang index.php

				}else{
					$alert = "User and Pass not match";
					return $alert;
				}
		}
	}
}


 ?>