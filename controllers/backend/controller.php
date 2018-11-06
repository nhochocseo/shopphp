<?php
define('ROOT', dirname(dirname(__FILE__))); 
include_once("models/user.class.php");
include_once("models/category.class.php");
include_once("models/product.class.php");
include_once("models/Orders.class.php");
include_once("models/slider.class.php");
include_once("models/news.class.php");
include_once("models/maps.class.php");
include_once("models/configProduct.class.php");
include_once("models/option.class.php");
include_once("models/class.phpmailer.php"); 
include_once("models/class.smtp.php"); 
include_once("models/function.php");
include_once("Common/MessageNotification.php");
	class Controller
	{
		public $User,$Category,$Product,$News,$ConfigMobile,$Slider,$Orders,$Maps,$Options;
		function __construct()
		{
			$this->User = new User();
			$this->Category = new Category();
			$this->Product = new Product();
			$this->News = new News();
			$this->ConfigMobile = new ConfigMobile();
			$this->Slider = new Slider();
			$this->Orders = new Orders();
			$this->Maps = new Maps();
			$this->Options = new Options();
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
					header("Location: admin.php");
				}
			}
			if (!isset($_SESSION["user"])) {
				include_once("/views/backend/login.php"); 
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
					include_once("module/admin.php");
				}
				elseif($Band) {
					include_once("/module/user-band.php");
				}
				
			}
		}
	}
 ?>
