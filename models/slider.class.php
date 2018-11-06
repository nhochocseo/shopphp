<?php
	class Slider extends Database
	{
		//show ldanh sách thư mục (Nhà sản suất)
		public function ListSlider(){
			$this->setQuery("SELECT * FROM `slider`");
			return $this->loadAllRows();
		}
		//Insert nội dung vào cơ sở dữ liệu
		public function AddSlider($Slide_Image,$Slide_Name,$Slide_Link){
			$this->setQuery("INSERT INTO `slider`(`Slider_Image`, `Slider_Name`,`Slider_Link`) VALUES ('$Slide_Image','$Slide_Name','$Slide_Link')");
			return $this->execute();
		}
		// edit nội dung 
		public function EditSlider($Slide_Image,$Slide_Name,$Slide_Link,$Id) {
			$this->setQuery("UPDATE `slider` SET `Slider_Image` = '$Slide_Image',`Slider_Name` = '$Slide_Name',`Slider_Link` = '$Slide_Link' WHERE `Id` = '$Id'");
			$this->execute();
			return true;
		}
		public function setStatus($status,$id) {
			$this->setQuery("UPDATE `slider` SET `Status` = '$status' WHERE `Id` = '$id'");
			$this->execute();
			return true;
		}
		public function getSlider($Id) {
			$this->setQuery("SELECT * FROM `slider` WHERE `Id` = ?");
		return $this->loadRow(array($Id));
		}
	}
 ?>