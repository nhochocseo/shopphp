<?php
	class Product extends Database
	{
		public function getListProduct(){
			$this->setQuery("SELECT * FROM `products` WHERE 1");
			return $this->LoadAllRows();
		}
		public function getNewPost(){
			$this->setQuery("SELECT * FROM `products` ORDER BY `Id` DESC LIMIT 8");
			return $this->LoadAllRows();
		}
		public function SanPhamBanChay(){
			$this->setQuery("SELECT * FROM `products` WHERE `DissCount` > 0 ORDER BY `products`.`DissCount` DESC LIMIT 8");
			return $this->LoadAllRows();
		}
		public function setStatus($status,$id) {
			$this->setQuery("UPDATE `products` SET `Status` = '$status' WHERE `Id` = '$id'");
			$this->execute();
			return true;
		}
		public function addProduct($Product_Name,$Content,$CategoryId,$Price,$DissCount,$ImageLink,$ImageList,$UserId,$Created){
			$this->setQuery("INSERT INTO `products`(`Product_Name`,`Content_Product`,`Category_Id`,`Price`,`DissCount`,`Image_Link`,`Image_List`,`User_Id`,`Created`) VALUES ('$Product_Name','$Content','$CategoryId','$Price','$DissCount','$ImageLink','$ImageList','$UserId','$Created')");
			$this->execute(array($Product_Name,$Content,$CategoryId,$Price,$DissCount,$ImageLink,$ImageList,$UserId,$Created));
			return $this->getLastId();
		}
		public function editProduct($Product_Name,$Content,$CategoryId,$Price,$DissCount,$ImageLink,$ImageList,$UserId,$Created,$getId){
			$this->setQuery("UPDATE `products` SET `Product_Name` = '$Product_Name',`Content_Product` = '$Content',`Category_Id` = '$CategoryId',`Price` = '$Price',`DissCount` = '$DissCount',`Image_Link` = '$ImageLink',`Image_List` = '$ImageList',`User_Id` = '$UserId',`Created` = '$Created' WHERE `Id` = '$getId'");
			$this->execute();
			return true;
		}
		public function getProductId($Id){
			$this->setQuery("SELECT * FROM `products` WHERE `Id` = '$Id'");
			return $this->LoadRow(array($Id));
		}
		public function getProductbyUser($User_Id){
			$this->setQuery("SELECT * FROM `products` WHERE `User_Id` = '$User_Id'");
			return $this->LoadAllRows(array($User_Id));
		}
		public function Count($Id) {
			$this->setQuery("SELECT count(*) FROM `products` WHERE `Category_Id` in (SELECT `Id` FROM `category` WHERE `Parent_Id`= '$Id') OR Category_Id = '$Id'");
			return $this->getAllRowCount($Id);
		}
		public function getProductbyCategory1($Category_Id,$vitridongbatdau ,$sobai){
			$this->setQuery("SELECT * FROM `products` WHERE `Category_Id`  in (SELECT `Id` FROM `category` WHERE `Parent_Id`= '$Category_Id') OR Category_Id = '$Category_Id' LIMIT $vitridongbatdau ,$sobai");
			return $this->LoadAllRows(array());
		}
		public function getProductbyCategory($Category_Id){
			$this->setQuery("SELECT * FROM `products` WHERE `Category_Id` = '$Category_Id'");
			return $this->LoadAllRows(array($Category_Id));
		}
		public function getListProductByOrdersId($Orders_Id) {
			$this->setQuery("SELECT * FROM `orders_products`,`products` WHERE products.Id = orders_products.Product_Id AND orders_products.Order_Id = ?");
			return $this->LoadAllRows(array($Orders_Id));
		}

		public function getListOrders(){
				$this->setQuery("SELECT * FROM `orders`");
				return $this->LoadAllRows();
		}
	}
 ?>