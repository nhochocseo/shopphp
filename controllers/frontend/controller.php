<?php
include_once("models/user.class.php");
include_once("models/category.class.php");
include_once("models/product.class.php");
include_once("models/configProduct.class.php");
include_once("models/slider.class.php");
include_once("models/news.class.php");
include_once("models/Cart.class.php");
include_once("models/search.class.php");
include_once("models/Orders.class.php");
include_once("models/class.phpmailer.php");
include_once("models/class.smtp.php");
include_once("models/maps.class.php");
include_once("models/option.class.php");
include_once("models/function.php");
	class Controller
	{
		public $Category,$Product,$ConfigMobile,$Slider,$News,$Search,$Carts,$Orders,$Maps,$Options;
		function __construct()
		{
			$this->Category = new Category();
			$this->Product = new Product();
			$this->ConfigMobile = new ConfigMobile();
			$this->Slider = new Slider();
			$this->News = new News();
			$this->Carts = new Carts();
			$this->Orders = new Orders();
			$this->Search = new Search();
			$this->Maps = new Maps();
			$this->Options = new Options();
		}
		// Functin Xử Lý
		public function handling() {
			$Logo = $this->Options->getId(1);
		    $Banner = $this->Options->getId(2);
		    $Banner1 = $this->Options->getId(3);
		    $NavBar = $this->Options->getId(4);
		    $NavBar1 = $this->Options->getId(5);
		    $NavBar2 = $this->Options->getId(6);
		    $TraGop = $this->Options->getId(7);
			$getListProduct = $this->Product->getNewPost();
			$SanPhamBanChay = $this->Product->SanPhamBanChay();
			$title = "";
			//Kiểm tra sợ tồn tại của giỏ hàng lưu vào bộ nhớ trang
			if(!isset($_SESSION["Cart"]))
			{
				$Cart = array();
				$NumberCart = 0;
				$_SESSION["Cart"] = $Cart;
				$_SESSION["NumberCart"] = $NumberCart;
			}
			// Tính tổng số tiền của đơn hàng
			$TotalPrice = 0;
			if (isset($_SESSION["Orders"])) {
				$Orders1 = array();
				$Orders1 = $_SESSION["Orders"];
				for($i=0; $i<count($Orders1); $i++){
	  				$TotalPrice =  $TotalPrice+($Orders1[$i][1]*$Orders1[$i][2]);
				}
			}
			$Parent_Id =0;
			$getCategoryParentId = $this->Category->getCategoryParentId(0);
			if(isset($_GET["load"])) {
				$load = $_GET["load"];
				switch ($load) {
					case 'ajax-search':
						if(isset($_GET['keyword'])){
						    $keyword = 	trim($_GET['keyword']) ;		// Cắt bỏ khoảng trắng
							$keyword = addslashes($keyword);	// Lọc các ký tự đặc biệt
							$getKeyWord = $this->Search->getKeyWord($keyword);
						include_once("views/frontend/themes/ajax-search.php");
						}
					break;
				}
			}
			else if (isset($_GET["pages"])) {
				$pages = $_GET["pages"];
				switch ($pages) {
					case 'product':
						$Id = $getId = $_GET["id"];
						$getProductDetailId = $this->ConfigMobile->getProductDetailId($Id);
						$getProductId = $this->Product->getProductId($Id);
						$IdCategory = $getProductId->Category_Id;
						$getCategoryId = $this->Category->getCategoryId($IdCategory);
						$getProductbyCategory = $this->Product->getProductbyCategory($IdCategory);
						$NameCategory = $getCategoryId->Category_Name;
						$NameCategoryParent = "";
						$gia = ((100-$getProductId->DissCount)/100) * $getProductId->Price;
						if ($IdCategory = $getCategoryId->Parent_Id) {
							$getIdPrent = $getCategoryId->Parent_Id;
							$getCategoryPerentId = $this->Category->getCategoryId($getIdPrent);
							$NameCategoryParent = $getCategoryPerentId->Category_Name;
						}
						$title = $getProductId->Product_Name;
						$content = "themes/product.php";
					break;
					case 'maps':
						$title = "Địa chỉ cửa hàng";
						$Id = 1;
						$getMapId = $this->Maps->getMapId($Id);
						$content = "themes/map.php";
					break;
					case 'category':
						$Id = $_GET["id"];
						$getCategoryId = $this->Category->getCategoryId($Id);
						$kichthuoc = 6;
						$sobai = 8;
						if ($getCategoryId->Category_News == 0) {
							$tongsodong = $this->News->Count($Id);
						} elseif($getCategoryId->Category_News == 1) {
							$tongsodong = $this->Product->Count($Id);
						}
						$tongsotrang = ceil($tongsodong/$kichthuoc);
						$page = "";
						if (isset($_GET["page"])) {
							$page = $_GET["page"];
						}
						$page = max(1, $page);
						$page = min($page , $tongsotrang);
						$vitridongbatdau = ($page-1) * $kichthuoc;
						$getProductbyCategory = $this->Product->getProductbyCategory1($Id,$vitridongbatdau ,$sobai);
						$getPostCategoryId = $this->News->getPostCategoryId($Id,$vitridongbatdau ,$kichthuoc);
						$NameCategoryParent = "";
						if ($Id = $getCategoryId->Parent_Id) {
							$getIdPrent = $getCategoryId->Parent_Id;
							$getCategoryPerentId = $this->Category->getCategoryId($getIdPrent);
							$NameCategoryParent = $getCategoryPerentId->Category_Name. ' <i class="fa fa-chevron-circle-right" aria-hidden="true"></i> ';
						}
						$title = $getCategoryId->Category_Name;
						$content = "themes/category.php";
					break;
					case 'news':
						$Id = $_GET["id"];
						$getCategoryId = $this->Category->getCategoryId($Id);
						$NameCategory = $getCategoryId->Category_Name;
						$getPostId = $this->News->getPostId($Id);
						$NameCategoryParent = "";
						if ($Id = $getCategoryId->Parent_Id) {
							$getIdPrent = $getCategoryId->Parent_Id;
							$getCategoryPerentId = $this->Category->getCategoryId($getIdPrent);
							$NameCategoryParent = $getCategoryPerentId->Category_Name. ' <i class="fa fa-chevron-circle-right" aria-hidden="true"></i> ';
						}
						$title = $getPostId->Name_Post;
						$content = "themes/news.php";
					break;
					case 'cart':
						$title = "Giỏ hàng";
						//kiểm tra xem có thêm sản phẩm không
						if(isset($_GET["action"])){
						if(isset($_GET["PrId"])){
						$PrId = $_GET["PrId"];
						}else if(isset($_POST["PrId"])){
						$PrId = $_POST["PrId"];
						}
						//kiem tra xem mua bao nhieu san pham
						if(isset($_POST["NumberCart"])){
							$Number = $_POST["NumberCart"];
						}else{
							$Number = 1;
							}
						//Thêm sản phẩm
						$AddCarts = $this->Carts->AddCarts($PrId,$Number);
						if($AddCarts){
						header("Location: ?pages=cart");
							}
						}elseif(isset($_GET["Delete"])){
						//Delete gio hang
						$result = $this->Carts->Delete();
						if($result){
						header("Location: ?pages=cart");
							}
						}elseif(isset($_GET["Delete1"])){
							//Xóa 1 sản phẩm
							$Delete_Id = $_GET["Delete1"];
							$result = $this->Carts->Delete1_Product($Delete_Id);
						if($result){
						header("Location: ?pages=cart");
							}
							}elseif(isset($_GET["Delete_Id"])){
						//Delete 1 sản phẩm
						$Delete_Id = $_GET["Delete_Id"];
						$result = $this->Carts->Delete_Product($Delete_Id);
						if($result){
						header("Location: ?pages=cart");
							}
							}
						$Cart = $_SESSION["Cart"];
						$NumberCart = $_SESSION["NumberCart"];
						$content = "themes/carts.php";
						break;
					case 'orders':
						$title = "Thông tin khách hàng";
						$Orders = $_SESSION["Orders"];
						if (isset($_POST["btn-Orders"])) {
							$Name = $_POST["Name"];
							$Address = $_POST["address"];
							$Email = $_POST["email"];
							$NumberPhone = $_POST["numberphone"];
							$NameBank = $_POST["namebank"];
							$NumberBank = $_POST["numberbank"];
							$AddOrders = $this->Orders->AddOrders($Orders,$Name,$Address,$Email,$NumberPhone,$NameBank,$NumberBank);
							$getListProductByOrdersId = $this->Product->getListProductByOrdersId($AddOrders);
							$UnitPrice = "";
							foreach ($getListProductByOrdersId as $getOrdersProduct) {
                                    $gia = ((100-$getOrdersProduct->DissCount)/100) * $getOrdersProduct->Price;
                                $UnitPrice = $UnitPrice+($gia*$getOrdersProduct->Card_Id);
                            }
							$Subject = "Hóa đơn cần thanh toán ## ".$AddOrders;
							$mailcontent = "Xin Chào : ".$Name." <br/>Đây là thông báo cho hóa đơn được tạo ngày : ".date("j / n / Y")."<br/><b>Thông tin bạn đã cung cấp :</b><br/> - Họ Tên : ".$Name."<br/>- Địa chỉ : ".$Address."<br/>- Số điện thoại : ".$NumberPhone."<br/>- Số tài khoản ngân hàng : ".$NumberBank."<br/><b>**********</b><br/>"."<br/>- Tổng số tiền cần thanh toán là ".Price_Dots($UnitPrice)."<br/> - Cảm ơn bạn đã tin tưởng và mua hàng tại cửa hàng chúng tôi . Nhân viên bên chúng tôi sẽ liên hệ cho bạn trong thời gian sớm nhất cho bạn . ";
							$mailto = $Email;;
			                $mail = new PHPMailer();
			                $mail->IsSMTP(); // set mailer to use SMTP
			                $mail->Host = "smtp.gmail.com"; // specify main and backup server
			                $mail->Port = 465; // set the port to use
			                $mail->SMTPAuth = true; // turn on SMTP authentication
			                $mail->SMTPSecure = 'ssl';
							$mail->Username = "demosendmail01@gmail.com"; // your SMTP username or your gmail username
							$mail->Password = "demonhom01"; // your SMTP password or your gmail password
							$from = "demosendmail01@gmail.com"; // Reply to this email
							$name="Hóa đơn cần thanh toán"; // Recipient's name
							$mail->From = $from;
							$mail->FromName = "Hóa đơn cần thanh toán"; // Name to indicate where the email came from when the recepient received
							$mail->AddAddress($mailto,$name);
							$mail->AddReplyTo($from,"Hóa đơn cần thanh toán");
							$mail->WordWrap = 50; // set word wrap
							$mail->IsHTML(true); // send as HTML
							$mail->Subject = $Subject;
							$mail->Body = $mailcontent; //HTML Body
							$mail->AltBody = "Hóa đơn cần thanh toán - Dũng Moblie"; //Text Body
							if(!$mail->Send())
							{
							}
							else
							{
							}
							if ($AddOrders) {
								header("Location: ?pages=bill&Orders_Id=$AddOrders");
							}
						}
						$content = "themes/orders.php";
						break;
						case 'bill':
							$title = "Thông tin hóa đơn của bạn !";
							$Orders_Id = $_GET["Orders_Id"];
							$getOrdersId = $this->Orders->getOrdersId($Orders_Id);
							$getListProductByOrdersId = $this->Product->getListProductByOrdersId($Orders_Id);
							$DeleteCarts = $this->Carts->Delete();
							$content = "themes/bill.php";
							break;
					case 'search':
						$title = "Tìm kiếm !";
						$Search = "Nhập Từ Cần Tìm Kiếm";
						if (isset($_POST["btnSearch"])) {
							$Search = $_POST["Search"];
						}
						$content = "themes/search.php";
					break;
					default:
						$title = "Lỗi tìm trang";
						$content = "/404.php";
						break;
				}
				include_once("views/frontend/layout.php");
			}
			else {
				$ListSlider = $this->Slider->ListSlider();
				$title = "Trang Chủ";
				$content = "home.php";
				include_once("views/frontend/layout.php");
			}
		}
	}
 ?>
