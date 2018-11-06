<?php
	class Search extends Database
	{
		public function getKeyWord($keyword){
			$this->setQuery("SELECT * FROM `products` WHERE `Product_Name` LIKE '%$keyword%' or `Content_Product` LIKE '%$keyword%'");
			return $this->LoadAllRows(array($keyword));
		}
		
	}
 ?>