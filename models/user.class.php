<?php 
	class User extends Database{
		// Kiểm tra kết nối đăng nhập
		public function ckLogin($user,$pass){
			$this->setQuery("SELECT * FROM `users` WHERE `User_Name` = ? AND `Password` =? ");
		return $this->loadRow(array($user,$pass));
		}
		// Lây thông tin trong bảng users
		public function getUser($user) {
			$this->setQuery("SELECT * FROM `users` WHERE `User_Name` = ?");
		return $this->loadRow(array($user));
		}
		public function AddUser($user,$password,$email,$name){
			$this->setQuery("INSERT INTO `users`(`User_Name`, `Password`, `Email`, `Name`) VALUES ('$user','$password','$email','$name')");
			$this->execute(array($user,$password,$email,$name));
			return $this->getLastId();
		}
		//Kiểm tra sự tồn tại của User
		public function ckUser($user,$password,$email,$name){
			$this->setQuery("SELECT * FROM `users` WHERE `User_Name` = '$user'");
			if($this->getRowCount()>=1){
				return true;
			}
			else
			{
				return false;
			}
		}
		// Cập nhật thông tin cá nhân vào csdl
		public function upProfile($name,$email,$newpassword,$username) {
			$this->setQuery("UPDATE `users` SET `Email`='$email',`Name`='$name',`Password` ='$newpassword' WHERE `User_Name` = '$username'");
			$this->execute();
			return true;
		}
		public function chanUser($name,$email,$username) {
			$this->setQuery("UPDATE `users` SET `Name`='$name',`Email` = '$email' WHERE `User_Name` = '$username'");
			$this->execute();
			return true;
		}
		//Hàm kiểm tra thay đổi link anh đại diện thành viên
		public function ckimagesAvatar($avatar,$username){
			$this->setQuery("UPDATE `users` SET `Avatar` = '$avatar' WHERE `User_Name` = '$username'");
			$this->execute();
			return true;
		}
		//Hàm hiện danh sách thành viên
		public function ListUser(){
			$this->setQuery("SELECT * FROM `users` WHERE `User_Id`");
			return $this->loadAllRows();
		}
		//Hàm thực hiện thao tác band thanh viên
		public function BandUser($userband) {
			$this->setQuery("UPDATE `users` SET `Level`=4 WHERE `User_Name`='$userband'");
			$this->execute();
			return true;
		}
		//Hàm hủy thao tác band thành viên
		public function UnBand($unband) {
			$this->setQuery("UPDATE `users` SET `Level`=2 WHERE `User_Name`='$unband'");
			$this->execute();
			return true;
		}
		// set Cấp thành viên
		public function setLever($setLever,$user) {
			$this->setQuery("UPDATE `users` SET `Level` = '$setLever' WHERE `User_Name` = '$user'");
			$this->execute();
			return true;
		}
	}
 ?>