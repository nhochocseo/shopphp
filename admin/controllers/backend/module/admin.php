<?php
	$Name = $myinfo->Name;
	$User_Id = $myinfo->User_Id;
	$User = $myinfo->User_Name;
	$ListUser = $this->User->ListUser();
	$js = "";
	$style = "";
	$Message = "";
	if(isset($_GET["page"])) {
		
	}
	else {
		$js = '<script src="'.home.'/views/backend/themes/dist/js/pages/dashboard2.js"></script>
		<script src="'.home.'/views/backend/themes/plugins/chartjs/Chart.min.js"></script>';
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
		$content = ROOT."/views/backend/default.php";
		include_once(ROOT."/views/backend/layout.php");
	}
// Dũng Cao
?>
