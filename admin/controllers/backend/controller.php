<?php
include_once(ROOT."/models/user.class.php");
include_once(ROOT."/models/category.class.php");
include_once(ROOT."/models/product.class.php");
include_once(ROOT."/models/Orders.class.php");
include_once(ROOT."/models/slider.class.php");
include_once(ROOT."/models/configProduct.class.php");
include_once(ROOT."/models/class.phpmailer.php");
include_once(ROOT."/models/class.smtp.php");
include_once(ROOT."/models/function.php");
	class Controller
	{
		public $User,$Category,$Product,$ConfigMobile,$Slider,$Orders;
		function __construct()
		{
			$this->User = new User();
			$this->Category = new Category();
			$this->Product = new Product();
			$this->ConfigMobile = new ConfigMobile();
			$this->Slider = new Slider();
			$this->Orders = new Orders();
		}
		// Functin Xử Lý
		public function handling() {
			$name = "";
			$email = "";
			$user = "";
			$password = "";
			$repeatpassword = "";
			$errLogin = "";
			// Xử lý trang đăng nhập
			if (isset($_POST["btndangnhap"])) {
				$user = $_POST["user"];
				$pass = $_POST["pass"];
				$infouser = $this->User->ckLogin($user,$pass);
				if (empty($infouser->User_Name)) {
					$errLogin = "Sai thông tin tài khoản hoặc mật khẩu";
				}
				else {
					$_SESSION["user"] = $user;
					header("Location: index.php");
				}
			}
			if (!isset($_SESSION["user"])) {
				include_once(ROOT."/views/backend/login.php");
			}
			else {
				$myinfo = $this->User->getUser($_SESSION["user"]);
				$User_Id = $myinfo->User_Id;
				$Level = $myinfo->Level;
				$Admin = $Level == 0;
				$Lv1 = $Level == 1;
				$Lv2 = $Level == 2;
				$Lv3 = $Level == 3;
				$Band = $Level == 4;
				$getProductbyUser = $this->Product->getProductbyUser($User_Id);
				if ($Admin || $Lv1 || $Lv2 || $Lv3 ) {
					include_once(ROOT."/admin/controllers/backend/module/admin.php");
				}
				elseif($Band) {
					include_once(ROOT."/module/user-band.php");
				}
			}
		}
	}
 ?>
