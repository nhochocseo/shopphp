<?php 
	class Orders extends Database
	{
		public function AddOrders($Orders,$Name,$Address,$Email,$NumberPhone,$NameBank,$NumberBank)
		{
			$this->setQuery("INSERT INTO `orders`(`Name`,`Address`,`Email`,`Phone_Number`,`Bank_Name`,`Bank_Account`,`Created`) VALUES(?,?,?,?,?,?,NOW())");
			$this->execute(array($Name,$Address,$Email,$NumberPhone,$NameBank,$NumberBank));
			$Orders_Id = $this->getLastId();
			for ($i=0; $i < count($Orders); $i++) {
				$Product_Id = $Orders[$i][0];
				$this->AddCountBuy($Product_Id);
				$Carts_Number = $Orders[$i][1];
				$Product_Price = $Orders[$i][2];
				$this->setQuery("INSERT INTO `orders_products`(`Order_Id`,`Product_Id`,`Card_Id`,`Price`) VALUES ($Orders_Id,$Product_Id,$Carts_Number,$Product_Price)");
				$this->execute(array($Orders_Id,$Product_Id,$Carts_Number,$Product_Price));
            }
            return $Orders_Id;
		}
		public function AddCountBuy($Product_Id){		
			$this->setQuery("UPDATE `products` SET `Quantities`= Quantities+1 WHERE Id = '$Product_Id'");
			$this->execute(array($Product_Id));
		}
		public function getOrdersId($Id){
				$this->setQuery("SELECT * FROM `orders` WHERE `Id` = '$Id'");
				return $this->LoadRow(array($Id));
		}
		public function AddStatus($Status,$Orders_Id){		
			$this->setQuery("UPDATE `orders` SET `Status`= '$Status' WHERE Id = '$Orders_Id'");
			$this->execute(array($Orders_Id));
		}
		public function AddApprovalBy($Approval_By,$Orders_Id){		
			$this->setQuery("UPDATE `orders` SET `Approval_By`= '$Approval_By' WHERE Id = '$Orders_Id'");
			$this->execute(array($Orders_Id));
		}
		//GET số hóa đơn theo ngày
		public function getCountOrderDay($day){
		    $this->setQuery("SELECT * FROM `orders` WHERE `Created` LIKE '%$day%'");
			$this->execute();
			return $this->getRowCount();
			}
	    //GET số hóa đơn đã hoàn thành theo ngày
		public function getCountOrderDayComplete($day){
		    $this->setQuery("SELECT * FROM `orders` WHERE `Created` LIKE '%$day%' AND `Status`='2'");
			$this->execute();
			return $this->getRowCount();
		}
		public function getCountAllOrders(){
		    $this->setQuery("SELECT * FROM `orders` WHERE 1");
			$this->execute();
			return $this->getRowCount();
		}
		public function getAllOrders(){
			$this->setQuery("SELECT * FROM `orders` WHERE 1 ORDER BY Id DESC");
			return $this->loadAllRows();
		}
	}
?>