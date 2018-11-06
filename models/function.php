<?php
	function logout() {
		unset($_SESSION["user"]);
		header("Location: admin.php");
	}
	define('home', 'http://localhost:8080/shop/');
    define('css', '/views/frontend/library/css');
    define('jquery', '/views/frontend/library/js');
	function Price_Dots($strNum) {
 
        $len = strlen($strNum);
        $counter = 3;
        $result = "";
        while ($len - $counter >= 0)
        {
            $con = substr($strNum, $len - $counter , 3);
            $result = '.'.$con.$result;
            $counter += 3;
        }
        $con = substr($strNum, 0 , 3 - ($counter - $len) );
        $result = $con.$result;
        if(substr($result,0,1)=='.'){
            $result=substr($result,1,$len+1);   
        }
        return $result;
}
	
 ?>
