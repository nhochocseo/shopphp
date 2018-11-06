<?php 
	class Options extends Database
	{
		public function editOption($Id,$Value){
			$this->setQuery("UPDATE `options` SET `Value` = '$Value' WHERE `Id` = '$Id'");
			$this->execute();
			return true;
		}
		public function edits($Id,$Value,$Name,$Content){
			$this->setQuery("UPDATE `options` SET `Value` = '$Value',`Name` = '$Name',`Content` = '$Content' WHERE `Id` = '$Id'");
			$this->execute();
			return true;
		}
		public function getId($Id){
			$this->setQuery("SELECT * FROM `options` WHERE `Id` = '$Id'");
			return $this->LoadRow(array($Id));
		}
	}
 ?>