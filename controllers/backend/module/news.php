<?php 
	$title = "Quản lý trang tin tức";
	$style = '<link rel="stylesheet" href="views/backend/themes/bootstrap/css/bootstrap.min.css"><!-- DataTables -->
  <link rel="stylesheet" href="views/backend/themes/plugins/datatables/dataTables.bootstrap.css">';
	$js = '<script type="text/javascript" src="views/backend/bootstrap/plugins/ckfinder/ckfinder.js"></script><!-- DataTables -->
<script src="views/backend/themes/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="views/backend/themes/plugins/datatables/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="views/backend/themes/plugins/plugins/slimScroll/jquery.slimscroll.min.js"></script><script type="text/javascript" src="views/backend/bootstrap/plugins/ckeditor/ckeditor.js"></script>
   					 <script type="text/javascript" src="views/backend/bootstrap/plugins/ckfinder/ckfinder.js"></script>';
	$getListNews = $this->News->getListNews();
	$getConfigShow = $this->ConfigMobile->getConfigShow();
	$Product_Name = "";
	$Content = "";
	$CategoryId = "";
	$Price = "";
	$DissCount = "";
	$ImagesLink = "";
	$ImagesList = "";
	$content = "views/backend/news/index.php";
	// Xóa bài viết hiển thị ra ngoài trang chủ
	if (isset($_GET["del"])) {
		$status = $_GET["del"];
		$id = $_GET["id"];
		$setStatus = $this->News->setStatus($status,$id);
		if ($setStatus) {
			header("Location: admin.php?page=news");
		}

	}
	//Hủy thao tác xóa
	if (isset($_GET["undel"])) {
		$status = $_GET["undel"];
		$id = $_GET["id"];
		$setStatus = $this->News->setStatus($status,$id);
		if ($setStatus) {
			header("Location: admin.php?page=news");
		}

	}
	if (isset($_GET["edit"])) {
		$getId = $Product_Id = $_GET["edit"];
		$getPostId = $this->News->getPostId($_GET["edit"]);
		$title = "Xửa bài viết";
		if (isset($_POST["btn-Product"])) {
					$Name_Post = addslashes($_POST["Name_Post"]);
					$Content = addslashes($_POST["content"]);
					$CategoryId = addslashes($_POST["Categorys"]);
					$ImageLink = addslashes($_POST["ImagesPost"]);
					$Created = date("Y-n-j");
					$UserId = $myinfo->User_Id;
					$editPost = $this->News->editPost($Name_Post,$Content,$CategoryId,$ImageLink,$UserId,$Created,$getId);
					if (isset($editPost)) {
						header("Location: admin.php?page=news");
					}
				}
		$content = "views/backend/news/edit.php";
	}
	if (isset($_GET["action"])) {
		$action = $_GET["action"];
		switch ($action) {
			case 'newpost':
				$title = "Thêm bài viết";
				$content = "views/backend/news/newpost.php";
				$UserId = $myinfo->User_Id;
				if (isset($_POST["btn-Product"])) {
					$Name_Post = addslashes($_POST["Name_Post"]);
					$Content = addslashes($_POST["content"]);
					$CategoryId = addslashes($_POST["Categorys"]);
					$ImageLink = addslashes($_POST["ImagesPost"]);
					$Created = date("Y-n-j");
					$UserId = $myinfo->User_Id;
					$addPostNews = $this->News->addPostNews($Name_Post,$Content,$CategoryId,$ImageLink,$UserId,$Created);
					if (isset($addPostNews)) {
						header("Location: admin.php?page=news");
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
