<?php
	$Name = $myinfo->Name;
	$User_Id = $myinfo->User_Id;
	$User = $myinfo->User_Name;
	$ListUser = $this->User->ListUser();
	$js = "";
	$style = "";
	$Message = "";
	if(isset($_GET["page"])) {
		$page = $_GET["page"];
		switch ($page) {
			case 'logout':
				logout();
				break;
			case 'profile':
				$title = htmlentities("Hồ Sơ " . $myinfo->User_Name);
				$myinfo = $this->User->getUser($_SESSION["user"]);
				$username = $_SESSION["user"];
				$js = '<script type="text/javascript" src="views/backend/bootstrap/plugins/ckeditor/ckeditor.js"></script>
   					 <script type="text/javascript" src="views/backend/bootstrap/plugins/ckfinder/ckfinder.js"></script>';
				$content = "views/backend/user/profile.php";
				$errname = "";
				$erremail ="";
				$errpassword ="<span>Không đổi xin vui lòng để trống !</span>";
				$errnewpassword = "";
				$password = $myinfo->Password;
				$newpassword = "";
				if (isset($_POST["btnUpdate"])) {
					$password = $myinfo->Password;
					if ($_POST["name"] == NULL) {
						$errname = "Bạn chưa cài đặt tên của bạn !";
					}
					else {
						$name = $_POST["name"];
					}
					if ($_POST["email"] == NULL) {
						$erremail = "Bạn chưa cài đặt email của bạn !";
					}
					else {
						$email = $_POST["email"];
					}
					if ($_POST["password"] == $myinfo->Password)
					{
						if ($_POST["repeatnewpassword"] != $_POST["newpassword"])
						{
							$errnewpassword = "Mật khẩu bạn nhập không trùng nhau ! ";
						}
						elseif ($_POST["newpassword"] != NULL)
						{
								$newpassword = $_POST["newpassword"];
						}
					}
					else
					{
						$errpassword = "<span>Mật khẩu bạn nhập không chính xác !</span>";
					}
					if($_POST["password"] == NULL)
					{
						if ($name && $email) {
							$udtProfile = $this->User->chanUser($name,$email,$username);
							header("Location: admin.php?page=profile");
							exit();
						}
					}
					if ($name && $email && $newpassword ) {
						$udtProfile = $this->User->upProfile($name,$email,$newpassword,$username);
						$Message = "Thay đổi thông tin thành công";
					}
				}
				if (isset($_POST["btnAvatar"])) {
					$avatar = $_POST["avatar"];
					if ($avatar != NULL) {
						$ckimagesAvatar = $this->User->ckimagesAvatar($avatar,$username);
						header("Location: admin.php?page=profile");
						exit();
					}
					else {
						echo "Không tim thấy đường dẫn avatar";
					}
					
				}
			break;
			// Phân dành cho admin
			case 'user':
				$Level = $myinfo->Level;
				if ($Level == 0) {
					//Band thành viên
					if (isset($_GET["band"])) {
						$userband = $_GET["band"];
						$BandUser = $this->User->BandUser($userband);
						if ($BandUser) {
							header("Location: admin.php?page=user");
						}
					}
					//UnBand thành viên
					if (isset($_GET["unband"])) {
						$unband = $_GET["unband"];
						$UnBand = $this->User->UnBand($unband);
						if ($UnBand) {
							header("Location: admin.php?page=user");
						}
					}
					// Chỉnh xửa thông tin thành viên
					if (isset($_GET["edit"])) {
						$userinfo = $this->User->getUser($_GET["edit"]);
						$username = $_GET["edit"];
						if($userinfo) {
						$title = htmlentities("Hồ Sơ " . $userinfo->User_Name);
							$js = '<script type="text/javascript" src="views/backend/bootstrap/plugins/ckeditor/ckeditor.js"></script>
			   					 <script type="text/javascript" src="views/backend/bootstrap/plugins/ckfinder/ckfinder.js"></script>';
							$content = "views/backend/user/profile.php";
							$errname = "";
							$erremail ="";
							$errpassword ="<span>Không đổi xin vui lòng để trống !</span>";
							$errnewpassword = "";
							$password = $myinfo->Password;
							$newpassword = "";
							if (isset($_POST["UpdateUser"])) {
								$password = $userinfo->Password;
								if ($_POST["name"] == NULL) {
									$errname = "Bạn chưa cài đặt tên của bạn !";
								}
								else {
									$name = $_POST["name"];
								}
								if ($_POST["email"] == NULL) {
									$erremail = "Bạn chưa cài đặt email của bạn !";
								}
								else {
									$email = $_POST["email"];
								}
								if ($_POST["password"] == $myinfo->Password)
								{
									if ($_POST["repeatnewpassword"] != $_POST["newpassword"])
									{
										$errnewpassword = "Mật khẩu bạn nhập không trùng nhau ! ";
									}
									elseif ($_POST["newpassword"] != NULL)
									{
											$newpassword = $_POST["newpassword"];
									}
								}
								else
								{
									$errpassword = "<span>Mật khẩu bạn nhập không chính xác !</span>";
								}
								if($_POST["password"] == NULL)
								{
									if ($name && $email) {
										$udtProfile = $this->User->chanUser($name,$email,$username);
										header("Location: admin.php?page=user&edit=$username");
									}
								}
								if ($name && $email && $newpassword ) {
									$udtProfile = $this->User->upProfile($name,$email,$newpassword,$username);
									header("Location: admin.php?page=user&edit=$username");
								}
							}
							if (isset($_POST["btnAvatar"])) {
								$avatar = $_POST["avatar"];
								if ($avatar != NULL) {
									$ckimagesAvatar = $this->User->ckimagesAvatar($avatar,$username);
									header("Location: admin.php?page=user&edit=$username");
									exit();
								}
								else {
									echo "Không tim thấy đường dẫn avatar";
								}
								
							}
							$content = "views/backend/user/user.php";
						}
						else {
							$title = "Không tìm thấy tài khoản " . $_GET['edit'] . " ! !";
							$content = "/err.php";
						}
						}
						else {
							$title= "Trang quản trị nhân viên :D";
						$js = '<!-- DataTables -->
						<script src="views/backend/themes/plugins/datatables/jquery.dataTables.min.js"></script>
						<script src="views/backend/themes/plugins/datatables/dataTables.bootstrap.min.js"></script>
		';
						$content = "views/backend/user/list-user.php";
					}
					//Cấp quyền thành viên
					if (isset($_GET["grant"])) {
						$userinfo = $this->User->getUser($_GET["grant"]);
						$Level = $userinfo->Level;
						$user = $_GET["grant"];
						if ($userinfo) {
							$title = "Phân quyên Ban quản trị";
							$content = "views/backend/user/grant-user.php";
							if (isset($_POST["btn-grant"])) {
								$setLever = $_POST["grant"];
								$setLever = $this->User->setLever($setLever,$user);
								header ("Location: admin.php?page=user&grant=$user");
							}
						} else {
							$content = "views/backend/err.php";
						}

					}
						
				}
					break;
				case 'add':
					$title = "Thêm ban quản trị";
					$content = "views/backend/user/add.php";
					if (isset($_POST["AddUser"])) {
						$u = $_POST["user"];
						$name = $_POST["name"];
						$email = $_POST["email"];
						$p = $_POST["password"];
						$rp = $_POST["repeatpassword"];
						$user = htmlspecialchars($u);
						$password = htmlspecialchars($p);
						$repeatpassword = htmlspecialchars($rp);
						if ($password == $repeatpassword) {
							$ckUser = $this->User->ckUser($user,$password,$email,$name);
							if ($ckUser == true) {
								$Message = "User " .$user." đã tồn tại !";
							}
							else {
								$AddUser = $this->User->AddUser($user,$password,$email,$name);
								$Message = "Thêm User " .$user." thành công ! ";
							}
						}
						else {
							$Message = "Mật khẩu không trùng nhau";
						}
					}
					break;
			case 'sendmail':
				$title ="Gửi mail";
				$content = "views/backend/mail/index.php";
				$style = ' <!-- bootstrap wysihtml5 - text editor -->
 				 <link rel="stylesheet" href="views/backend/themes/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">';
				$js='<script src="views/backend/themes/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>';
				if(isset($_GET["to"])){
					$mailto = $_GET["to"];
					$title ="Gửi mail cho ".$mailto;
					$content = "views/backend/mail/index.php";
				}
				if(isset($_POST["btnsend"])){
					$Subject = $_POST["title"];
					$mailcontent = $_POST["content"];
					$mailto = $_POST["mailto"];
	                $mail = new PHPMailer();
	                $mail->IsSMTP(); // set mailer to use SMTP
	                $mail->Host = "smtp.gmail.com"; // specify main and backup server
	                $mail->Port = 465; // set the port to use
	                $mail->SMTPAuth = true; // turn on SMTP authentication
	                $mail->SMTPSecure = 'ssl';
					$mail->Username = "demosendmail01@gmail.com"; // your SMTP username or your gmail username
					$mail->Password = "demonhom01"; // your SMTP password or your gmail password
					$from = "demosendmail01@gmail.com"; // Reply to this email
					$name="Mail xác nhận hóa đơn"; // Recipient's name
					$mail->From = $from;
					$mail->FromName = "Mail xác nhận hóa đơn"; // Name to indicate where the email came from when the recepient received
					$mail->AddAddress($mailto,$name);
					$mail->AddReplyTo($from,"Mail xác nhận hóa đơn");
					$mail->WordWrap = 50; // set word wrap
					$mail->IsHTML(true); // send as HTML
					$mail->Subject = $Subject;
					$mail->Body = $mailcontent; //HTML Body
					$mail->AltBody = "Mail hỗ trợ từ - Dũng Moblie"; //Text Body
					//$mail->SMTPDebug = 2;
					if(!$mail->Send())
					{
						$title ="Gửi mail không thành công";
						$noti = "<h1>Lỗi khi gửi mail : $mail->ErrorInfo </h1>";
					}
					else
					{
						$title ="Gửi mail thành công";
						$noti = " Chúc mừng bạn đã gửi mail thành công ";
					}
						$content = "views/backend/mail/done.php";		
				}
				break;
			//Phần chức năng sản phảm
			case 'product':
				include_once("product.php");
			break;
			case 'news':
				include_once("news.php");
			break;
			case 'category':
				include_once("category.php");
			break;
			case 'option':
				include_once("options.php");
			break;
			case 'map':
					$title = "Tùy chỉnh google map";
					$content = "views/backend/map.php";
					$string = '';
					$Id = 1;
					$getMapId = $this->Maps->getMapId($Id);
					if (isset($_POST["btnUpdate"])) {
						$Name = $_POST["nameshop"];
						$Address = $_POST["address"];
						$EditMap = $this->Maps->EditMap($Name,$Address,$Id);
						if ($EditMap) {
							$cityclean = str_replace (" ", "+",  $_POST["address"]);
							$fullurl = "http://maps.googleapis.com/maps/api/geocode/json?address=".$cityclean."&sensor=true";
							$string .= file_get_contents($fullurl); // get json content
							$json_a = json_decode($string, true); //json decoder
							$Lat = $json_a['results'][0]['geometry']['location']['lat'];
							$Lng = $json_a['results'][0]['geometry']['location']['lng'];
							$EditMap1 = $this->Maps->EditMap1($Lat,$Lng,$Id);
							if ($EditMap1) {
							header("Location: admin.php?page=map");
							}
						}
					}
			break;
			case 'slide':
				$title = "Quản lý slide";
				$js = '<script type="text/javascript" src="views/backend/bootstrap/plugins/ckeditor/ckeditor.js"></script>
   					 <script type="text/javascript" src="views/backend/bootstrap/plugins/ckfinder/ckfinder.js"></script>';
   				$ListSlider = $this->Slider->ListSlider();
   				$content = "slider/index.php";
   				// Xóa bài viết hiển thị ra ngoài trang chủ
				if (isset($_GET["del"])) {
					$status = $_GET["del"];
					$id = $_GET["id"];
					$setStatus = $this->Slider->setStatus($status,$id);
					if ($setStatus) {
						header("Location: admin.php?page=slide");
					}

				}
				//Hủy thao tác xóa
				if (isset($_GET["undel"])) {
					$status = $_GET["undel"];
					$id = $_GET["id"];
					$setStatus = $this->Slider->setStatus($status,$id);
					if ($setStatus) {
						header("Location: admin.php?page=slide");
					}
				}
				if (isset($_GET["edit"])) {
					$Id = $_GET["edit"];
					$title = "Sửa thông tin slider";
					$getSlider = $this->Slider->getSlider($Id);
					$content = "slider/edit.php";
					if (isset($_POST["btnUpdate"])) {
						$Id = $_GET["edit"];
						$Slide_Image = $_POST["Slide_Image"];
						$Slide_Name = $_POST["Slide_Name"];
						$Slide_Link = $_POST["Slide_Link"];
						$EditSlider = $this->Slider->EditSlider($Slide_Image,$Slide_Name,$Slide_Link,$Id);
						if ($EditSlider) {
							header("Location: admin.php?page=slide");
						}
					}
				}
   				if(isset($_GET["action"])) {
				$action = $_GET["action"];
				switch ($action) {
					case 'addnew':
					$title = "Thêm slider";
					$content = "slider/slide.php";
					if (isset($_POST["btnUpdate"])) {
						$Slide_Image = $_POST["Slide_Image"];
						$Slide_Name = $_POST["Slide_Name"];
						$Slide_Link = $_POST["Slide_Link"];
						$AddSlider = $this->Slider->AddSlider($Slide_Image,$Slide_Name,$Slide_Link);
						if ($AddSlider) {
							header("Location: admin.php?page=slide");
						}
					}
						break;
					default:
						# code...
						break;
				}
				}
				break;
				case 'bill':
					$title = "Quản lý hóa đơn !";
					$getListOrders = $this->Product->getListOrders();
					$content = "orders/index.php";
					if (isset($_GET["views"])) {
						$Orders_Id = $_GET["views"];
						$getOrdersId = $this->Orders->getOrdersId($Orders_Id);
							$getListProductByOrdersId = $this->Product->getListProductByOrdersId($Orders_Id);
						if (isset($_POST["btn-Status"])) {
							$Status = $_POST["Status"];
							$Approval_By = $User;
							$AddStatus = $this->Orders->AddStatus($Status,$Orders_Id);
							$AddApprovalBy = $this->Orders->AddApprovalBy($Approval_By,$Orders_Id);
							header("Location: admin.php?page=bill");
						}
					$content = "orders/views.php";
					}
				break;
			default:
				$title = "Lỗi Truy Cập ?";
				$content = "/err.php";
				break;
		}
		include_once(ROOT."/../views/backend/layout.php");
	}
	else {
		$js = '<script src="views/backend/themes/dist/js/pages/dashboard2.js"></script>
		<script src="views/backend/themes/plugins/chartjs/Chart.min.js"></script>';
		$title = "Trang Quản Trị Viên";
		$hour = 12;
	   $day1 = strtotime("today $hour:00");
	   $day2 = strtotime("yesterday $hour:00");
	   $day3 = strtotime("yesterday -1 day $hour:00");
	   $day4 = strtotime("yesterday -2 day $hour:00");
	   $day5 = strtotime("yesterday -3 day $hour:00");
	   $day6 = strtotime("yesterday -4 day $hour:00");
	   $day7 = strtotime("yesterday -5 day $hour:00");
	   //số hóa đơn trong 7 ngày gần đây
       $ArrOrder = 
	   $this->Orders->getCountOrderDay(date("Y-m-d", $day7)).","
	   .$this->Orders->getCountOrderDay(date("Y-m-d", $day6)).","
	   .$this->Orders->getCountOrderDay(date("Y-m-d", $day5)).","
	   .$this->Orders->getCountOrderDay(date("Y-m-d", $day4)).","
	   .$this->Orders->getCountOrderDay(date("Y-m-d", $day3)).","
	   .$this->Orders->getCountOrderDay(date("Y-m-d", $day2)).","
	   .$this->Orders->getCountOrderDay(date("Y-m-d", $day1));
		//số hóa đơn đã được hoàn thành
		$ArrOrderComplete = 
	   $this->Orders->getCountOrderDayComplete(date("Y-m-d", $day7)).","
	   .$this->Orders->getCountOrderDayComplete(date("Y-m-d", $day6)).","
	   .$this->Orders->getCountOrderDayComplete(date("Y-m-d", $day5)).","
	   .$this->Orders->getCountOrderDayComplete(date("Y-m-d", $day4)).","
	   .$this->Orders->getCountOrderDayComplete(date("Y-m-d", $day3)).","
	   .$this->Orders->getCountOrderDayComplete(date("Y-m-d", $day2)).","
	   .$this->Orders->getCountOrderDayComplete(date("Y-m-d", $day1));
	   $arrDay = "'".date("d-m-Y", $day7)."','".date("d-m-Y", $day6)."','".date("d-m-Y", $day5)."','".date("d-m-Y", $day4)."','".date("d-m-Y", $day3)."','"
	   .date("d-m-Y", $day2)."','".date("d-m-Y", $day1)."'";
	   //end chart
		$content = "/default.php";
		include_once("/views/backend/layout.php");
	}
// Dũng Cao
?>
