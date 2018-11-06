<?php 
	$title = "Quản lý danh sánh sản phảm";
	$style = '<link rel="stylesheet" href="views/backend/themes/bootstrap/css/bootstrap.min.css"><!-- DataTables -->
  <link rel="stylesheet" href="views/backend/themes/plugins/datatables/dataTables.bootstrap.css">';
	$js = '<script type="text/javascript" src="views/backend/bootstrap/plugins/ckfinder/ckfinder.js"></script><!-- DataTables -->
<script src="views/backend/themes/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="views/backend/themes/plugins/datatables/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="views/backend/themes/plugins/plugins/slimScroll/jquery.slimscroll.min.js"></script><script type="text/javascript" src="views/backend/bootstrap/plugins/ckeditor/ckeditor.js"></script>
   					 <script type="text/javascript" src="views/backend/bootstrap/plugins/ckfinder/ckfinder.js"></script>';
	$getListProduct = $this->Product->getListProduct();
	$getConfigShow = $this->ConfigMobile->getConfigShow();
	$Product_Name = "";
	$Content = "";
	$CategoryId = "";
	$Price = "";
	$DissCount = "";
	$ImagesLink = "";
	$ImagesList = "";
	$content = "views/backend/product/index.php";
	// Xóa bài viết hiển thị ra ngoài trang chủ
	if (isset($_GET["del"])) {
		$status = $_GET["del"];
		$id = $_GET["id"];
		$setStatus = $this->Product->setStatus($status,$id);
		if ($setStatus) {
			header("Location: admin.php?page=product");
		}

	}
	//Hủy thao tác xóa
	if (isset($_GET["undel"])) {
		$status = $_GET["undel"];
		$id = $_GET["id"];
		$setStatus = $this->Product->setStatus($status,$id);
		if ($setStatus) {
			header("Location: admin.php?page=product");
		}

	}
	if (isset($_GET["edit"])) {
		$getId = $Product_Id = $_GET["edit"];
		$getConfigProduct = $this->ConfigMobile->getConfigProduct();
		$getProductId = $this->Product->getProductId($_GET["edit"]);
		$getProductDetailId = $this->ConfigMobile->getProductDetailId($_GET["edit"]);
		$ListImage = $getProductId->Image_List;
		$arrImages = explode(",", $ListImage);
		$title = "Xửa thông tin sản phẩm";
		if (isset($_POST["btn-Product"])) {
					$Product_Name = addslashes($_POST["Product_Name"]);
					$Content = addslashes($_POST["content"]);
					$CategoryId = addslashes($_POST["Categorys"]);
					$Price = addslashes($_POST["Price"]);
					$DissCount = addslashes($_POST["DissCount"]);
					$ImageLink = addslashes($_POST["ImagesProduct"]);
					$ImageList = addslashes($_POST["ListImages"]);
					$Created = date("Y-n-j");
					$UserId = $myinfo->User_Id;
					$editProduct = $this->Product->editProduct($Product_Name,$Content,$CategoryId,$Price,$DissCount,$ImageLink,$ImageList,$UserId,$Created,$getId);
					if ($editProduct) {
						foreach ($getConfigShow as $GetId) {
							if(empty($_POST[$GetId->Id])){
	 						  $GetName = addslashes($_POST["Specs-".$GetId->Id]);
	 						  $Config_Id = $GetId->Id;
	 						  $EditConfigDetail = $this->ConfigMobile->EditConfigDetail($GetName,$Config_Id,$Product_Id);
	 						  
							 }
						}
							header("Location: admin.php?page=product");
					}
				}
		$content = "views/backend/product/edit.php";
	}
	if (isset($_GET["action"])) {
		$action = $_GET["action"];
		switch ($action) {
			case 'newproduct':
				$title = "Thêm sản phẩm";
				$content = "views/backend/product/newproduct.php";
				$UserId = $myinfo->User_Id;
				if (isset($_POST["btn-Product"])) {
					$Product_Name = addslashes($_POST["Product_Name"]);
					$Content = addslashes($_POST["content"]);
					$CategoryId = addslashes($_POST["Categorys"]);
					$Price = addslashes($_POST["Price"]);
					$DissCount = addslashes($_POST["DissCount"]);
					$ImageLink = addslashes($_POST["ImagesProduct"]);
					$ImageList = addslashes($_POST["ListImages"]);
					$Created = date("Y-n-j");
					$UserId = $myinfo->User_Id;
					$addProduct = $this->Product->addProduct($Product_Name,$Content,$CategoryId,$Price,$DissCount,$ImageLink,$ImageList,$UserId,$Created);
					if (isset($addProduct)) {
						foreach ($getConfigShow as $GetId) {
							if(empty($_POST[$GetId->Id])){
	 						  $GetName = addslashes($_POST["Specs-".$GetId->Id]);
	 						  $Config_Id = $GetId->Id;
	 						  $AddConfigDetail = $this->ConfigMobile->AddConfigDetail($Config_Id,$addProduct,$GetName);
	 						  if ($AddConfigDetail) {
	 						  	 header("Location: admin.php?page=product");
	 						  }
							 }
						}
					}
				}
				break;
			case 'configproduct':
				$title = "Câu hình điện thoại";
				$getConfigProduct = $this->ConfigMobile->getConfigProduct();
				$content = "views/backend/product/configproduct.php";
				// Xóa cấu hình
				if (isset($_GET["del"])) {
					$status = $_GET["del"];
					$id = $_GET["id"];
					$setStatus = $this->ConfigMobile->setStatus($status,$id);
					if ($setStatus) {
						header("Location: admin.php?page=product&action=configproduct");
					}

				}
				//Hủy thao tác xóa
				if (isset($_GET["undel"])) {
					$status = $_GET["undel"];
					$id = $_GET["id"];
					$setStatus = $this->ConfigMobile->setStatus($status,$id);
					if ($setStatus) {
						header("Location: admin.php?page=product&action=configproduct");
					}

				}
				if (isset($_GET["edit"])) {
					$Id = $_GET["edit"];
					$Config = $this->ConfigMobile->getListConfig($_GET["edit"]);
					$NameConfig = $Config->Config_Name;
					$title = "Xửa cấu hình";
					$content = "views/backend/product/newconfig.php";
					if (isset($_POST["AddConfig"])) {
						$Config_Name = $_POST["Config_Name"];
						$EditConfig = $this->ConfigMobile->EditConfig($Config_Name,$Id);
						if ($EditConfig) {
							header("Location: admin.php?page=product&action=configproduct");
						}
					}
				}
				break;
			case 'newconfig':
				$title = "Thêm Câu hình điện thoại";
				$NameConfig = "";
				$content = "views/backend/product/newconfig.php";
				if (isset($_POST["AddConfig"])) {
					$Config_Name = $_POST["Config_Name"];
					$AddConfig = $this->ConfigMobile->AddConfig($Config_Name);
					if ($AddConfig) {
						 $Message  = "Thêm CẤU HÌNH thành công";
					}
				}
				break;
			default:
				$title = "Lỗi 404";
				$content = "views/backend/err.php";
				break;
		}
	}
?>
