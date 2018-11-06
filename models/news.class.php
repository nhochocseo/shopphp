<?php
	class News extends Database
	{
		public function getListNews(){
			$this->setQuery("SELECT * FROM `news` WHERE 1");
			return $this->LoadAllRows();
		}
		public function Count($Id) {
			$this->setQuery("SELECT count(*) FROM `news` WHERE `Category_Id` in (SELECT `Id` FROM `category` WHERE `Parent_Id`= '$Id') OR Category_Id = '$Id'");
			return $this->getAllRowCount($Id);
		}
		public function setStatus($status,$id) {
			$this->setQuery("UPDATE `news` SET `Status` = '$status' WHERE `Id` = '$id'");
			$this->execute();
			return true;
		}
		public function addPostNews($Name_Post,$Content,$CategoryId,$ImageLink,$UserId,$Created){
			$this->setQuery("INSERT INTO `news`(`Name_Post`,`Content_Post`,`Category_Id`,`Image_Link`,`User_Id`,`Created`) VALUES ('$Name_Post','$Content','$CategoryId','$ImageLink','$UserId','$Created')");
			$this->execute(array($Name_Post,$Content,$CategoryId,$ImageLink,$UserId,$Created));
			return $this->getLastId();
		}
		public function editPost($Name_Post,$Content,$CategoryId,$ImageLink,$UserId,$Created,$getId){
			$this->setQuery("UPDATE `news` SET `Name_Post` = '$Name_Post',`Content_Post` = '$Content',`Category_Id` = '$CategoryId',`Image_Link` = '$ImageLink',`User_Id` = '$UserId',`Created` = '$Created' WHERE `Id` = '$getId'");
			$this->execute();
			return true;
		}
		public function getPostId($Id){
			$this->setQuery("SELECT * FROM `news` WHERE `Id` = '$Id'");
			return $this->LoadRow(array($Id));
		}
		public function getPostCategoryId($Id,$vitridongbatdau ,$kichthuoc){
			$this->setQuery("SELECT * FROM `news` WHERE `Category_Id` in (SELECT `Id` FROM `category` WHERE `Parent_Id`= '$Id') OR Category_Id = '$Id' LIMIT $vitridongbatdau ,$kichthuoc ");
			return $this->LoadAllRows(array($Id,$vitridongbatdau ,$kichthuoc));
		}
	}
 ?>