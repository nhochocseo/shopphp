<?php
	class ConfigMobile extends Database
	{
		public function getConfigProduct() {
			$this->setQuery("SELECT * FROM `config_products`");
			return $this->LoadAllRows();
		}
		public function getConfigShow() {
			$this->setQuery("SELECT * FROM `config_products` WHERE `Status` = 1");
			return $this->LoadAllRows();
		}
		public function getListConfig($Id) {
			$this->setQuery("SELECT * FROM `config_products` WHERE `Id` = ?");
			return $this->LoadRow(array($Id));
		}
		public function AddConfig($Config_Name) {
			$this->setQuery("INSERT INTO `config_products`(`Config_Name`) VALUES('$Config_Name')");
			$this->execute(array($Config_Name));
			return $this->getLastId();
		}
		public function EditConfig($Config_Name,$Id){
			$this->setQuery("UPDATE `config_products` SET `Config_Name` = '$Config_Name' WHERE `Id` = '$Id'");
			$this->execute();
			return true;
		}
		public function setStatus($status,$id) {
			$this->setQuery("UPDATE `config_products` SET `Status` = '$status' WHERE `Id` = '$id'");
			$this->execute();
			return true;
		}
		public function AddConfigDetail($Config_Id,$addProduct,$GetName) {
			$this->setQuery("INSERT INTO `config_detail` (`Config_Id`,`Product_Id`,`Description`) VALUES(?,?,?)");
			$this->execute(array($Config_Id,$addProduct,$GetName));
			return true;
		}
		public function EditConfigDetail($GetName,$Config_Id,$Product_Id) {
			$this->setQuery("UPDATE `config_detail` SET `Description` = '$GetName' WHERE `Config_Id` = '$Config_Id' AND `Product_Id` = '$Product_Id'");
			$this->execute();
			return true;
		}
		public function getProductDetailId($Id){
			$this->setQuery("SELECT * FROM `config_detail` INNER JOIN `config_products` ON `config_products`.`Id` = `config_detail`.`Config_Id` WHERE Product_Id = '$Id'");
			return $this->LoadAllRows(array($Id));
		}
		
	}
 ?>