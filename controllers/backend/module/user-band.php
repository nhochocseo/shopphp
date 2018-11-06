<?php 
	if(isset($_GET["page"])) {
		$page = $_GET["page"];
		switch ($page) {
			case 'logout':
				logout();
			break;
			default:
				$title = "Lỗi Truy Cập ?";
			break;
		}
	}
	$style = "";
	$Name = $myinfo->Name;
	$User = $myinfo->User_Name;
	$js = '<script src="views/backend/themes/dist/js/pages/dashboard2.js"></script>
		<script src="views/backend/themes/plugins/chartjs/Chart.min.js"></script>';
	$title = "Tài Khản Đã bị band";
	$content = "views/backend/user/err-band.php";
	include_once("/views/backend/layout.php");
 ?>