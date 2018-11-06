<?php
	class Maps extends Database
	{
		public function EditMap($Name,$Address,$Id) {
			$this->setQuery("UPDATE `maps` SET `name` = '$Name',`address` = '$Address' WHERE `Id` = '$Id'");
			$this->execute();
			return true;
		}
		public function EditMap1($Lat,$Lng,$Id) {
			$this->setQuery("UPDATE `maps` SET `lat` = '$Lat',`lng` = '$Lng' WHERE `Id` = '$Id'");
			$this->execute();
			return true;
		}
		public function getMapId($Id) {
			$this->setQuery("SELECT * FROM `maps` WHERE `id` = ?");
		return $this->loadRow(array($Id));
		}
	}
 ?>