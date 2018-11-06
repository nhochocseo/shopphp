<?php
class Carts{
	public function Delete(){
			unset($_SESSION['Cart']);
			unset($_SESSION['Orders']);
		return true;
		}
	// Thêm số lượng sản phẩm
	public function AddCarts($PrId,$Number){
		$Cart = $_SESSION["Cart"];
        $NumberCart = $_SESSION ["NumberCart"];
		$Find = false;
		for($i = 0; $i <$NumberCart ; $i++)
	{
		if($PrId==$Cart[$i][0])
		{
			$Cart[$i][1] += 1;
			$Find = true;
			break;
		}
	}
	if($Find == false)
	{
		$Cart[$NumberCart++] = array($PrId,$Number);
	}
	$_SESSION["Cart"] = $Cart;
	$_SESSION["NumberCart"] = $NumberCart;
		return true;
		}
	// Xóa sản phẩm 
	public function Delete_Product($PrId){
	$Cart = $_SESSION["Cart"];
    $NumberCart = $_SESSION ["NumberCart"];
	for($i = 0; $i <$NumberCart ; $i++)
	{
		if($PrId==$Cart[$i][0])
		{
			echo $Position = $i;
			break;
		}
	}
	//Xác đinh vị trí xóa
	for($j=$Position;$j<$NumberCart;$j++){
		$Cart[$j] = $Cart[$j+1];
		}
	print_r($Cart);
	$NumberCart = $NumberCart-1;
	echo $NumberCart;
	$_SESSION["Cart"] = $Cart;
	$_SESSION["NumberCart"] = $NumberCart;	
	return true;
		}
	// Xóa 1 sản phẩm
	public function Delete1_Product($PrId){
		$Cart = $_SESSION["Cart"];
        $NumberCart = $_SESSION ["NumberCart"];
		$Find = false;
		for($i = 0; $i <$NumberCart ; $i++)
	{
		if($PrId==$Cart[$i][0])
		{
			if($Cart[$i][1]!=1){
			$Cart[$i][1] -= 1;
			$Find = true;
			break;
			}
		}
	}
	$_SESSION["Cart"] = $Cart;
	$_SESSION["NumberCart"] = $NumberCart;
		return true;
		}
	
	}
?>