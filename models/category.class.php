<?php
	class Category extends Database
	{
		//show ldanh sách thư mục (Nhà sản suất)
		public function ListCompany(){
			$this->setQuery("SELECT * FROM `category`");
			return $this->loadAllRows();
		}
		//Insert nội dung (Chuyên mục) vào cơ sở dữ liệu
		public function AddCategorys($NameCategory,$Parent,$EditCategoryNews){
			$this->setQuery("INSERT INTO `category`(`Category_Name`, `Parent_Id`,`Category_News`) VALUES ('$NameCategory','$Parent','$Category_News')");
			$this->execute(array($NameCategory,$Parent,$EditCategoryNews));
			return $this->getLastId();
		}
		// edit nội dung chuyên mục
		public function EditCategory($NameCategory,$Parent,$EditCategoryNews,$Id) {
			$this->setQuery("UPDATE `category` SET `Category_Name` = '$NameCategory',`Parent_Id` = '$Parent',`Category_News` = '$EditCategoryNews' WHERE `Id` = '$Id'");
			$this->execute();
			return true;
		}
		// Lây thông tin trong bảng Category
		// public function getCategory($IdCategory) {
		// 	$this->setQuery("SELECT * FROM `category` WHERE `Id` = ?");
		// return $this->loadRow(array($IdCategory));
		// }
		public function getCategoryId($IdCategory) {
			$this->setQuery("SELECT * FROM `category` WHERE `Id` = ?");
		return $this->loadRow(array($IdCategory));
		}
		public function getCategoryParentId($Parent_Id) {
			$this->setQuery("SELECT * FROM `category` WHERE `Parent_Id` = ?");
		return $this->loadAllRows(array($Parent_Id));
		}
	}
 ?>